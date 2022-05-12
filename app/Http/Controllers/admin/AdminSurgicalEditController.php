<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SurgicalAlgorithmsList;
use Illuminate\Http\Request;


// Edits various data for algorithms. Putting all edit data logics into one controller.
class AdminSurgicalEditController extends Controller
{
    public  function index()
    {

    }

    // Update algorithm title
    public function updateTitle(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'id' => 'required|numeric|exists:surgical_algorithms,algorithm_id'
        ]);

        SurgicalAlgorithmsList::where('id', $request->input('id'))->update($data);
        return redirect()->route('surgical-list')->with('success','Algorithm title has been updated successfully');        
    }


    // Update screen data
    public function updateScreen(Request $request)
    {
        $data = $request->validate([
            'screen_type' => 'required|numeric',
            'id' => 'required|numeric|exists:surgical_algorithms,algorithm_id'
        ]);
        
        return redirect()->back()->with('error', 'Edit screen error');
    }


}
