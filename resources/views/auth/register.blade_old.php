<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Create an Account - First Access Homecare Inc</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png') }}">
    @vite(['resources/my_assets/css/style.css?v1.1.1'])
  </head>
  <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
      <div class="nk-main">
        <div class="nk-wrap align-items-center justify-content-center has-mask">
          <div class="mask mask-3"></div>
          <div class="container p-2 p-sm-4">
            <div class="row flex-lg-row-reverse">
              <div class="col-lg-5">
                <div class="card card-gutter-lg rounded-4 card-auth">
                  <div class="card-body">
                    <div class="brand-logo mb-4">
                      <a href="../index.html.htm" class="logo-link">
                        <div class="logo-wrap">
                          <img src="{{asset('images/1staccess.png')}}" width="300" height="100">
                        </div>
                </a>
              </div>
              <div class="nk-block-head">
                            <div class="nk-block-head-content">
                              <h3 class="nk-block-title mb-1">Create New Account</h3>
                              <p class="small">Use your email continue with Nioboard (it's free)!</p>
                            </div>
                          </div>
                          <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-3">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="name" class="form-label">Username</label>
                                  <div class="form-control-wrap">
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off">
                                  </div>
                                </div>
                                @error('name')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="email" class="form-label">Email</label>
                                  <div class="form-control-wrap">
                                    <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off">
                                  </div>
                                </div>
                                @error('email')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="password" class="form-label">Password</label>
                                  <div class="form-control-wrap">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off">
                                  </div>
                                </div>
                                @error('password')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="password" class="form-label">Confirm Password</label>
                                  <div class="form-control-wrap">
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" autocomplete="off">
                                  </div>
                                </div>
                                @error('password_confirmation')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                              </div>
                              <div class="col-12">
                                <div class="form-check form-check-sm">
                                  <input name="privacy" class="form-check-input @error('privacy') is-invalid @enderror" type="checkbox" value="1" {{old('privacy') ? 'checked' : ''}} id="privacy" autocomplete="off">
                                  <label class="form-check-label" for="iAgree"> 
                                    I agree to <a href="#">privacy policy</a> & <a href="#">terms</a>
                                </label>
                                @error('privacy')
                                <p style="color: red">Please accept our Privacy Policy and Terms</p>
                                @enderror
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="d-grid">
                                  <button name="submit" class="btn btn-primary" type="submit">Sign up</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="text-center mt-4">
                            <p class="small">Already have an account? <a href="{{url('/')}}">Login</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7 align-self-center">
                    <div class="card-body is-theme ps-lg-4 pt-5 pt-lg-0">
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="h1 title mb-3">Welcome to our<br> community.</div>
                          <p>
                            Discover how to manage Two-Factor Authentication in Joomla. The two-factor authentication in Joomla is a very popular security practice.
                          </p>
                        </div>
                      </div>
                      <div class="mt-5 pt-4">
                        <div class="media-group media-group-overlap">
                          <div class="media media-sm media-circle media-border border-white">
                            <img src="../images/avatar/a.jpg" alt="">
                        </div>
                        <div class="media media-sm media-circle media-border border-white">
                          <img src="../images/avatar/b.jpg" alt="">
                        </div>
                        <div class="media media-sm media-circle media-border border-white">
                          <img src="../images/avatar/c.jpg" alt="">
                        </div>
                        <div class="media media-sm media-circle media-border border-white">
                          <img src="../images/avatar/d.jpg" alt="">
                        </div>
                      </div>
                      <p class="small mt-2">More than 2k people joined us, it's your turn</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    @vite(['resources/my_assets/js/bundle.js', 'resources/js/my_assets/scripts/js/scripts.js'])
    </html>