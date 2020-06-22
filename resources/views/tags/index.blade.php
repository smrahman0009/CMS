@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            tag
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Count Posts</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>
                            <td>{{$tag->posts()->count()}}</td>
                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">
                                edit
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="handleDelete('{{$tag->id}}')">
                                delete
                                </a>
                            </td>
                        </>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <form action="" method="POST" id="deleteTagForm">
                       @csrf
                       @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are sure to delete this Tag?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
   <script>
        function handleDelete(id){
            var form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;
            $('#deleteModal').modal('show');
        }
   </script>
@endsection