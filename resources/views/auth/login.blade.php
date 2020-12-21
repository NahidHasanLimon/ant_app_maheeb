@extends('layouts.ant-login')

@section('content')
    <div class="form-wrapper">
        <div class="login-heading">
            <h1 class="text-center">Enter the Anthill</h1>
        </div>

        <main>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="field">
                    <input type="email" name="email" class="input @error('email') is-invalid @enderror" id="email" placeholder=" " value="{{old('email')}}" required autocomplete="email" autofocus>
                    <label for="email" class="label">Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="field">
                    <i class="far fa-eye" id="eye"></i>
                    {{--<i class="far fa-facebook" id="test"></i>--}}
                    <input type="password" name="password" class="input  @error('password') is-invalid @enderror" id="pwd" placeholder=" " required autocomplete="current-password">
                    <label for="password" class="label">Password</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="row">

                    <div class="col-md-3">

                    <input type="submit" class="loginBtn mt-3" type="button "name="login" value="Login" class="input"><br>

                </div>
                    <div class="col-md-9 mt-3 d-flex justify-content-end">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>


                {{--<!-- <input type="submit" class="loginBtn mt-3" type="button "name="login" value="Login" class="input"><br> -->--}}

                {{--<button class="loginBtn mt-5" type="submit">--}}
                    {{--Login--}}
                {{--</button>--}}
            </form>
        </main>
    </div>




@endsection
