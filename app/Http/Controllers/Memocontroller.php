<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class Memocontroller extends Controller
{
    public function index(){
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create() {
        return view('memos.create');
    }

public function store(Request $request) {
    $memo = new Memo();

    $memo->title = $request->title;
    $memo->body = $request->body;
    $memo->save();

        // 登録したらindexに戻る
        return redirect('/memos');
}

    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }

    public function edit($id) {
        $memo = memo::find($id);
        return view('memos.edit', ['memo' => $memo]);
    }

    public function update(Request $request, $id) {
        $memo = Memo::find($id);

        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();
        return redirect('/memos');
    }

}
