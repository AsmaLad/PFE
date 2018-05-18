<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Attestation;
use DB;
use Auth;

class AttestationController extends Controller
{
    //

     public function index()
    {
        // ->get() = pour affiche tout les records + la boucle foreach
        $attestations = \DB::table('attestations')
        ->select(DB::raw('*, attestations.id as AttestationId'))
       // ->where('attestations.is_','=',null)

        ->join('users','attestations.id_users','=','users.id','left outer')
        ->get();
      
        return view('front.attestations.index',compact('attestations'));
    }


      public function create()
    {
        return view('front.attestations.create');
    }


     public function store(Request $request)
    {
       // dd( Auth::user()->id);die;
       
        $attestations = new Attestation();
    
        $attestations->ref = $request->input('ref');
        $attestations->legaliser = $request->input('legaliser') ;
        $attestations->dateAtt = $request->input('dateAtt'); 
        $attestations->id_users = Auth::user()->id;
        $attestations->is_valid = "0";

        $attestations->save();
        redirect('attestations.index')->with('success','Saved data');
    }
    public function destroy(){
    	
       
    }


}
