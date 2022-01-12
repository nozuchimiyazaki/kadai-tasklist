<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * 一覧表示処理
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //タスク一覧を取得
        $tasks = Task::all();
        
        // タスク一覧ビューで表示
        return view('tasks.index', ['tasks' => $tasks,]);
    }

    /**
     * Show the form for creating a new resource.
     * 新規登録画面表示処理
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        // タスク作成ビュー表示
        return view('tasks.create',['task' => $task,]);
    }

    /**
     * Store a newly created resource in storage.
     * 新規登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //タスクを作成
        $task = New Task;
        $task->content = $request->content;
        $task->save();
        
        // トップページへリダイレクトする
        return redirect('/');
    }

    /**
     * Display the specified resource.
     * getでtasks/(任意のid)にアクセスされた場合の取得表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        // タスク詳細ビューで表示
        return view('tasks.show', ['task' => $task,]);
    }

    /**
     * Show the form for editing the specified resource.
     * getでtasks/(任意のid)/editでアクセスされた場合の更新画面表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::FindOrFail($id);
        
        // タスク編集ビューで表示
        return view('tasks.edit',['task' => $task,]);
    }

    /**
     * Update the specified resource in storage.
     * putまたはpatchでtask/(任意のid)にアクセスされた場合の更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値でタスクを検索して取得
        $task = Task::FindOrFail($id);
        
        // $taskが存在した場合に実行
        // タスクを更新
        $task->content = $request->content;     // サニタイズが必要
        $task->save();
        
        // トップページへリダイレクト
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     * deleteでtasks/(任意のid)でアクセスされた場合の削除処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でタスクを検索して取得
        $task = Task::FindOrFail($id);
        
        // 該当データがあった場合に
        // タスクを削除
        $task->delete();
        
        // トップページへリダイレクト
        return redirect('/');
    }
}
