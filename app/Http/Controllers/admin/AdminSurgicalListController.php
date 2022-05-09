<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SurgicalAlgorithmsList;
use Illuminate\Http\Request;

class AdminSurgicalListController extends Controller
{
    public  function index()
    {
        $data['heading'] = 'List of Algorithms';
        $data['sub_heading'] = 'List of Current Surgical Algorithms';
        $data['categories'] = SurgicalAlgorithmsList::all();
        return view('admin.surgical_list.index', $data);
    }

    public  function  add()
    {
        $data['heading'] = 'Add New Algorythm';
        $data['sub_heading'] = 'Add New Surgical Algorythm';
        return view('admin.surgical_list.create', $data);
    }

    public  function  store(Request $request)
    {
        $data = $request->validate([
            'title'  => 'required',
        ]);
        SurgicalAlgorithmsList::insert(['title' => $request->input('title')]);
        return redirect()->route('surgical-list')->with('success', 'Surgical Algorythm has been created');
    }

    public  function  edit(Request $request)
    {
        $data['category'] = SurgicalAlgorithmsList::where('id', $request->id)->first();
        $data['heading'] = 'Add Surgical Category';
        $data['sub_heading'] = 'New Surgical Category';
        return view('admin.surgical_list.edit', $data);
    }

    public  function  update(Request $request)
    {
        SurgicalAlgorithmsList::where('id', $request->id)->update([
            'title' =>  $request->title,
        ]);
        return redirect()->route('surgical-list')->with('success', 'Surgical Algorythm has been updated');
    }

    public  function delete(Request $request)
    {
        SurgicalAlgorithmsList::where('id', $request['id'])->delete();
        // TODO: delete related tables. Ideally via foreign key
        return redirect()->route('surgical-list')->with('success', 'Surgical Algorythm has been deleted');
    }
}
