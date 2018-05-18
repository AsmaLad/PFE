<?php

namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SettingsRequest,
    Repositories\ConfigAppRepository,
    Repositories\EnvRepository,
    Services\PannelAdmin
   
  
};;
use App\Http\Requests\CongeRequest;
use Illuminate\Http\Request;
use App\Models\Conge;
use DB;
use Auth;

class CongeController extends Controller
{
      use Indexable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ->get() = pour affiche tout les records + la boucle foreach
        $conges = \DB::table('conges')
        ->select(DB::raw('*, conges.id as CongeId'))
       // ->where('conges.is_','=',null)
        ->join('users','conges.id_users','=','users.id','left outer')
        ->get();
        //dd($conges);die;
        return view('back.conges.index',compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function validation($id)
    {
        //   ->first() = pour affiche seulement le record que tu cherche c ta dire 1 pas plus 
        // est quand en utiliser first en n'utiliser pas la boucle foreach
        $conges = Conge::where('id',$id)->first();
        //dd($conges);die;
        $conges->is_valid = "1";
        $conges->save();
       
         return redirect()->route('conges.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CongeRequest $request)
    {
       // dd( Auth::user()->id);die;
       $conges = new Conge();
          $conges->Date_demnd = $request->input('Date_demnd');

       $conges->DateDeb = $request->input('DateDeb');
              $conges->DateFin = $request->input('DateFin');
                 $conges->Durée = $request->input('Durée');
        $conges->motif = $request->input('motif');
   
       $conges->id_users = Auth::user()->id;
        $conges->is_valid = "0";

       $conges->save();



       redirect('conges.index')->with('success','Saved data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CongeRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CongeRequest $request, $id)
    {
          $conge = Conge::find($id);

    $conge->delete();
    return back();


    }
}
