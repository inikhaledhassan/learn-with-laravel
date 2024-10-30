<?php

namespace App\Http\Controllers;
use App\Models\First;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        return view('add_name');
    }


    public function updateName(Request $request){
        $userId = $request->id;
        $user = First::where('id', $userId)->first();
        return view('update_name', compact('user'));
    }


    public function viewName(){
        $names = First::all();
        return view('view_name', compact('names'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $first = new First();
        $first->name = $request->input('name');
        $first->save();

        return redirect()->back()->with('success', 'Name saved successfully!');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $first = First::findOrFail($id);
        $first->name = $request->input('name');
        $first->save();

        return redirect('/view')->with('success', 'Name updated successfully!');
    }

    public function delete(Request $request, $id){

        $first = First::findOrFail($id);
        $first->delete();

        return redirect()->back()->with('success', 'Name deleted successfully!');
    }
}
