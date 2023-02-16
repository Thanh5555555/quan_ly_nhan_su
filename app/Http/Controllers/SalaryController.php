<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
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
        $month = $request->month;
        if (!empty($month)) {
            $array = explode('-', $month);
            $m = $array[0];
            $y = $array[1];
            $salaries = Employee::leftjoin('logworks', function ($join)  use ($m,$y)  {
                $join->on('employees.id', '=', 'logworks.employee_id');
                $join->on('logworks.month', '=', DB::raw("'".$m."'"));
                $join->on('logworks.year', '=', DB::raw("'".$y."'"));
            })
                ->select(
                    'employees.name as nhanvien',
                    'employees.salary as luong',
                    'logworks.workingday as ngaylamviec',
                    'logworks.month as thang',
                    'logworks.year as nam',
                )->get()->toArray();

        } else {
            $salaries = Employee::leftjoin('logworks', function ($join) {
                $join->on('employees.id', '=', 'logworks.employee_id');
                $join->on('logworks.month', '=', DB::raw("'" . date('m') . "'"));
                $join->on('logworks.year', '=', DB::raw("'" . date('Y') . "'"));
            })
                ->select(
                    'employees.name as nhanvien',
                    'employees.salary as luong',
                    'logworks.workingday as ngaylamviec',
                    'logworks.month as thang',
                    'logworks.year as nam',
                )->get()->toArray();
        }

        //
        $data = [];
        // $searchMonth = $request->month;
        // if(!empty($searchMonth)){

        // }


        foreach ($salaries as &$salary) {
            $salary['realSalary'] = $salary['luong'] / 30 * $salary['ngaylamviec'];
        }

        $data['salaries'] = $salaries;
        $data['search'] = $listSearch;
        return view('dashboard.salaries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}
