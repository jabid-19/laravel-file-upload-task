@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('anyFileUploads.index')}}" class="btn btn-warning float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">File Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($myFiles as $myFile)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$myFile->file}}</td>
{{--                                    <td>{{$myFile->id}}</td>--}}
                                    <td>{{Form::open(['route' => ['anyFileUploads.destroy', $myFile->id], 'method'=>'DELETE', 'class' => 'd-inline'])}}
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
                            {{Form::open(['route' => 'anyFileUploads.store', 'method' => 'POST', 'enctype'=>"multipart/form-data" ])}}
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload File</label>
                                <input type="file" name="file" for="file" class="form-control-file" id="file">
                                <span class="text-danger ">{{$errors->has('file') ? $errors->first('file') : ''}}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
