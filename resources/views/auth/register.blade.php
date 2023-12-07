@extends('layouts.master')

@section('content')
<section class="flat-account background pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-register" style="height: 100% !important;">
                    <div class="title">
                        <h3>Register</h3>
                    </div>
                    <form action="{{ route('register') }}" method="post" id="form-register" accept-charset="utf-8">
                        @csrf()
                        <div class="form-box">
                            <label for="name-register">Full Name * </label>
                            <input type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="email-register">Email address * </label>
                            <input type="email" id="name-register" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="password-register">Password</label>
                            <input type="password" id="password-register" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="password-confirmation">Password</label>
                            <input type="password" id="password-confirmation" name="password_confirmation" required autocomplete="new-password">
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <button type="submit" class="register">Register</button>
                        </div><!-- /.form-box -->
                    </form><!-- /#form-register -->
                </div><!-- /.form-register -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
@endsection
