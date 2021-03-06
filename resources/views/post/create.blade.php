@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
           {{isset($post) ? 'Edit Post' : 'Create Post'}}
    </div>
    <form action="{{ isset($post)?route('post.update',$post->id) : route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(isset($post))
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{isset($post) ? $post->title : ''}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description" value="{{isset($post) ? $post->description:''}}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" name="published_at" id="published_at"  class="form-control" value="{{isset($post) ? $post->published_at : ''}}">
            </div>
            @if(isset($post))
            <div class="form-group">
                <img src="{{URL::to('/storage/'.$post->image)}}" alt="" style="width: 70%; height: 70%;">
            </div>
            @endif
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control ">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                           @if(isset($post))
                                @if($category->id === $post->category_id)
                                    selected
                                @endif  
                           @endif 
                        >
                        {{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($tags->count())
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control tags-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" 
                        @if(isset($post))
                            @if($post->hasTag($tag->id))
                                selected
                            @endif
                        @endif    
                    >
                        {{$tag->name}}
                    </option>
                @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"  class="form-control"></input>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                   {{isset($post) ? "Edit Post" : "Create Post"}}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        flatpickr("#published_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        $(document).ready(function() {
            $('.tags-select').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection