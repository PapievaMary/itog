<?php

namespace App\Http\Controllers;
use App\Models\Thing;
use App\Models\Uses;
use App\Models\Place;
use Illuminate\Http\Request;
use DB;
use Auth;
class ThingController extends Controller
{
    public function index()
    {
        
        if(Auth::user()->role_id == 1){
            $Things = DB::table('things')->get(); 
        }else{
            $Things = DB::table('things')->where('master', Auth::user()->id)->get(); 
        }

        return view('things.index',['things' => $Things]);
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('things.create');
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

        $thing = new Thing();
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->wrnt = $request->wrnt;
        $thing->created_at = date('d.m.Y H:i:s');
        $thing->updated_at = date('d.m.Y H:i:s'); 
        $thing->master = Auth::user()->id;
        // $request->master = Auth::user()->id;
        // Thing::create($request->all());
        $thing->save();


        return redirect()->route('things.index')->with('success','things created successfully.');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\Thing  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Thing $post)
    {
        return view('things.show',['things' => $Things]);
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Thing $thing)
    {
        return view('things.edit',['things' => $thing]);
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thing $thing)
    {
        $request->validate([
            
        ]);

        $thing->update($request->all());

        return redirect()->route('things.index')->with('success','Post updated successfully');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thing $thing)
    {
      $thing->delete();

       return redirect()->route('things.index')
                       ->with('success','post deleted successfully');
    }

    public function all()
    {
        $Things = DB::table('things')->get(); 
        $title = 'All Things';
        return view('things.report',['things' => $Things, 'titleReport' => $title]);
    }

    public function repair()
    {

        $Things = Thing::with('places')->has('places')->get();

        $data = array();

        foreach($Things as $Thing)
        {
            foreach ($Thing->places as $place)
            {
                $data[] = array(
                    'place_name' => $place->name,
                    'thing_name' => $Thing->name,
                    'thing_description' => $Thing->description,
                    'amount' => $place->pivot->amount,
                );
            }
        }

        return view('things.reports.repair',['things' => $data, 'titleReport' => 'Repair Things']);

    }

    public function work()
    {

        $data = array();
        $Things = Place::with('things')->where('work',1)->get();
        foreach($Things as $thing_list)
        {
            foreach($thing_list->things as $thing)
            {
                $data[] = array(
                    'thing_name' => $thing->name,
                    'thing_description' => $thing->description,
                    'amount' => $thing->pivot->amount,
                );
            }
        }
        return view('things.reports.work',['things' => $data, 'titleReport' => 'Work']);
    }

    public function used()
    {
        $Things = Thing::with('user')->has('user')->where('master', Auth::user()->id)->get(); 

        $data = array();
        foreach($Things as $Thing)
        {
            foreach($Thing->user as $user)
            {
                $data[] = array(
                    'user_name' => $user->name,
                    'thing_name' => $Thing->name,
                    'thing_description' => $Thing->description,
                    'amount' => $user->pivot->amount,
                );
            }
        }

        return view('things.reports.used',['things' => $data, 'titleReport' => 'Used Things']);
    }

}
