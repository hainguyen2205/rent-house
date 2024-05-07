<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function __construct()
    {
        $this->obj = new Service();
    }
    public function displayServicesPage()
    {
       $service = $this->obj::get();
       return view('admin.services',[
        'services' => $service,
       ]);
    }
}
