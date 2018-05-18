@extends('front.layout')

@section('main')



<div class="container" style="background-color:"">
	<div class="row">

		<div class="col-md-10">


			<h2>demande de congé</h2>
			
					
			<form action="{{ url ('conges') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
			




<div class="form-group @if($errors->get('Date_demnd')) has-error @endif">
					<label for=""> date demande</label>
					<input type="date" name="Date_demnd" class="form-control" value="{{ old('Date_demnd') }}" >
				</div>
						@if($errors->get('Date_demnd'))
					@foreach($errors->get('Date_demnd') as $message)
						<li>{{ $message }}</li>
					@endforeach
				@endif
		

				<div class="form-group @if($errors->get('DateDeb')) has-error @endif">
					<label for=""> date début</label>
					<input type="date" name="DateDeb" class="form-control" value="{{ old('DateDeb') }}" >
				</div>

@if($errors->get('DateDeb'))
					@foreach($errors->get('DateDeb') as $message)
						<li>{{ $message }}</li>
					@endforeach
				@endif

				<div class="form-group @if($errors->get('DateFin')) has-error @endif">
					<label for=""> Date fin</label>
					<input type="date" name="DateFin" class="form-control" value="{{ old('DateFin') }}">
					@if($errors->get('DateFin'))
					@foreach($errors->get('DateFin') as $message)
						<li>{{ $message }}</li>
					@endforeach
				@endif
				</div>
					<div class="form-group">
					<label for="">durée</label>
					<input type="text" name="Durée" class="form-control" value="2" >
				</div>


				<div class="col-md-16">
					<label for="">raison</label>
					<textarea  name="motif" class="form-control" >{{ old('motif') }}</textarea>
					<br>
					<br>
				</div>
				@if($errors->get('motif'))
					@foreach($errors->get('motif') as $message)
						<li>{{ $message }}</li>
					@endforeach
				@endif

				<div class="col-md-16">
				
					
					
					
				

				<div class="form-group">
				<input type="submit" class="form-control btn btn-primary" value="Envoyer">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-danger" value="Modifier">
				</div>
				
			</form>
			
		

		</div>	
	</div>

</div>
@endsection
