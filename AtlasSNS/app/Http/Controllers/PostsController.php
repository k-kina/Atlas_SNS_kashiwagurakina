<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //トップページ
    public function index()
    {
        $user = Auth::user();//ログインしたユーザー情報の取得
        //dd($user);
        $post = \DB::table('posts')->get();//postsテーブルから全てのレコード情報取得
        //dd($post);
        return view('posts.index',['post'=> $post,'user'=> $user]);
    }//viewで表示する

    //投稿機能
    public function create(Request $request)
    {
        $id = Auth::id();//ログインユーザーidの取得
        $post = $request->input('newPost');//つぶやきを取得
        \DB::table('posts')->insert([//postテーブルに送る
            'post' => $post,//postカラムを$postに入れる
            'user_id' => $id//user_idカラムを$idに入れる
        ]);

        return redirect('/top');
    }
}
