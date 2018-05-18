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
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-print"> Imprimer</span>
  
</button>
    <div class="row">
        <div class="col-md-12" >
            <div class="box">
                <div class="box-body">
	               <hr> 
	               <h3>Réference</h3>
	               <hr>
	               {{ $attestations->ref }}
	               <hr>
	               <h3>Legalisation</h3>
	               <hr>
	               {{ $attestations->legaliser }}
	               <hr>
	               <h3>Date demande</h3>
	               <hr>
	               {{ $attestations->dateAtt }}	
	               <hr>
	               <h3>Etat</h3>
	               <hr>
	               {{ $attestations->etat }}
	               <hr>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Fiche d'attestation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ToPrint">
        <h4 style='text-align: right;'>Réf:RDH {{ $attestations->ref}}/2018 </h4><br><br><h1 style='text-decoration: underline;'><center>ATTESTATION DE TRAVAIL</center></h1><br><br><br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'>Je soussigné  Mr. <b>SMITI Samir </b> Chef Comptable et Affaires Administratives de la société sise au Rue de La Bource - Immeuble Les<br> Pins - Escaliser B- 1053 - Les Berges du Lac - Tunis, atteste par la présente que <br><br><h3><center><b> {{ $attestations->name}} </b></center></h3><br><br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'> titulaire de la CIN N° xxxxxxxx, ainsi que d'une affiliation sociale sous le numero xxxxxxxx xx fait partie du personnel 'titulaire/non titulaire' de notre société et travaillant selon nos horaires administratives sous le régime de 48 heures par semaine depuis le 'Date de recutement JJ/MM/AAAA' en sa qualite de :</p><br><h3><center><b>'TITRE DE LEMPLOYE'</b></center></h3> <br><p style='margin-left:40px;margin-right:40px;font-size: 18px;'>Cette attestation est délivrée a l'intéressé sur sa demande pour servir et valoir ce que de droit.</p>                <h4 style='text-align:right;'><b> Fait a Sousse, le 'date du systeme'</b></h4> <br><h4 style='text-align:right;margin-right:70px;'><b> Signature du responsable</b></h4> <h4 style='text-align:right;margin-right:150px;'><br><b>Mr.SMITI Samir</b></h4><br>
    
     <hr> <p align='center'><b> TAV information Services CO. – Rue de La Bourse, Immeuble Les Pins, 3éme Etage, Les Berges Du Lac, 1053, Tunis <br>Tél : 73 103 000 – Fax : 73 103 044 - MF : 1068728L/A/M/000 – RC : B0179182008</b> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="print" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
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
    loadCSS: ""
    
});
        });
    });
</script>

@endsection