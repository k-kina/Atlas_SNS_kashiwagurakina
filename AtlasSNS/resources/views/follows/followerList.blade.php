@extends('layouts.login')

@section('content')
<div class="container">
  <h1>Follower List</h1>
  <div class="list-images">

  @foreach($posts as $post)
<a href="/otherProfile2"><img src="images/icon2.png"width="50"height="50"></a>
<p>{{ $post->user->username }}</p>
<p>{{ $post->post }}</p>
@endforeach

  </div>
</div>
@endsection
