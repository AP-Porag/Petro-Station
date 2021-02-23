<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\DataTables\VendorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(10);
        return response(view('admin.vendor.vendor', compact('vendors')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.vendor.vendor-create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'company' => 'required|unique:vendors,company',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        $vendor = Vendor::create([
            'company' => $request->company,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'notes' => $request->notes,
        ]);

        if ($vendor) {
            Session::flash('success', 'Vendor Added Successfully');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->company = $request->company;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone_number = $request->phone;
        $vendor->notes = $request->notes;
        $vendor->save();


        if ($vendor) {
            Session::flash('success', 'Vendor Updated Successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $vendor = Vendor::findOrFail($id)->delete();
        if ($vendor) {
            Session::flash('success', 'Vendor Deleted Successfully');
        }
        return back();
    }
}
