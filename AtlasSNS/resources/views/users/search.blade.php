@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  <input type="search" placeholder="ユーザー名" name="search">
  <button type="submit">検索</button>
</form>

@foreach ($search as $search)
<tr>
  <td>{{ $search->username}}</td>
</tr>
@endforeach



@endsection
