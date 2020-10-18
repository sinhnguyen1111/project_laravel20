<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        // $tasks = Task::where('status',0)
        // ->get();
        // // dd($tasks);
        return view('tasks.list',['tasks'=>$tasks]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input->
        $input->save();
        // dd($input);


        // $input = $request->all();//Lấy tất cả dữ liệu
        // dd($input);

        // $input = $request->only(['email']); //Chỉ lấy email
        // dd($input);

        // $input = $request->except(['_token']);//Lấy tất cả trừ _token
        // dd($input);

        // $name = $request->only('name','deadline');
        // $deadline = $request->get('deadline');
        // $name = $request->get('name');
        // dd($name );    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);//Tìm kiếm 1 dữ liệu
        $task = Task::where('id', $id)->first();
        dd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        return view('tasks.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        // dd($task);
        $task->delete();
        return redirect()->route('task.index');
    }

    public function complete($id)
    {
        // return view('tasks.list');
        dd($id);
    }

    public function reComplete($id)
    {
        // return $id;
        dd($id);

    }
}
