@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
            Create Post
    </div>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="date" name="published_at" id="published_at"  class="form-control"></input>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"  class="form-control"></input>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Create Posts
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#published_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection