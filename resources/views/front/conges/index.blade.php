@extends('front.layout')

@section('main')


<div class="float-right">
        <a href="{{ url('conges/create') }}" class="btn btn-success">Nouvelle demande </a></div>
        <div class="pull-right">
<div class="container mt-4">

<table class="table table-responsive table-striped table-bordered"  id="caisses-table" width="80%">
    <thead>
        <br><br>
     <tr>
    
     <th>date demande</th>
        <th>nom</th>
       <th>e-mail</th>
        <th>date début</th>
         <th>date fin </th>
        <th>etat</th>
        <th>actions</th>
  
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
           
                
            
        </tr>
        <td>
                            
                            <form action="{{ url('conges/'.$conge->id )}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}


                            <a href="{{ url('conges/'.$conge->id.'/edit') }}" class="btn btn-secondary">Editer</a>
                        

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        

 
                    
                        </form>

                        
                        </td></tr>
    @endforeach
    </tbody>
</table>
@endsection
