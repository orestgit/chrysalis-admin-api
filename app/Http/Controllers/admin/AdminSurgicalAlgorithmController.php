<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SurgicalAlgorithms;
use App\Models\SurgicalAlgorithmsList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;


class AdminSurgicalAlgorithmController extends Controller
{
    const ALGO_LIST_TABLE       = 'surgical_algorithms_list';
    const ALGO_DATA_TABLE       = 'surgical_algorithms';
    const ALGO_BUTTONS_TABLE    = 'surgical_algorithm_buttons';
    
    public  function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|exists:surgical_algorithms_list,id',
        ]);

        if ($validator->fails()) {
            return  redirect()->route('surgical-list')->with('error', 'Such Surgical Algorithm does not exist');
        }

        $id     = $request->query('id');
        $action = $request->query('action');
        $step   = (int)$request->query('step');
        $option = (int)$request->query('option');

        $algo = SurgicalAlgorithmsList::when($id, function ($query, $id) {
            return $query->where('id', $id);
        })->first();

        $screen_data = DB::select('SELECT * FROM `' . self::ALGO_DATA_TABLE . '` WHERE algorithm_id = ? AND step = ? AND selection = ?', [$id, $step, $option]);
        $buttons = DB::select('SELECT `text`, `step`, `button_option`, `bgcolor`, `txtcolor` FROM `' . self::ALGO_BUTTONS_TABLE . '` WHERE algorithm_id = ? AND step = ? AND selection = ?', [$id,  $step, $option]);

        $data['heading']     = Str::ucfirst($action) . ' Algorithm';
        $data['sub_heading'] = Str::ucfirst($action) . ' Current Surgical Algorithm';
        $data['algorithm']   = $algo;
        $data['screen']      = !empty($screen_data[0]) ? $screen_data[0] : null;
        $data['buttons']     = $buttons;
        $data['step']        = $step;

        return view('admin.surgical_algorithm.' . $action, $data);
    }
}
