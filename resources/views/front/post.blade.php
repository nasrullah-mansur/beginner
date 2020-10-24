@extends('front.layouts.app')


@section('content')

@foreach($posts as $post)
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


@endforeach

{{ $posts->links() }}
@endsection