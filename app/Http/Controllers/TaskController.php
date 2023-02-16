<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [];
        $searchName = $request->search;
        $tasks = Task::with('employee');
        if (!empty($searchName)) {
            $search = '%' . $searchName . '%';

            $tasks->where('name', 'like', $search);
        }


        $data['tasks'] = $tasks->paginate(5);
        $data['search'] = $searchName;
        return view('dashboard.tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        // Get All User
        $employees = Employee::all()->pluck('name', 'id');
        $data['employees'] = $employees;

        return view('dashboard.tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {


        $tasks = new Task();
        $tasks->name = $request->name;
        $tasks->employee_id = $request->employee_id;
        $tasks->content = $request->content;
        $tasks->status = $request->status;
        $tasks->daywork = $request->daywork;


        $tasks->save();
        return redirect()->route('tasks.index')
            ->with('success', 'thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];

        // Get All User
        $employees = Employee::all()->pluck('name', 'id');
        $data['employees'] = $employees;

        // Get Task Info
        $task = Task::findOrFail($id);
        $data['task'] = $task;

        return view('dashboard.tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $tasks = Task::findOrFail($id);


        $tasks->name = $request->name;
        $tasks->employee_id = $request->employee_id;
        $tasks->content = $request->content;
        $tasks->status = $request->status;
        $tasks->daywork = $request->daywork;

        $tasks->save();
        return redirect()->route('tasks.index')
            ->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::findOrFail($id)->delete();

        return redirect()->route('tasks.index');
    }
}
