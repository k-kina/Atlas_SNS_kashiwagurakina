@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  <input type="search" placeholder="ユーザー名" name="search">
  <button type="submit">検索</button>

  <p>検索ワード：{{ $keyword }}</p>
</form>

@foreach ($search as $search)
<tr>
  <td>{{ $search->username}}</td>

  @if (auth()->user()->isFollowing($search->id))
  <form action="/unFollow" method="POST">
  <input type="hidden" name="id" value="{{$search->id}}">
   {{ csrf_field() }} <!--CSRF対策 -->
 <button type="submit" class="btn btn-danger">フォロー解除</button>

</form>
@else
<form action="/follow" method="POST">
    <input type="hidden" name="id" value="{{$search->id}}"><!--hiddenを使用しブラウザにはフォローする人のidが表示されないようにデータを送る初期値は$search->id-->
    {{ csrf_field() }}<!-- CSRF対策 -->
<button type="submit" class="btn btn-primary">フォローする</button>
 </form>
@endif

</tr>
@endforeach



@endsection
