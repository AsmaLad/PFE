<?php

namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SettingsRequest,
    Repositories\ConfigAppRepository,
    Repositories\EnvRepository,
    Services\PannelAdmin
};;
use Illuminate\Http\Request;
use App\Models\Attestation;
use DB;
use Auth;


class AttestationController extends Controller
{
    use Indexable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attestations = \DB::table('attestations')
        ->select(DB::raw('*, attestations.id as AttestationId'))

        ->join('users','attestations.id_users', '=','users.id','left outer')
        ->get();
        //dd($attestations);die;
        return view('back.attestations.index',compact('attestations'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.attestations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $attestations = new Attestation();
        //dd($request->get('datepicker'));
        $attestations->ref = $request->input('ref');
        $attestations->legaliser = $request->input('legaliser') ;
        $attestations->dateAtt = $request->input('dateAtt'); 
        $attestations->id_users = Auth::user()->id;
        $attestations->is_valid = "0";

        $attestations->save();
        redirect('attestations.index')->with('success','Saved data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $attestations =  \DB::table('attestations')
         ->where('attestations.id','=',$id)
        ->select(DB::raw('*, attestations.id as AttestationId'))

        ->join('users','attestations.id_users', '=','users.id','left outer')
        ->first();
        //dd($attestations);die;
        return view('back.attestations.show',compact('attestations')); 
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation($id)
    {
        //   ->first() = pour affiche seulement le record que tu cherche c ta dire 1 pas plus 
        // est quand en utiliser first en n'utiliser pas la boucle foreach
        $attestations = Attestation::where('id',$id)->first();
        //dd($attestations);die;
        $attestations->is_valid = "1";
        $attestations->etat = "Validée";
        $attestations->save();
       
         return redirect()->route('attestations.index');
    }

    public function refus($id)
    {
        //   ->first() = pour affiche seulement le record que tu cherche c ta dire 1 pas plus 
        // est quand en utiliser first en n'utiliser pas la boucle foreach
        $attestations = Attestation::where('id',$id)->first();
        //dd($attestations);die;
        $attestations->is_valid = "2";
        $attestations->etat = "Refusée";
        $attestations->save();
       
         return redirect()->route('attestations.index');
    }

    public function print($id)
    {
         $attestations =  \DB::table('attestations')
         ->where('attestations.id','=',$id)
        ->select(DB::raw('*, attestations.id as AttestationId'))

        ->join('users','attestations.id_users', '=','users.id','left outer')
        ->first();
         //Attestation::find($id)->first();
        //dd($attestations);die; print or printx ????l
        return view('back.attestations.print',compact('attestations')); 
    }
}
