<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todolist::all();
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        Todolist::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Todolist::find($request->id)->delete();
        return redirect('/');
    }
}
