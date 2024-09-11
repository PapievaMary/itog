<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use DB;

class PlaceController extends Controller
{
    public function index()
    {
        
        $places = DB::table('places')->get(); 

        return view('places.index',['places' => $places]);
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',[self::class]);
       return view('places.create');
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

        Place::create($request->all());
        
        return redirect()->route('places.index')->with('success','things created successfully.');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Thing $post)
    {
      $Things = DB::table('things')->get(); 

        return view('things.show',['things' => $Things]);
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('places.edit',['places' => $place]);
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            
        ]);

        $place->update($request->all());

        return redirect()->route('places.index')->with('success','Post updated successfully');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
      $place->delete();

      return redirect()->route('places.index')
                       ->with('success','post deleted successfully');
    }
}
