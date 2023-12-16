<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="iSrDxv">

    <title>{{ config('app.name', 'LVM') }} Roleplay - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
  </head>
  <body class="text-center">
    <!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-block d-lg-flex">
        <img height="580px" src="https://i.pinimg.com/736x/ea/d3/99/ead399087734e62f2f037c43ae9f343f.jpg" alt="Trendy Pants and Shoes"
          class="rounded w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <!-- Email input -->
            <div class="mb-3">
                <label class="form-label" for="form2Example1">Email</label>
                <input name="email" aria-describedby="emailHelp" type="email" id="form2Example1" class="form-control" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="form2Example2">Password</label>
                <input name="password" type="password" id="form2Example2" class="form-control" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror     
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            @if (Route::has('password.request'))
            <div class="col">
                <!-- Simple link -->
                <a class="text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
              </div>
            </div>
            @endif

            <!-- Submit button -->
            <div class="row mb-2">
                <div class="col-md-6 offset-md-4 d-flex">
                  <button type="submit" style="width: 260px;" class="btn btn-primary btn-block">Login</button>
                </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<script src="{{ asset('assets/bootstrap.min.js') }}" type="text/javascript"></script>
  </body>
</html>