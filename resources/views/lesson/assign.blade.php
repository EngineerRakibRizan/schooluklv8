@extends('layouts.app')

@section('template_title')
 Assign Lesson
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Assign Lesson</div>
        <div class="card-body">
            <form action="{{ route('assign.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <select name="lesson" id="" class="form-control">
                        <option value="">Select</option>
                        @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->subject }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection