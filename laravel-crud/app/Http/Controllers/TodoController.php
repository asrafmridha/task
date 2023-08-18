<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function TodoList()
    {
        return ToDo::all();
    }

    function TodoCreate(Request $request)
    {
        // Save To Database
        return ToDo::create([
            'title' => $request->input('title'),
            'description' => $request->input('desc'),
            'status' => $request->input('status'),
        ]);
    }

    function TodoById(Request $request)
    {
        return ToDo::where('id', $request->input('id'))->first();
    }
    function TodoUpdate(Request $request)
    {
        return ToDo::where('id',$request->input('id'))->update([
            'title' => $request->input('title'),
            'description' => $request->input('desc'),
            'status' => $request->input('status'),
        ]);
    }

    function TodoDelete(Request $request)
    {
        return ToDo::where('id', $request->input('id'))->delete();
    }
}
