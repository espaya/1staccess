<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Login  - 1staccess Home Care </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Login - 1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        @vite(['resources/css/bootstrap.min.css', 'resources/css/icons.min.css', 'resources/css/app.min.css'])

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">1staccess Home Care</h5>
                                            <p>Job Application Portal</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <br>
                                <div class="p-2">
                                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input value="{{old('email')}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off">
                                            @error('email') 
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-alert-outline me-2"></i>
                                                        {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div> 
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                            @error('password') 
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-alert-outline me-2"></i>
                                                        {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div> 
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                        <input name="remember" class="form-check-input" type="checkbox" value="" id="remember" {{ old('remember') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button name="submit" class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="{{url('/forgot-password')}}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Don't have an account ? <a href="{{url('/register')}}" class="fw-medium text-primary"> Register now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script>
                                 1staccess Home Care.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        @vite(['resources/libs/jquery/jquery.min.js', 
        'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
        'resources/libs/metismenu/metisMenu.min.js', 
        'resources/libs/simplebar/simplebar.min.js', 
        'resources/libs/node-waves/waves.min.js',  
        'resources/js/app.js'])
    </body>
</html>
