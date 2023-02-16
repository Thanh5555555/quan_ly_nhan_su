<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Employee;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [];
        $searchType = $request->search;
        $receipts = Receipt::with('employee');
        if (!empty($searchType)) {
            $search = '%' . $searchType . '%';

            $receipts->where('type', 'like', $search);
        }


        $data['receipts'] = $receipts->paginate(5);
        $data['search'] = $searchType;

        return view('dashboard.receipts.index', $data);
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

        return view('dashboard.receipts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        //dd($request);
        $Receipts = new Receipt();
        $Receipts->employee_id = $request->employee_id;
        $Receipts->price = $request->price;
        $Receipts->type = $request->type;
        $Receipts->content = $request->content;
        $Receipts->day = $request->day;


        $Receipts->save();
        return redirect()->route('receipts.index')
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
        $receipt = Receipt::findOrFail($id);
        $data['receipt'] = $receipt;

        return view('dashboard.receipts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptRequest $request, $id)
    {

        $Receipts = Receipt::findOrFail($id);


        $Receipts->employee_id = $request->employee_id;
        $Receipts->price = $request->price;
        $Receipts->type = $request->type;
        $Receipts->content = $request->content;
        $Receipts->day = $request->day;

        $Receipts->save();
        return redirect()->route('receipts.index')
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
        $receipt = Receipt::findOrFail($id)->delete();

        return redirect()->route('receipts.index')->with('success', 'Xóa thành công.');;
    }
}
