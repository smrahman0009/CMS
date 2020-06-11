@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('post.create')}}" class="btn btn-success">Create Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
    </div>
    <card class="card-body">
       @if($posts->count())
       <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src=" {{URL::to('/storage/'.$post->image)}}" alt="" width="120px" height="60px">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        @if(!$post->trashed())
                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                        </td>
                        @endif
                        <td>
                            <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                @csrf 
                                @method("DELETE")
                                <button type="submit" class="btn btn-info btn-sm btn-danger">
                                {{$post->trashed()?'Delete':'Trash'}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       @else
       <h3 class="text-center">No Posts Yet</h3>
       @endif
    </card>
@endsection