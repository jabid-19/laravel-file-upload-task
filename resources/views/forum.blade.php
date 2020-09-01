{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row ">--}}
{{--            @foreach($forums as $key => $forum)--}}
{{--                <div class="col-sm-4 mb-3">--}}
{{--                    <div class="card">--}}
{{--                        <img src="{{$forum->image}}" class="card-img-top img-fluid" style=" height: 150px;" alt="forum image">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$forum->title}}</h5>--}}
{{--                            <p class="card-text">{{substr(strip_tags($forum->body),0,50)}} ...</p>--}}
{{--                            <a href="{{route('get.single.forums', $forum->id)}}" class="btn btn-primary btn-sm stretched-link">Details</a>--}}
{{--                            <a href="#" class="btn btn-primary btn-sm stretched-link">Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">{{$forums->links()}}</div>--}}

{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @foreach($forums as $key => $forum)
                <div class="card mb-3">
                    <img src="{{$forum->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$forum->title}}</h5>
                        <p class="card-text">{{substr(strip_tags($forum->body),0,50)}}</p>
                        <p class="card-text"><small class="text-muted">Last updated on {{$forum->updated_at}}</small></p>
                        <a href="{{route('get.single.forums', $forum->id)}}"  class="btn btn-primary btn-sm stretched-link" >Details</a>
                    </div>
                </div>
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Card title</h5>--}}
{{--                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
{{--                    </div>--}}
{{--                    <img src="..." class="card-img-bottom" alt="...">--}}
{{--                </div>--}}
            @endforeach
        </div>
        <div class="row justify-content-center">{{$forums->links()}}</div>

    </div>
@endsection

