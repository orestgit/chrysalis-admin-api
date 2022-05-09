<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SurgicalAlgorithmController extends Controller
{
    public function processAlgorithm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|exists:surgical_algorithms_list,id',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'error' => $validator->errors(),
                    'status' => 400
                ],
                400
            );
        }

        $step   = (int)$request->input('step', 0);
        $option = (int)$request->input('option', 0);
        $id     = (int)$request->input('id', 0);

        $data = [];

        return response()->json(
            [
                'data' => $data,
                'next_step' => $step + 1,
                'option' => $option,
                'status' => 200
            ],
            200
        );
    }
}
