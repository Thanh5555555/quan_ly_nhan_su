<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $revenues = Receipt::groupBy('day')
            ->selectRaw("sum(case when type = 'thu' then price else 0 end) as sum_thu,
             sum(case when type = 'chi' then price else 0 end) as sum_chi, day")
            ->limit(7)->orderBy('day', 'DESC')
            ->get();

        $listDay = [];
        foreach ($revenues as $value) {
            $listDay[] = $value->day;
        }
        $listRevenue = [];
        foreach ($revenues as $value) {
            $listRevenue[] = $value->sum_thu;
        }

        $listExpenditure = [];
        foreach ($revenues as $value) {
            $listExpenditure[] = $value->sum_chi;
        }
        $data['listDay'] = json_encode($listDay);
        $data['listRevenue'] = json_encode($listRevenue);
        $data['listExpenditure'] = json_encode($listExpenditure);
        return view('dashboard.index', $data);
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
