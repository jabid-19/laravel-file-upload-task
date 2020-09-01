@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Post
                        <a href="{{route('forums.create')}}" class="btn btn-success btn-sm float-right">Add New</a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{--                            {{ session('status') }}--}}
                        </div>
                    @endif
                    <table id="posts" class="table text-center">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Title</th>
                            <th style="width: 20%">Body</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($forums as $forum)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$forum->title}}</td>
                                <td>{{$forum->body}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{--    <script>--}}
    {{--        $(document).ready( function () {--}}
    {{--            $('#posts').DataTable();--}}
    {{--        } );--}}
    {{--    </script>--}}


    <script>
        $(document).ready( function () {
            $('#posts').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": [4,6] }
                ]
            });
        } );
    </script>
@endsection
