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
<button type="button" id="print">Print</button>
<div id="ToPrint">


<div class="float-right">
	
	{{ $attestations->ref}}
</div>

<h1></h1>

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
    loadCSS: "",
    header: "<h1><center> ATTESTATION DE TRAVAIL </center></h1>"
});
		});
	});
</script>

@endsection