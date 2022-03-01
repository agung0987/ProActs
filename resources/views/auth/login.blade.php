@extends('app')

@section('content')


<!-- form login -->
<section id="login text-center" style="background-image: url('img/bg2.png') ; background-repeat:no-repeat; background-size:100%; height:100vh;">

    <div class="container">
        <div style="margin-top:5rem">
        <h4 style="text-align: center; ">Silahkan Login</h4>
        <div class="d-flex justify-content-center ">

            <div class="card mt-2" style="width: 350px;">
                <form style="padding: 20px 20px; " method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><p> Email address</p></label>
                        
                        <input id="email" style="margin-top: -25px;" type="email" aria-describedby="inputGroup-sizing-sm" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1"  class="form-label">Password</label>
                        <input id="password" type="password" style="margin-top: -10px;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="mb-3 form-check">
                    <input class="form-check-input" 
                                    type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                   
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #052840; width:100%; border-radius:2rem;">Login</button> @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#052840;">
                                    {{ __('Lupa Password?') }}
                                </a>
                                @endif
                </form>
            </div>
        </div>
        </div>
        
    </div>
</section>
<!-- tutup login -->



<!-- tutup navbar -->


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection