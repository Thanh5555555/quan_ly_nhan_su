<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\StoreEmployeeResquest;
use App\Models\Logwork;
use App\Models\Receipt;
use App\Models\Task;
use Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function indexqq(Request $request)
    // {

    //     // tao ra pass moi
    //     $pass = bycrypt('1234567');
    //     // update database pass where email
    //     Employee::where('email', $xxxx)
    //     ->update(['pass' => $pass]);
    //     // send mail

    //     Mail::send('email', array('pass'=>$pass), function($message){
	//         $message->to($xxxx, 'Visitor')->subject('Visitor Feedback!');
	//     });
    //     // return view hoac redirect man hinh login
    // }

    public function index(Request $request)
    {

        $data = [];
        $searchName = $request->search;
        if (!empty($searchName)) {
            $search = '%' . $searchName . '%';

            
            $employees = Employee::where('name', 'like', $search)->paginate(5);
        } else{
            $employees = Employee::paginate(5);
        }
        
        $data['employees'] = $employees;
        $data['search'] = $searchName;
        return view('dashboard.employees.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //EmployeeRequest
    public function store(EmployeeRequest $request)
    {
        $employees = new Employee();
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->address = $request->address;
        $employees->salary = $request->salary;
        $employees->phone = $request->phone;
        $employees->gender = $request->gender;
        $employees->start_time = $request->start_time;
        

        $employees->save();
        return redirect()->route('employees.index') 
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
        $employee = Employee::findOrFail($id);
        $data['employee'] = $employee;

        return view('dashboard.employees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->start_time = $request->start_time;



        $employee->save();
        return redirect()->route('employees.index') 
        ->with('success', 'cập nhật thành công.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logwork::where('employee_id',$id)->delete();
        Receipt::where('employee_id',$id)->delete();
        Task::where('employee_id',$id)->delete();
        Employee::findOrFail($id)->delete();

        return redirect()->route('employees.index');
    }

    public function updateAjax(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->save();

        return response()->json(array('status'=> true), 200);
    }
}


