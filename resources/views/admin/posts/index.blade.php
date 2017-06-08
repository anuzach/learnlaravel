@extends('layouts.admin')
@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created </th>
            <th>Updated</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{($post->photo)? $post->photo->path:'http://placehold.it/400/400'}}"height="50"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category? $post->category->name:'No Category to display'}}</td>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id], ]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}


                    </td>

                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop

