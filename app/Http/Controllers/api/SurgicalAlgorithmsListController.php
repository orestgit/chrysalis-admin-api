<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SurgicalAlgorithmsList;

class SurgicalAlgorithmsListController extends Controller
{
    public function listSurgicalAlgorithms()
    {
        $data['categories'] = SurgicalAlgorithmsList::get(['id', 'title']);
        return response()->json(
            [
                'data' => $data,
                'status' => 200
            ],
            200
        );
    }
}
