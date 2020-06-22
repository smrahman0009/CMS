@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
    </div>
    <card class="card-body">
       <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <p>Image</p>
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf 
                                @method("DELETE")
                                <button type="submit" class="btn btn-success">
                                Make {{$user->role == 'admin' ? ' Normal':' Admin'}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </card>
@endsection