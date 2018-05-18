
@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('main')



<div class="container mt-8">

<table class="table table-responsive table-striped table-bordered" id="caisses-table" width="100%">
    <thead>
        <br><br>
     <tr>
    
     <th>date demande</th>
        <th>nom</th>
       <th>e-mail</th>
        <th>date début</th>
         <th>date fin </th>
        <th>etat</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($conges as $conge)
        <tr>
            <td>{!! $conge ->created_at !!}</td>
            <td> {!! $conge->name !!}</td>
     
            <td> {!! $conge->email !!}</td>
  
            <td>{!! $conge->DateDeb !!}</td>
            <td>{!! $conge->DateFin !!}</td>
        
            @if($conge->is_valid == 0 )
            <td>en attente</td>
            @else
            <td>Validé</td>
            @endif
            <td>
                @if(Auth::user()->role == "admin")
                 <a href="{{ url('admin/conges/validation',$conge->CongeId ) }}">
                    Validation Conge
                 </a>
                 @endif
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
