@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        POST CREATE
                        <a href="{{route('posts.index')}}" class="btn btn-warning float-right">Back</a>
                    </div>

                    <div class="card-body">
                        {{Form::open(['route' => 'posts.store', 'method' => 'POST', 'enctype'=>"multipart/form-data" ])}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" for="title" class="form-control" id="title" >
                            <span class="text-danger ">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <input type="textarea" name="body" for="body" class="form-control" id="body" >
                            <span class="text-danger ">{{$errors->has('body') ? $errors->first('body') : ''}}</span>
                        </div>

                        <div class="form-group">
                            <select class="custom-select mb-3" name="category_id">
                                <option selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option  value="{{$category->id}}">{{$category->name}}</option>
                                    <span class="text-danger ">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select multiple class="custom-select mb-3" name="tag_id[]">
                                <option selected>Select Tag</option>
                                @foreach($tags as $tag)
                                    <option  value="{{$tag->id}}">{{$tag->name}}</option>
                                    <span class="text-danger ">{{$errors->has('tag_id') ? $errors->first('tag_id') : ''}}</span>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>
                            <input type="file" accept="image/png" name="image" for="image" class="form-control-file" id="image">
                            <span class="text-danger ">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
