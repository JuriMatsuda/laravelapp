<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォーム入力を行ってください。';
        }
        return view('hello.index', ['msg' => $msg,]);
    }


    public function post(HelloRequest $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $message = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢は整数で記入してください。',
            'age.min' => '年齢は0際以上で記入してください。',
            'age.max' => '年齢は200歳以下で記入してください。',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        $validator->sometimes('age', 'min:0', function ($input) {
            return !is_int($input->age);
        });

        /**
         *  fails()はバリデーションチェックに失敗したらtrue（エラー時のメッセージを表示）
         *  逆はpasses()。（バリデーションをパスしていたらtrue）
         *
         *  withErrors()はリダイレクト時に引数のエラーメッセージを引き継がす。
         *  withInput()で直前の送信されたフォームの値を残す。
         */
        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました。']);
    }
}
