@extends('layouts.app')

@section('template_title')
 Edit Lesson
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Lesson</div>
        <div class="card-body">
            <form action="{{ route('lesson.update', $lesson->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $lesson->title }}">
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{ $lesson->subject }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection