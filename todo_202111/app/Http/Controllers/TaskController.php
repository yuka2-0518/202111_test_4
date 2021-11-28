<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
    //task作成?
    public function showIndexPage()
    {
        // $tasks = Task::latest();
        $tasks = Task::latest()->get();
        // dd($tasks);
        // return view ('index');
        return view ('index', ['tasks' => $tasks]);
    }

    // task保存
    // public function createTask(Request $request)
    public function postTask(Request $request)
    {
        $validator = $request->validate([
            'cat' => ['required','string', 'max:280'],
            'task' => ['required', 'string', 'max:300'],
            'duedate' => ['required', 'date'],
            'prio' => ['required', 'text', 'max:100'],
            'flag' => ['required', 'text', 'max:100'],

            // DBへの保存 解決案_A  参考）*➈‐1 17:00**************************************
               // public function store(Request $request)
               // {
               //     $task = new task();
               //     $task-> user_id = 1;
               //     $task-> cat_id = 1;
               //     $task-> cat = $request->cat;
               //     $task ->task = $request->task;
               //     $task ->duedate = $request->duedate;
               //     $task ->prio = $request->prio;
               //     $task ->flag = $request->flag;
               // }

        ]);
      // dd($request);
        Task::create([
            'user_id' => Auth::user()->id,
            'cat_id'=> $request->cat_id,
            'cat' => $request->cat,
            'task' =>$request->task,
            'duedate' =>$request->duedate,
            'prio' => $request->prio,
            'flag' => $request->flag,
        ]);

        return back ();

    }


    public function destroy($id)
    {
        // dd($id);
        $task=Task::find($id);
        // dd($task);
        $task->delete();

        return redirect()->route('timeline');
    }

}