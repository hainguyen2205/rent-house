<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $files = $request->file('file');
                $result = '';
        
                foreach ($files as $file) {
                    if ($this->isValidImage($file)) {
                        $file_name = $file->getClientOriginalName();
                        $path_temp = 'storage/' . date("Y/m/d");
                        $path = $file->move(public_path($path_temp), $file_name);
                        $public_storage_path = str_replace(public_path(), '', $path);
                        $result .= $public_storage_path . '&&';
                    }
                }
                return $result;
            } catch (\Exception $error) {
                return false;
            }
        } else {
            return false;
        }
    }

    private function isValidImage($file)
    {
        return $file->isValid() && $file->getMimeType() && strpos($file->getMimeType(), 'image/') === 0;
    }
}
