@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{Session('deleted_user')}}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created </th>
            <th>Updated</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img src="{{($user->photo)? $user->photo->path:'http://placehold.it/400/400'}}"height="50"> </td>
            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{($user->role)?$user->role->name:'no role'}}</td>
            <td>{{($user->status==1)?'Active':'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id], ]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}


                </td>

          </tr>
            @endforeach
            @endif

        </tbody>
      </table>
@endsection