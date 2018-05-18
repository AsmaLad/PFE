@extends('front.layout')

@section('main')

hello
ici par exemple 

cette page pour l'utilisateur {{Auth::user()->name}} est son role {{Auth::user()->role}}


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h3>1</h3>
            <p>Attestations</p>
        </div>
        <div class="icon">
            <span class="fa fa-file"></span>
        </div>
        <a href="{{url('/attestations')}}" class="small-box-footer">
            @lang('More info') <span class="fa fa-arrow-circle-right"></span>
        </a>
    </div>
</div>



@endsection

<!-- jQuery 3.2.0 -->
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.js"></script>

<!-- @yield('js')
<script src="{{ asset('adminlte/js/app.min.js') }}"></script>
                  <script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })
</script> -->