@extends('frontend.master')
@section('content')

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">အကောင့်၀င်မည်</div>

                <div class="card-body">
                    <form method="POST" action="/user">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">ဖုန်းနံပါတ်</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone Number" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">စကား၀ှက်</label>

                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Password" />

                            </div>
                        </div>

                     

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    အကောင့်၀င်မည်</button>
                                <a href="/user_register" class="text-decoration-none btn btn-add text-white ml-3">Register</a>
{{-- 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
