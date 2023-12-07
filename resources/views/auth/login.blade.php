@extends('layouts.master')

@section('content')
<section class="flat-account background pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-login">
                    <div class="title">
                        <h3>Login</h3>
                    </div>
                    <form action="{{ route('login') }}" method="post" id="form-login" accept-charset="utf-8">
                        @csrf
                        <div class="form-box">
                            <label for="name-login">Username or email address * </label>
                            <input type="email" id="name-login" name="email" placeholder="Ali">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="password-login">Password * </label>
                            <input type="password" id="password-login" name="password" placeholder="******">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <button type="submit" class="login">
                                {{ __('Login') }}
                            </button>

                        </div><!-- /.form-box -->
                    </form><!-- /#form-login -->
                </div><!-- /.form-login -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
@endsection
