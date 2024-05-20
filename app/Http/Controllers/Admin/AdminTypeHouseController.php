<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminTypeHouseController extends Controller
{
    public function displayTypeHousePage()
    {
        $types = TypeHouse::all();
        return view('admin.type_house.list', [
            'types' => $types,
        ]);
    }
    public function get(Request $request)
    {
        $type_id = $request->input('id');
        $type = TypeHouse::find($type_id);
        if ($type) {
            return response()->json($type);
        } else {
            return response()->json(['error' => 'Type not found']);
        }
    }
    public function create(Request $request)
    {
        $type_name = $request->input('type_name');
        if (!isset($type_name)) {
            Session::flash('error', 'Tên loại hình nhà trống');
            return back();
        }
        try {
            TypeHouse::create($request->all());
            Session::flash('success', 'Thêm thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Thêm thất bại' . $e->getMessage());
        }
        return back();
    }
    public function update(Request $request)
    {
        $type = TypeHouse::findOrFail($request->id);
        $type_name = $request->input('type_name');
        if (!isset($type_name)) {
            Session::flash('error', 'Tên loại hình nhà trống');
            return back();
        }
        if (!$type) {
            Session::flash('error', 'Cập nhật thất bại');
            return back();
        }
        try {
            $type->update(['type_name' => $type_name]);
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Cập nhật thất bại' . $e->getMessage());
        }
        return back();
    }
}
