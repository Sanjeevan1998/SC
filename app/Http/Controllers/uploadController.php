<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\branch;
use App\semester;
use App\subject;
use App\upload;
use App\User;



class uploadController extends Controller
{
    public function store()
    {
        $branches=branch::all();
        $semesters=semester::all();
        $subjects=subject::all();
        return view('upload',compact('branches','semesters','subjects'));
    }
    public function upload(Request $request)
    {
      $request->validate([
        'fileUpload' => 'required',
          'subject_name'=>'required',
          'branch_name'=>'required',
          'semester_name'=>'required',
          'description'=>'required',
          'year'=>'required'
      ]);

      $uploadfile= $request->file('fileUpload')->store('pdfs');

      $request->validate([
        'fileUpload' => 'required|mimes:pdf,doc,docx,ppt'
      ]);

      upload::create([
        'subject_name'=>$request->subject_name,
        'branch_name'=>$request->branch_name,
        'semester_name'=>$request->semester_name,
        'user_id'=>auth()->user()->id,
        'file'=>$uploadfile,
        'description'=>$request->description,
        'year'=>$request->year

      ]);

      return redirect('home');

    }
}
