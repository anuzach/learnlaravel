@extends('layouts.admin')
@section('content')
    <h1>Edit Post</h1>
    <div class="row">
        <div class="col-sm-3"><img src="{{($post->photo)?$post->photo->path:'http://placehold.it/400/400'}}" width="50"></div>
        <div class="col-sm-9">
            {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', array('' => 'Choose Options')+ $categories,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.form_errors')
    </div>

@stop
