<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Uses;

class UsesController extends Controller
{
    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Thing $thing_id)
    {

        $thing = Thing::select('id', 'name')->find($thing_id);
        $places = Place::select('id', 'name')->get();
        $users = User::select('id', 'name')->where('role_id', 2)->orWhere('role_id', null)->get();

        return view('uses.create', ['thing'=>$thing, 'places'=>$places, 'users'=>$users]);
    }


     /**
     * Помещает созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
        ]);

        Uses::create($request->all());

        return redirect()->route('things.index')->with('success','things created successfully.');
    }


}
