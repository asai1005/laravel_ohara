<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm; //storeメソッドで使用するモデルのインポート

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DBから情報を取得 モデル名::select(カラム名)->get()から指定したカラムをすべて取得
        $contacts = ContactForm::select('id', 'name', 'title', 'gender', 'created_at')->get();

        //処理：contactsフォルダ内のindex.blade.phpを返す
        // viewメソッドの第２引数で変数を指定するとビュー側に変数を渡すことができる
        // 変数を渡すときにはcompact()でまとめて渡すことができる
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //処理：contactsフォルダ内のcreate.blade.phpを返す
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //フォームから送られてきたデータの確認
        // dd($request->gender);
        //DBに以下の情報をまとめて登録する処理
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
        // indexページにリダイレクト
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
