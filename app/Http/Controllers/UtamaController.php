<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UtamaController extends Controller
{
    protected function store(Request $request) {
        $this->validate($request, [
            'featured_file' => 'required',
        ]);
        $path = Storage::putFile(
            'public/files',
            $request->file('featured_file'),
        );

        return redirect()
            ->back()
            ->withSuccess("file succes Uploaded in " . $path);
    }
}
