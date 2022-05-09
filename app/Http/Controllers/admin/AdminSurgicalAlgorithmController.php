<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AdminSurgicalAlgorithmController extends Controller
{
    public  function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|exists:surgical_algorithms_list,id',
        ]);

        if ($validator->fails()) {
            return  redirect()->route('surgical-list')->with('error', 'Such Surgical Algorithm does not exist');
        }


        $data['heading'] = 'Edit Algorithms';
        $data['sub_heading'] = 'Edit Current Surgical Algorithm';
        $data['screen'] = [
            'title' => 'Testing',
            'id' => (int)$request->input('id')
        ];
        
        
        return view('admin.surgical_algorithm.edit', $data);
    }
}
