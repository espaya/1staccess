
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Register - 1staccess Home Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Register - 1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                            <p>Job Application Portal.</p>
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
                                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off">
                                            @error('name')
                                            <div class="invalid-feedback">
                                               {{$message}}
                                            </div> 
                                            @enderror 
                                        </div>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off"> 
                                            @error('email') 
                                            <div class="invalid-feedback">
                                               {{$message}}
                                            </div>  
                                            @enderror    
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                $message
                                            </div>   
                                            @enderror    
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Conform Password</label>
                                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" autocomplete="off">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>   
                                            @enderror    
                                        </div>

                                        <div class="mb-3">
                                            <input name="privacy" class="form-check-input @error('privacy') is-invalid @enderror" type="checkbox" value="1" {{old('privacy') ? 'checked' : ''}} id="privacy" autocomplete="off">
                                            <label class="form-check-label" for="iAgree"> 
                                                I agree to <a href="#">privacy policy</a> & <a href="#">terms</a>
                                            </label>
                                            @error('privacy')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div> 
                                            @enderror      
                                        </div>
                    
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the First Access Homecare Inc <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Already have an account ? <a href="{{url('/')}}" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> First Access Homecare Inc.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
    @vite(['resources/libs/jquery/jquery.min.js', 
      'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
      'resources/libs/metismenu/metisMenu.min.js', 
      'resources/libs/simplebar/simplebar.min.js', 
      'resources/libs/node-waves/waves.min.js',  
      'resources/js/app.js'
      ])


    </body>
</html>
