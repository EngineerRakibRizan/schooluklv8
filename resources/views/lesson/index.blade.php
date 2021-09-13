@extends('layouts.app')

@section('template_title')
{!! trans('usersmanagement.create-new-user') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Lessons 

        <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('usersmanagement.users-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/create-lesson') }}">
                                        <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                                       Create Lesson
                                    </a> 
                                </div>
                            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>{!! trans('usersmanagement.users-table.actions') !!}</th> 
                        <th class="no-search no-sort"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $key => $lesson)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->subject }}</td>
                        <td>
                            {!! Form::open(array('url' => 'lesson-delete/' . $lesson->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                            {!! Form::hidden('_method', 'GET') !!}
                            {!! Form::button('Delete Lesson', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                            {!! Form::close() !!}
                        </td> 
                        <td>
                            <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('edit-lesson/' . $lesson->id) }}" data-toggle="tooltip" title="Edit">
                                Edit Lesson
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modals.modal-delete')
@endsection
@section('footer_scripts')
   
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection