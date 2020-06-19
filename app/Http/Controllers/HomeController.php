<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
//        ログインユーザーを取得する
        $user = Auth::user();

//        ログインユーザーに紐つくフォルダーを一つ取得する
        $folder = $user->folders()->first();

        if (is_null($folder)){
            return view('home');
        }

//        フォルダーがあればそのフォルダーのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index',[
            'id' => $folder->id,
        ]);
//        return view('home');
    }
}
