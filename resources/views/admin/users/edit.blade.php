@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
    <div class="row">
    <div class="col-sm-3"><img src="{{($user->photo)?$user->photo->path:'http://placehold.it/400/400'}}" width="50"></div>
    <div class="col-sm-9">
    {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', array('' => 'Choose Options')+$roles,null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
        </div>
    <div class="row">
        @include('includes.form_errors')
    </div>

@stop