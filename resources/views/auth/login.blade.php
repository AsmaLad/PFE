@extends('front.home')

@section('main')

<div class="container-fluid bg">
        <div>
                
                    @if (session('confirmation-success'))
                        @component('front.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('confirmation-success') !!}
                        @endcomponent
                    @endif
                    @if (session('confirmation-danger'))
                        @component('front.components.alert')
                            @slot('type')
                                error
                            @endslot
                            {!! session('confirmation-danger') !!}
                        @endcomponent
                    @endif

                    
                    <div class="col-md-4 col-sm-4 col-xs-12"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    
                    <form role="form" method="POST" action="{{ route('login') }}" class="form-container">
                        {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('front.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif   
                        <input id="log" type="text" placeholder="@lang('Login')" class="form-control" name="log" value="{{ old('log') }}" required autofocus>
                        <input id="password" type="password" placeholder="@lang('Password')" class="form-control" name="password" required>
                        <label class="add-bottom">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                            <span class="label-text">@lang('Remember me')</span>
                        </label>
                        <input class="button-primary full-width-on-mobile form-control" type="submit" value="@lang('Login')">
                        <label class="add-bottom">
                            <a href="{{ route('password.request') }}">
                                @lang('Forgot Your Password?')
                            </a><br>
                           <!-- <a href="{{ route('register') }}">
                                @lang('Not registered?')
                            </a>-->
                        </label>
                    </form>
                 </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>    
        </div>
</div>    
@endsection
