@extends('layouts.login')

@section('content')

    <div class="container">

    <p class="page-header"><img src="images/icon1.png"width="50"height="50"></p>
        {!! Form::open(['url' => 'post/create']) !!}

        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
             </div>

        <button type="submit"></button><img src="images/post.png"width="100"height="100">


        {!! Form::close() !!}

        {{ $user->user->username }}

        @foreach ($post as $post)
        <tr>
            <td>{{ $post->post}}</td><!-- 投稿内容 -->
            <td>{{ $post->created_at}}</td><!--登録日 -->
        </tr>
        @endforeach

    </div>

@endsection
