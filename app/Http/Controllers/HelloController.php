<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください。'];

        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }

        return view('hello.auth', ['message' => $msg]);
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
//        $items = Person::orderBy('age', 'asc')->simplePaginate(5);
        $items = Person::orderBy('age', 'asc')->paginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];

        return view('hello.index', $param);
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }


    public function post(Request $request)
    {
        $items = DB::select('select * from peoole');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($params);
        return redirect(('/hello'));
    }

    public function edit(Request $request)
    {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($params);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
}
