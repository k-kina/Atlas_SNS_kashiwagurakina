<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //検索ページの表示
    public function search()
    {
        //usersテーブルの内容を全て表示
        $search = \DB::table('users')->get();
        //dd($search);
        return view('users.search',['search'=>$search]);
    }

    //検索結果の表示
    public function usersearch(Request $request)
    {
        $keyword = $request->input('search');//検索フォームに入力された値を受け取り$keywordに格納
        //dd($keyword);
        $query = User::query();
        //dd($query);

        if (!empty($keyword)){//$keywordで値を受け取った場合if文の中で取得するデータの絞り込み
            //dd($keyword);
                $query->where('username', 'like', '%{$keyword}%');//usernameカラムから$keywordと一致するデータを全て取得(部分一致)し、$queryとして保持される
                //dd($query);

        }
        //\DB::table('users')
        //->where('username',$search)//usernameカラムから$searchと一致するものを取得
        $search = $query->get();//上記で取得した$queryを変数$searchに代入
        //dd($search);

        return view('users.search', compact('search', 'keyword'));
    }   //viewにkeywordとsearchを変数として渡す

}
