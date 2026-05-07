<?php

namespace App\Http\Controllers;
use  App\Models\Spot;
use  App\Models\Bookmark;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggle(Spot $spot)
    {
        // 本来はログインユーザーのIDを取得しますが、
        // 今は動作確認のため「仮にユーザーIDが1の人」として扱います。
        // （マイページなどを作った後に Auth::id() に進化させます！）
        $userId = 1;

        // データベースに「このユーザーがこのスポットをお気に入りした記録」があるか探す
        $bookmark = Bookmark::where('user_id', $userId)
                            ->where('spot_id', $spot->id)
                            ->first();

          if ($bookmark) {
            // 記録があった場合 ＝ すでにお気に入り済みなので、削除（解除）する
            $bookmark->delete();
            
            // JavaScript側に「解除したよ！」と返事をする
            return response()->json(['status' => 'removed']);
        } else {
            // 記録がなかった場合 ＝ まだお気に入りしていないので、新しく保存する
            Bookmark::create([
                'user_id' => $userId,
                'spot_id' => $spot->id,
            ]);
            
            // JavaScript側に「新しく追加したよ！」と返事をする
            return response()->json(['status' => 'added']);
        }
    }
}                  
   
