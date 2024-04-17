<?php

namespace App\Http\Controllers;

use App\Http\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public $upload;

    public function __construct(UploadService $uploadService)
    {
        $this->upload = $uploadService;
    }
    public function store(Request $request)
    {
        $url = $this->upload->store($request);
        if($url != false) {
            return response()->json([
                'error' => false,
                'urls' => $url
            ]);
        }
        return response()->json(['error' => true]);
    }
}
