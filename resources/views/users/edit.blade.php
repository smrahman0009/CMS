@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
    </div>
    <card class="card-body">
        <form action="{{route('user.profile-update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="about">About Me</label>
                <textarea name="about" id="about" class="form-control" cols="5" rows="5">{{$user->about}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </card>
@endsection