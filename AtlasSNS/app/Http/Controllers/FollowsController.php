<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
class FollowsController extends Controller
{
    //フォローしてくれているユーザーの投稿を表示
    public function followerList()
    {
        $following_id = Auth::user()->follows()->pluck('following_id');
        //dd($following_id); // フォローしてくれているユーザーのidを取得し$following_idに格納する

        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();// $following_idに格納したユーザーidと一致するカラム名：user_id(投稿内容)を取得
        //dd($posts);

        return view('follows.followerList', compact('posts'));
    }

    //フォローしているユーザーの投稿を表示
    public function followList()
    {
        $following_id = Auth::user()->follows()->pluck('followed_id');
        //dd($following_id); // フォローしているユーザーのidを取得し$following_idに格納する

        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();// $following_idに格納したユーザーidと一致するカラム名：user_id(投稿内容)を取得
        //dd($posts);

        return view('follows.followList', compact('posts'));
}
}
