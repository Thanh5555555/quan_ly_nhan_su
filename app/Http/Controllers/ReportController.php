<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];


        $searchday = $request->search;
        if (!empty($searchday)) {
            $revenues = Receipt::groupBy('day')
            ->where('day',$searchday)
            ->selectRaw("sum(case when type = 'thu' then price else 0 end) as sum_thu,
             sum(case when type = 'chi' then price else 0 end) as sum_chi, day")
            ->get();

        }else{
        // //test
        $revenues = Receipt::groupBy('day')

            ->selectRaw("sum(case when type = 'thu' then price else 0 end) as sum_thu,
             sum(case when type = 'chi' then price else 0 end) as sum_chi, day")
             ->limit(7)
            ->get();
        };
        // dd($revenues);
        // $expenditures = Receipt::where('type', 'chi')->whereDate('day', $date_report)->sum('price');
        // $expenditures = Receipt::groupBy('day')
        // ->where('type', 'thu','chi')
        //     ->selectRaw('sum(price) as sum, day')
        //     ->get();
        $data['revenues'] = $revenues;
        // $data['expenditures'] = $expenditures;
        $data['search'] = $searchday;

        return view('dashboard.reports.index', $data);
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
