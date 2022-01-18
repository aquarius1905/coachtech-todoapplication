<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Todolist;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todolist::all();
        return view('index', ['items' => $items]);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todolist::create($form);
        return redirect('/');
    }

    public function update(TodoRequest $request, $id)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $id)->update($form);
        return redirect('/');
    }

    public function delete($id)
    {
        Todolist::find($id)->delete();
        return redirect('/');
    }
}