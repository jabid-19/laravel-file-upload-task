@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        TAG
                        <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#tagCreate">Add New</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($tags as $tag)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$tag->name}}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{route('categories.status.update', $category->id)}}"  onclick="return confirm('Are you sure to change!!!')">--}}
{{--                                            {{$category->status == 1 ? 'Active' : 'Inactive'}}--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{route('categories.edit', $category->id)}}"--}}
{{--                                           class="btn btn-primary btn-sm">Edit</a>--}}
{{--                                        <a href="{{route('categories.show', $category->id)}}"--}}
{{--                                           class="btn btn-info btn-sm">View</a>--}}

{{--                                        {{Form::open(['route' => ['categories.destroy', $category->id], 'method'=>'DELETE', 'class' => 'd-inline'])}}--}}
{{--                                        <button type="submit"--}}
{{--                                                title="Delete"--}}
{{--                                                onclick="return confirm('Are you sure to delete!!!')"--}}
{{--                                                class="btn btn-sm btn-danger">Delete--}}
{{--                                        </button>--}}
{{--                                        {{Form::close()}}--}}
{{--                                    </td>--}}
                                    <td>
                                        {{Form::open(['route' => ['tags.destroy', $tag->id], 'method'=>'DELETE', 'class' => 'd-inline'])}}
                                        <button type="submit"
                                                title="Delete"
                                                onclick="return confirm('Are you sure to delete!!!')"
                                                class="btn btn-sm btn-danger">Delete
                                        </button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$tags -> links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tags Create Modal -->
    <div class="modal fade" id="tagCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tag Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{Form::open(['route' => 'tags.store', 'method' => 'POST' ])}}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  required name="name" for="name" class="form-control" id="name" >
                        <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
