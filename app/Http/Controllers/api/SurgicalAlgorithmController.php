<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class SurgicalAlgorithmController extends Controller
{
    const ALGO_LIST_TABLE       = 'surgical_algorithms_list';
    const ALGO_DATA_TABLE       = 'surgical_algorithms';
    const ALGO_BUTTONS_TABLE    = 'surgical_algorithm_buttons';

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

        $res    = DB::select('SELECT `screen_type`, `show_logo`, `top_text`, `middle_text` FROM `' . self::ALGO_DATA_TABLE . '` WHERE `algorithm_id` = ? AND `step` = ? AND `selection` = ?', [$id, $step, $option]);

        if (empty($res)) {
            return response()->json(
                [
                    'error' => 'Screen not found',
                    'status' => 400
                ],
                400
            );
        }

        $buttons = DB::select('SELECT `text`,`bgcolor`, `button_option` AS `option` FROM `' . self::ALGO_BUTTONS_TABLE . '` WHERE `algorithm_id` = ? AND `step` = 1 AND `selection` = ? ORDER BY `option` ASC', [$id, $option]);

        return response()->json(
            [
                'data' => $res,
                'buttons' => $buttons,
                'status' => 200
            ],
            200
        );
    }
}
