@extends('layouts.app')

@section('template_title')
 Create Lesson
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Create Lesson</div>
        <div class="card-body">
            <form action="{{ route('lesson.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" class="form-control" name="subject">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection