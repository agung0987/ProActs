@extends('app')

@section('content')


<!-- form login -->
<section id="login text-center" style="background-image: url('img/bg.png') ; background-repeat:no-repeat; background-size:100%; height:100vh;">

    <div class="container">
        <div >
        <h4 style="text-align: center; ">Silahkan Register</h4>
        <div class="d-flex justify-content-center ">

            <div class="card mt-2" style="width: 350px;">
                <form style="padding: 20px 20px; " method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"><p> Name</p></label>
                        
                        <input id="name" style="margin-top: -25px;" type="text" aria-describedby="inputGroup-sizing-sm" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><p> Email address</p></label>
                        
                        <input id="email" style="margin-top: -25px;" type="email" aria-describedby="inputGroup-sizing-sm" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="pasword"  class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm"  class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    
                    <input  type="hidden" name="hakAkses" value="0">
                    <input  type="hidden" name="id_pegawai" value="0">
                    <button type="submit" class="btn btn-primary" style="background-color: #052840; width:100%; border-radius:2rem;">Register</button>
           
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