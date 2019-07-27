@extends('layouts.app')

@section('uploadactive')
active disabled
@endsection

@section('content')

<script src="{{ asset('js/upload.js') }}" defer></script>
<link href="{{ asset('css/upload.css') }}" rel="stylesheet">

<div class="bg-layer">


                <div class="header-main" style="max-width: 650px;">

            <div class="card">
                <div class="card-header"><strong>Upload Notes</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Semester</strong></label>
                      <select name="semester_name" class="form-control">
                        @foreach($semesters as $semester)
                        <option value="{{$semester->name}}">{{$semester->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Branch</strong></label>
                      <select name="branch_name" class="form-control">
                        @foreach($branches as $branch)
                        <option value="{{$branch->name}}">{{$branch->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Subject</strong></label>
                      <select name="subject_name" class="form-control">
                        @foreach($subjects as $subject)
                        <option value="{{$subject->name}}">{{$subject->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label><strong>Year</strong></label>
                      <input required name="year" class="form-control">
                      </input>
                      <br>
                      @error('year')
                        <span class="text-danger"><strong>&nbsp;{{$message}}</strong></span>
                    @enderror
                    </div>


                    <div class="form-group">
                      <label><strong>Description</strong></label>
                      <textarea required name="description" rows="10" cols="30" class="form-control">
                      </textarea>
                      <br>
                      @error('description')
                        <span class="text-danger"><strong>&nbsp;{{$message}}</strong></span>
                    @enderror
                    </div>
                    <br>
                    <div class="form-group">
                      <label><strong>Upload the Notes</strong></label>
                      <div class="custom-file">
                        <br><br>
                        <input type="file" class="custom-file-input" name="fileUpload" id="file-upload" required>
                        <label class="custom-file-label" for="file-upload"><div id="file-upload-filename"></div></label>

                        <br>
                        @error('fileUpload')
                          <span class="text-danger"><strong>&nbsp;{{$message}}</strong></span>
                      @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <br><br>

                </div>
            </div>

    </div>
</div>
@endsection
