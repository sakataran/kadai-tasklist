<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        $data = [];
        
        if (\Auth::check()) { //ログイン時
            $user = \Auth::user();
            $tasks = $user->tasks()->paginate(10);
            
            $data = [
              'tasks' => $tasks,
            ];
        }
        return view('tasks.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new task;

        return view('tasks.create', [
            'task' => $task,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required',
            'status' => 'required|max:10',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        // indexへ戻る
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、詳細画面を表示
        if (\Auth::id() === $task->user_id) {
            return view('tasks.show', [
                'task' => $task,
            ]);
        } else {
            return redirect ('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、編集画面を表示
        if (\Auth::id() === $task->user_id) {
            return view('tasks.edit', [
                'task' => $task,
            ]);
        } else {
            return redirect ('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'content' => 'required',
        ],
        [
           'content.required' => 'タスクは必須項目です。', 
        ]);
        
        $task = Task::findOrFail($id);
        
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        // indexへ戻る
        return redirect('/');
    }
}
