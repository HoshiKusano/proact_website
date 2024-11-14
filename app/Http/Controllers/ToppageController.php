<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToppageController extends Controller
{
  public function index()
    {
        return view('toppage');  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
  
  public function vision()
    {
        return view('vision');  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
  
}
