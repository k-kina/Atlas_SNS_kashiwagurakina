<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //ユーザーが投稿した内容を取得
    //リレーション1対多の1側なので単数系
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
