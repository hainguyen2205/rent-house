<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminServiceController extends Controller
{
    public function __construct()
    {
        $this->obj = new Service();
    }
    public function displayServicesPage()
    {
        $service = $this->obj::get();
        return view('admin.service.list', [
            'services' => $service,
        ]);
    }
    public function getService(Request $request)
    {
        $service_id = $request->input('id');
        $service = $this->obj->find($service_id);
        if ($service) {
            return response()->json($service);
        } else {
            return response()->json(['error' => 'service not found']);
        }
    }
    public function createService(ServiceRequest $request)
    {
        try {
            $this->obj->create($request->all());
            Session::flash('success', 'Thêm thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Thêm thất bại' . $e->getMessage());
        }
        return back();
    }
    public function updateService(ServiceRequest $request)
    {
        $service = $this->obj->findOrFail($request->id);
        if (!$service) {
            Session::flash('error', 'Cập nhật thất bại');
            return back();
        }
        $data_update = $request->except('_token');
        try {
            $service->update($data_update);
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Cập nhật thất bại' . $e->getMessage());
        }
        return back();
    }
}
