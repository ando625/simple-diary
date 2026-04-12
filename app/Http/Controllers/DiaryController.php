<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    //日記を一覧表示
    public function index()
    {
        $diaries = Diary::latest()->get();
        
        return view('welcome', compact('diaries'));
    }

    //日記を保存
    public function store(Request $request)
    {
        $diary = new Diary();
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->save();

        return back();
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return back();
    }
}
