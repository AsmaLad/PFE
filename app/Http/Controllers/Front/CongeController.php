<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CongeRequest;

use App\Models\Conge;
use DB;
use Auth;


class CongeController extends Controller
{
     public function index()
    {
        // ->get() = pour affiche tout les records + la boucle foreach
        $conges = \DB::table('conges')
        ->select(DB::raw('*, conges.id as CongeId'))
       // ->where('conges.is_','=',null)

        ->join('users','conges.id_users','=','users.id','left outer')
        ->get();
      
        return view('front.conges.index',compact('conges'));
    }
      public function create()
    {
        return view('front.conges.create');
    }
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
    public function destroy(CongeRequest $request,$id){
    	   $conge = Conge::find($id);
    $this->authorize('delete', $conge);


        $conge->delete();

        return back();
}
}
