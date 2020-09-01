@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts Update
                        <a href="{{route('posts.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">
                        {{Form::open(['route' => ['posts.update', $post->id], 'method' => 'PUT', 'enctype'=>"multipart/form-data" ])}}
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" >
                            <span class="text-danger ">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <input type="textarea" name="body" value="{{$post->body}}" class="form-control" id="body" >
                            <span class="text-danger ">{{$errors->has('body') ? $errors->first('body') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category Name</label>
                            <select class="custom-select" name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tag">Tags</label>
                            <select multiple class="custom-select mb-3" name="tag_id[]">
{{--                                <option selected>Select Tag</option>--}}
{{--                                @foreach($tags as $tag)--}}
{{--                                    <option  value="{{$tag->id}}">{{$tag->name}}</option>--}}
{{--                                    <span class="text-danger ">{{$errors->has('tag_id') ? $errors->first('tag_id') : ''}}</span>--}}
{{--                                @endforeach--}}
                                @foreach($tags as $id => $tag)
                                    <option value="{{$id}}"
                                    @foreach($post->tags as $val)
                                        {{$val->id == $id ? 'selected': ''}}
                                        @endforeach >
                                        {{$tag->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group custom-file">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            <input type="file" name="image" value="{{$post->image}}" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
