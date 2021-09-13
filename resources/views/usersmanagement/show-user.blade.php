@extends('layouts.app')

@section('template_title')
{!! trans('usersmanagement.showing-user', ['name' => $user->first_name]) !!}
@endsection

@php
$levelAmount = trans('usersmanagement.labelUserLevel');
if ($user->level() >= 2) {
$levelAmount = trans('usersmanagement.labelUserLevels');
}
@endphp

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-10 offset-lg-1">

      <div class="card">

        <div class="card-header text-white @if ($user->activated == 1) bg-success @else bg-danger @endif">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            {!! trans('usersmanagement.showing-user-title', ['name' => $user->first_name.' '.$user->last_name ]) !!}
            <div class="float-right">
              <a href="{{ route('users') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                {!! trans('usersmanagement.buttons.back-to-users') !!}
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
              <img src="http://localhost/school/storage/app/{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle center-block mb-3 mt-4 user-image">
            </div>
            <div class="col-sm-4 col-md-6">
              <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                {{ $user->name }}
              </h4>
              <p class="text-center text-left-tablet">
                <strong>
                  {{ $user->first_name }} {{ $user->last_name }}
                </strong>

              </p>
              @if ($user->profile)
              <div class="text-center text-left-tablet mb-4">
                <a href="{{ url('/profile/'.$user->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.viewProfile') }}">
                  <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.viewProfile') }}</span>
                </a>
                <a href="{{ url('/users/') }}/{{$user->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.editUser') }}">
                  <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.editUser') }} </span>
                </a>
                {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('usersmanagement.deleteUser'))) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
                {!! Form::close() !!}
              </div>
              @endif
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @if ($user->name)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelUserName') }}
            </strong>
          </div>

          <div class="col-sm-7">
            {{ $user->name }}
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif



          @if ($user->first_name)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelFirstName') }}
            </strong>
          </div>

          <div class="col-sm-7">
            {{ $user->first_name }}
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->last_name)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelLastName') }}
            </strong>
          </div>

          <div class="col-sm-7">
            {{ $user->last_name }}
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif



          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelStatus') }}
            </strong>
          </div>

          <div class="col-sm-7">
            @if ($user->activated == 1)
            <span class="badge badge-success">
              Activated
            </span>
            @else
            <span class="badge badge-danger">
              Not-Activated
            </span>
            @endif
          </div>


          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @if ($user->created_at)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelCreatedAt') }}
            </strong>
          </div>

          <div class="col-sm-7">
            {{ $user->created_at }}
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->updated_at)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelUpdatedAt') }}
            </strong>
          </div>

          <div class="col-sm-7">
            {{ $user->updated_at }}
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->signup_ip_address)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelIpEmail') }}
            </strong>
          </div>

          <div class="col-sm-7">
            <code>
              {{ $user->signup_ip_address }}
            </code>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->signup_confirmation_ip_address)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelIpConfirm') }}
            </strong>
          </div>

          <div class="col-sm-7">
            <code>
              {{ $user->signup_confirmation_ip_address }}
            </code>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->signup_sm_ip_address)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelIpSocial') }}
            </strong>
          </div>

          <div class="col-sm-7">
            <code>
              {{ $user->signup_sm_ip_address }}
            </code>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->admin_ip_address)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelIpAdmin') }}
            </strong>
          </div>

          <div class="col-sm-7">
            <code>
              {{ $user->admin_ip_address }}
            </code>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          @if ($user->updated_ip_address)

          <div class="col-sm-5 col-6 text-larger">
            <strong>
              {{ trans('usersmanagement.labelIpUpdate') }}
            </strong>
          </div>

          <div class="col-sm-7">
            <code>
              {{ $user->updated_ip_address }}
            </code>
          </div>

          <div class="clearfix"></div>
          <div class="border-bottom"></div>

          @endif

          <hr>
          <h3>Assigned Lessons</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SN</th>
                <th>Subject</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->lessons as $key => $lesson)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $lesson->subject }}</td>
                </tr>
              @endforeach 
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

@include('modals.modal-delete')

@endsection

@section('footer_scripts')
@include('scripts.delete-modal-script')
@if(config('usersmanagement.tooltipsEnabled'))
@include('scripts.tooltips')
@endif
@endsection