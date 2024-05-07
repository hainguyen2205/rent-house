<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;


class AddressController extends Controller
{
    public function getAllWard(Request $request)
    {
        $wards = Ward::where('id_district', $request->id_district)->get();
        return response()->json(['wards'=>$wards]);
    }
}
