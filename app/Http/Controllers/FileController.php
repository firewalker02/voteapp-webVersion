<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    //return view to upload file

    public function createRouteFile(){
return view('createFileForm');
    }

    // public function createFile(){


    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'title' => 'required:max:255',
    //         'overview' => 'required',
    //         'price' => 'required|numeric'
    //       ]);
    
    //       auth()->user()files()->create([
    //         'title' => $request->get('title'),
    //         'overview' => $request->get('overview'),
    //         'price' => $request->get('price')
    //       ]);
    
    //       return \redirect('/')->with('FlashMessage', 'Your file is submitted Successfully');
    //     }
    
}
