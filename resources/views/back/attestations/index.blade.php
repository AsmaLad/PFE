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

<table class="table table-responsive table-striped table-bordered" id="caisses-table" width="100%">
    <thead>
     <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Reference</th>
        <th>legaliser</th>
        <th>Etat</th>
        <th>Date demande</th>
        <th>Action</th>

     </tr>
    </thead>
    <tbody>
    @foreach($attestations as $attestation)
        <tr>
            <td>{!! $attestation->name !!}</td>
            <td>{!! $attestation->email !!}</td>
            <td>{!! $attestation->ref !!}</td>
            <td>{!! $attestation->legaliser !!}</td>
            <td>{!! $attestation->etat !!}</td>
            <td>{!! $attestation->dateAtt !!}</td>
            
            <td><a class="btn btn-primary btn-xs btn-block" href="{{ url('admin/attestations/show', $attestation->AttestationId )  }}" role="button" title="@lang('Show')"><span class="fa fa-eye"></span></a></td>
             @if(Auth::user()->role == "admin")
            <td><a class="btn btn-success btn-xs btn-block" href="{{ url('admin/attestations/validation',$attestation->AttestationId ) }}" role="button" title="@lang('Valid')"><span class="fa fa-check"></span></a></td>
            <td><a class="btn btn-danger btn-xs btn-block" href="{{ url('admin/attestations/refus', $attestation->AttestationId ) }}" role="button" title="@lang('Refuse')"><span class="fa fa-times"></span></a></td>
            @endif
           <!--  <td><a class="btn btn-info btn-xs btn-block" href="{{ url('admin/attestations/print', $attestation->AttestationId ) }}" role="button" title="@lang('Print')"><span class="fa fa-print"></span></a></td> -->

            <td><button type="button" id="print" class="btn btn-info btn-xs btn-block"  role="button" title="@lang('Print')"><span class="fa fa-print"></span></button></td>
            

        </tr>
    @endforeach
    </tbody>
</table>

@endsection

@section('js')
<script src="{{ asset('adminlte/js/back.js') }}"></script>
<script src="{{ asset('js/printThis.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#print').on('click', function(){
            console.log("clicked");
            $('#ToPrint').printThis({
    importCSS: true,
    loadCSS: "",
    pageTitle: "Demande Attestation",
    header: "<h4 style='text-align: right;'>Réf:RDH {{ $attestation->ref}}/2018 </h4><br><br><h1 style='text-decoration: underline;'><center>ATTESTATION DE TRAVAIL</center></h1><br><br><br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'>Je soussigné  Mr. <b>SMITI Samir </b> Chef Comptable et Affaires Administratives de la société sise au Rue de La Bource - Immeuble Les<br> Pins - Escaliser B- 1053 - Les Berges du Lac - Tunis, atteste par la présente que <br><br><h3><center><b> {{ $attestation->name}} </b></center></h3><br><br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'> titulaire de la CIN N° xxxxxxxx, ainsi que d'une affiliation sociale sous le numero xxxxxxxx xx fait partie du personnel 'titulaire/non titulaire' de notre société et travaillant selon nos horaires administratives sous le régime de 48 heures par semaine depuis le 'Date de recutement JJ/MM/AAAA' en sa qualite de :</p><br><h3><center><b>'TITRE DE LEMPLOYE'</b></center></h3> <br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'>Cette attestation est délivrée a l'intéressé sur sa demande pour servir et valoir ce que de droit.</p>                <h4 style='text-align:right;'><b> Fait a Sousse, le 'date du systeme'</b></h4> <br><h4 style='text-align:right;margin-right:70px;'><b> Signature du responsable</b></h4> <h4 style='text-align:right;margin-right:150px;'><br><b>Mr.SMITI Samir</b></h4><br>",
    
     footer:"<hr> <p align='center'><b> TAV information Services CO. – Rue de La Bourse, Immeuble Les Pins, 3éme Etage, Les Berges Du Lac, 1053, Tunis <br>Tél : 73 103 000 – Fax : 73 103 044 - MF : 1068728L/A/M/000 – RC : B0179182008</b> </p>"
});
        });
    });
</script>

@endsection