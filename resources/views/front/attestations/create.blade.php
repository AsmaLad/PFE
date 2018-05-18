@extends('front.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('main')

<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Attestations</h1>

			<form action="{{ url ('attestations') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
				

				<div class="form-group">
					<label for="">Numero attestation :</label>
					<input type="text" name="ref" class="form-control">
				</div>

				
				<div class="form-group">
					<label for="">Date </label>
					<input type="date" name="dateAtt" class="form-control">
				</div>

				<div class="form-group">		
							<label for="">Legaliser </label>
							<input class="form-control" type="text" name="legaliser" >
				</div>

				<!-- <div class="form-group">		
							<label for="">Legaliser </label>
							<input class="form-control" type="checkbox" name="but" >Oui  
				  							<input class="form-control" type="checkbox" name="but" >Non 
				</div>
				 -->

				<input type="submit" class="form-control btn btn-primary" value="Envoyer">
				
				
			</form>
			
		</div>	
	</div>


</div>

@endsection