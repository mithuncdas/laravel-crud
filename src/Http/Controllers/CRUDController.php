<?php

namespace Mithuncdas\LaravelCRUD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mithuncdas\LaravelCRUD\Models\Crud;

class CRUDController extends Controller
{

    public function index()
    {
        $items = Crud::get();
        return view('crud::crud.index',[
            'items' => $items
        ]);
    }

    public function create(){
        return view('crud::crud.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255'
        ]);

        Crud::create([
            'title' => $request->title,
            'details' => $request->details,
        ]);
        return back()->with('item_created_succssuflly','Item Created Succesfully');

    }

    public function edit($id){
        $item = Crud::where('id',$id)->firstOrFail();
        return view('crud::crud.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255'
        ]);

        Crud::where('id',$id)->update([
            'title' => $request->title,
            'details' => $request->details,
        ]);
        return back()->with('item_updated_succssuflly', 'Item Updated Succesfully');
    }

    public function show($id){
        $item = Crud::where('id',$id)->firstOrFail();
        return view('crud::crud.show',[
            'item' => $item
        ]);
    }

    public function destroy($id){
        $item = Crud::where('id', $id)->firstOrFail();
        $item->delete();
        return back()->with('item_deleted_succssuflly', 'Item Deleted Succesfully');
    }
}