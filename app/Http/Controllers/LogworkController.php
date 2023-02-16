<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogworkRequest;
use App\Models\Employee;
use App\Models\Logwork;
use Illuminate\Http\Request;

class LogworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $listSearch = [];
        $month = date('m');
        $year = date('Y');
        for ($i = 1; $i <= 3; $i++) {
            $listSearch[] = $month . '-' . $year;
            $month--;
        }
        $data = [];

        $month = $request->month;
        if (!empty($month)) {
            $array = explode('-', $month);
            $m = $array[0];
            $y = $array[1];
            $logworks = Logwork::with('employee')->where('month', $m)->where('year',$y);
        } else {
            $logworks = Logwork::with('employee')->where('month', date('m'))->where('year', date('Y'));
        }




        $data['logworks'] = $logworks->paginate(5);
        $data['search'] = $listSearch;
        return view('dashboard.logworks.index', $data);
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

        return view('dashboard.logworks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogworkRequest $request)
    {

        $logwork = Logwork::where('employee_id', $request->employee_id)
            ->where('month', $request->month)->where('year', $request->year)->first();
        if (!empty($logwork)) {
            Logwork::where('employee_id', $request->employee_id)
                ->where('month', $request->month)->where('year', $request->year)
                ->update(['workingday' => $request->workingday]);
        } else {
            $logworks = new Logwork();
            $logworks->employee_id = $request->employee_id;
            $logworks->workingday = $request->workingday;
            $logworks->month = $request->month;
            $logworks->year = $request->year;
            $logworks->save();
        }
        return redirect()->route('logworks.index')
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
        $logwork = Logwork::findOrFail($id);
        $data['logwork'] = $logwork;

        return view('dashboard.logworks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogworkRequest $request, $id)
    {



        $logworks = Logwork::findOrFail($id);


        $logworks->employee_id = $request->employee_id;
        $logworks->workingday = $request->workingday;
        $logworks->month = $request->month;


        $logworks->save();
        return redirect()->route('logworks.index')
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
        $logwork = Logwork::findOrFail($id)->delete();

        return redirect()->route('logworks.index')->with('success', 'Xóa thành công.');;
    }
}
