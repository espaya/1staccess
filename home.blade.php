<?php
use Illuminate\Support\Facades\Auth;

if (!Auth::check()) {
    // The user is not logged in, so redirect to the homepage
    return redirect('/');
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="author" content="Softnio">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


      <title>Dashboard - First Access Homecare Inc</title>
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
      @vite(['resources/my_assets/css/style.css'])
   </head>
   <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
      @include('dashboard/forms/welcome_app_form')
      <!-- <div class="nk-app-root">
         <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
               <div class="nk-sidebar-element nk-sidebar-head">
                  <div class="nk-sidebar-brand">
                     <a href="{{ url('/dashboard/') }}" class="logo-link">
                        <div class="logo-wrap">
                           <svg class="logo-svg" viewbox="0 0 174 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g class="logo-text">
                                 <path d="M40.96 28V7.84H44.824L53.588 21.28V7.84H57.452V28H53.588L44.824 14.56V28H40.96ZM60.6584 28V7.84H64.4664V28H60.6584ZM76.3356 28.42C74.3196 28.42 72.5789 27.9813 71.1136 27.104C69.6576 26.2267 68.5329 24.9993 67.7396 23.422C66.9556 21.8447 66.5636 20.0107 66.5636 17.92C66.5636 15.8293 66.9556 13.9953 67.7396 12.418C68.5329 10.8407 69.6576 9.61333 71.1136 8.736C72.5789 7.85867 74.3196 7.42 76.3356 7.42C78.3516 7.42 80.0876 7.85867 81.5436 8.736C83.0089 9.61333 84.1336 10.8407 84.9176 12.418C85.7109 13.9953 86.1076 15.8293 86.1076 17.92C86.1076 20.0107 85.7109 21.8447 84.9176 23.422C84.1336 24.9993 83.0089 26.2267 81.5436 27.104C80.0876 27.9813 78.3516 28.42 76.3356 28.42ZM76.3356 24.836C77.6143 24.8547 78.6783 24.5793 79.5276 24.01C80.3769 23.4407 81.0116 22.6333 81.4316 21.588C81.8609 20.5427 82.0756 19.32 82.0756 17.92C82.0756 16.52 81.8609 15.3067 81.4316 14.28C81.0116 13.2533 80.3769 12.4553 79.5276 11.886C78.6783 11.3167 77.6143 11.0227 76.3356 11.004C75.0569 10.9853 73.9929 11.2607 73.1436 11.83C72.2943 12.3993 71.6549 13.2067 71.2256 14.252C70.8056 15.2973 70.5956 16.52 70.5956 17.92C70.5956 19.32 70.8056 20.5333 71.2256 21.56C71.6549 22.5867 72.2943 23.3847 73.1436 23.954C73.9929 24.5233 75.0569 24.8173 76.3356 24.836ZM87.9223 28V7.84H95.7063C96.8357 7.84 97.8203 8.07333 98.6603 8.54C99.5003 9.00667 100.154 9.63667 100.62 10.43C101.087 11.214 101.32 12.082 101.32 13.034C101.32 14.1167 101.031 15.0827 100.452 15.932C99.8737 16.772 99.099 17.3553 98.1283 17.682L98.1003 16.996C99.407 17.3693 100.434 18.0227 101.18 18.956C101.927 19.8893 102.3 21.0187 102.3 22.344C102.3 23.5107 102.053 24.5187 101.558 25.368C101.064 26.208 100.368 26.8567 99.4723 27.314C98.5763 27.7713 97.5357 28 96.3503 28H87.9223ZM89.9943 26.026H95.8463C96.6677 26.026 97.405 25.8813 98.0583 25.592C98.7117 25.2933 99.225 24.8733 99.5983 24.332C99.981 23.7907 100.172 23.1373 100.172 22.372C100.172 21.6253 99.9997 20.9533 99.6543 20.356C99.309 19.7587 98.8377 19.2827 98.2403 18.928C97.6523 18.564 96.9803 18.382 96.2243 18.382H89.9943V26.026ZM89.9943 16.436H95.6923C96.3363 16.436 96.9243 16.2913 97.4563 16.002C97.9883 15.7033 98.4083 15.2973 98.7163 14.784C99.0337 14.2707 99.1923 13.678 99.1923 13.006C99.1923 12.054 98.861 11.2793 98.1983 10.682C97.545 10.0847 96.7097 9.786 95.6923 9.786H89.9943V16.436ZM112.276 28.42C110.27 28.42 108.576 27.9767 107.194 27.09C105.813 26.194 104.768 24.9573 104.058 23.38C103.349 21.8027 102.994 19.9827 102.994 17.92C102.994 15.8573 103.349 14.0373 104.058 12.46C104.768 10.8827 105.813 9.65067 107.194 8.764C108.576 7.868 110.27 7.42 112.276 7.42C114.292 7.42 115.986 7.868 117.358 8.764C118.74 9.65067 119.785 10.8827 120.494 12.46C121.213 14.0373 121.572 15.8573 121.572 17.92C121.572 19.9827 121.213 21.8027 120.494 23.38C119.785 24.9573 118.74 26.194 117.358 27.09C115.986 27.9767 114.292 28.42 112.276 28.42ZM112.276 26.446C113.854 26.446 115.17 26.0867 116.224 25.368C117.279 24.6493 118.068 23.6507 118.59 22.372C119.122 21.084 119.388 19.6 119.388 17.92C119.388 16.24 119.122 14.7607 118.59 13.482C118.068 12.2033 117.279 11.2047 116.224 10.486C115.17 9.76733 113.854 9.40333 112.276 9.394C110.699 9.394 109.388 9.75333 108.342 10.472C107.297 11.1907 106.508 12.194 105.976 13.482C105.454 14.7607 105.188 16.24 105.178 17.92C105.169 19.6 105.426 21.0793 105.948 22.358C106.48 23.6273 107.274 24.626 108.328 25.354C109.383 26.0727 110.699 26.4367 112.276 26.446ZM121.449 28L128.393 7.84H131.123L138.067 28H135.925L129.331 8.988H130.143L123.591 28H121.449ZM124.543 23.114V21.182H134.959V23.114H124.543ZM139.615 28V7.84H147.399C147.595 7.84 147.814 7.84933 148.057 7.868C148.309 7.87733 148.561 7.90533 148.813 7.952C149.868 8.11067 150.759 8.47933 151.487 9.058C152.224 9.62733 152.78 10.346 153.153 11.214C153.536 12.082 153.727 13.0433 153.727 14.098C153.727 15.6193 153.326 16.94 152.523 18.06C151.72 19.18 150.572 19.8847 149.079 20.174L148.365 20.342H141.673V28H139.615ZM151.823 28L147.847 19.796L149.821 19.04L154.189 28H151.823ZM141.673 18.382H147.343C147.511 18.382 147.707 18.3727 147.931 18.354C148.155 18.3353 148.374 18.3027 148.589 18.256C149.28 18.1067 149.844 17.822 150.283 17.402C150.731 16.982 151.062 16.4827 151.277 15.904C151.501 15.3253 151.613 14.7233 151.613 14.098C151.613 13.4727 151.501 12.8707 151.277 12.292C151.062 11.704 150.731 11.2 150.283 10.78C149.844 10.36 149.28 10.0753 148.589 9.926C148.374 9.87933 148.155 9.85133 147.931 9.842C147.707 9.82333 147.511 9.814 147.343 9.814H141.673V18.382ZM156.299 28V7.84H162.417C162.632 7.84 162.996 7.84467 163.509 7.854C164.032 7.86333 164.531 7.90067 165.007 7.966C166.538 8.18067 167.817 8.75 168.843 9.674C169.87 10.598 170.64 11.774 171.153 13.202C171.667 14.63 171.923 16.2027 171.923 17.92C171.923 19.6373 171.667 21.21 171.153 22.638C170.64 24.066 169.87 25.242 168.843 26.166C167.817 27.09 166.538 27.6593 165.007 27.874C164.541 27.93 164.041 27.9673 163.509 27.986C162.977 27.9953 162.613 28 162.417 28H156.299ZM158.427 26.026H162.417C162.8 26.026 163.211 26.0167 163.649 25.998C164.097 25.97 164.48 25.9233 164.797 25.858C165.973 25.6527 166.921 25.1767 167.639 24.43C168.367 23.6833 168.899 22.75 169.235 21.63C169.571 20.5007 169.739 19.264 169.739 17.92C169.739 16.5667 169.571 15.3253 169.235 14.196C168.899 13.0667 168.367 12.1333 167.639 11.396C166.911 10.6587 165.964 10.1873 164.797 9.982C164.48 9.91667 164.093 9.87467 163.635 9.856C163.187 9.828 162.781 9.814 162.417 9.814H158.427V26.026Z" fill="currentColor">
                                 </path>
                              </g>
                              <g class="logo-monogram">
                                 <path d="M8.95187 8.1834C9.04813 7.89486 9.30481 7.7025 9.59358 7.7025H14.5027C16.0107 7.7025 17.3262 8.79255 17.5829 10.2994L19.0909 18.571L22.1711 8.1834C22.2353 7.99104 22.8128 5.74682 23.2299 4.43234L15.9786 0.264498C15.369 -0.0881659 14.631 -0.0881659 14.0214 0.264498L0.994652 7.76662C0.385027 8.11928 0 8.76049 0 9.46582V24.5021C0 25.2075 0.385027 25.8487 0.994652 26.2013L2.56684 27.1311L8.95187 8.1834Z" fill="url(#paint0_linear_3467_17210)">
                                 </path>
                                 <path d="M29.0373 7.76643L27.5934 6.93286L22.3314 25.7523C22.2351 26.0408 21.9785 26.2332 21.6897 26.2332L16.0747 26.2652C15.7539 26.2652 15.4651 26.0408 15.4009 25.7202L12.9303 13.4411L7.18701 29.7919L14.0212 33.7353C14.6309 34.088 15.3688 34.088 15.9785 33.7353L29.0052 26.2011C29.6148 25.8485 29.9998 25.2073 29.9998 24.5019V9.46563C29.9998 8.7603 29.6469 8.11909 29.0373 7.76643Z" fill="url(#paint1_linear_3467_17210)">
                                 </path>
                              </g>
                              <defs>
                                 <lineargradient id="paint0_linear_3467_17210" x1="11.615" y1="-2.58227e-08" x2="2.49215" y2="29.5115" gradientunits="userSpaceOnUse">
                                    <stop stop-color="var(--logo-sym-secondary-2,#17C5EB)"></stop>
                                    <stop offset="1" stop-color="var(--logo-sym-secondary-1,#0080FF)"></stop>
                                 </lineargradient>
                                 <lineargradient id="paint1_linear_3467_17210" x1="26" y1="-2.50127" x2="14.4905" y2="28.0095" gradientunits="userSpaceOnUse">
                                    <stop stop-color="var(--logo-sym-accent-2,#478FFC)"></stop>
                                    <stop offset="1" stop-color="var(--logo-sym-accent-1,#5F38F9)"></stop>
                                 </lineargradient>
                              </defs>
                           </svg>
                        </div>
                     </a>
                     <div class="nk-compact-toggle me-n1">
                        <button class="btn btn-md btn-icon text-light btn-no-hover compact-toggle">
                        <em class="icon off ni ni-chevrons-left"></em><em class="icon on ni ni-chevrons-right"></em>
                        </button>
                     </div>
                     <div class="nk-sidebar-toggle me-n1">
                        <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                        <em class="icon ni ni-arrow-left"></em>
                        </button>
                     </div>
                  </div>
               </div>
               @include('templates/dashboard/sidebar')
            </div>
            <div class="nk-wrap">
               <div class="nk-header nk-header-fixed">
                  <div class="container-fluid">
                     <div class="nk-header-wrap">
                        <div class="nk-header-logo ms-n1">
                           <div class="nk-sidebar-toggle"><button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em class="icon ni ni-menu"></em></button><button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu"></em></button></div>
                           <div class="nk-navbar-toggle me-2"><button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none"><em class="icon ni ni-menu-right"></em></button><button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu-right"></em></button></div>
                           <a href="index.html.htm" class="logo-link">
                              <div class="logo-wrap">
                                 <svg class="logo-svg" viewbox="0 0 174 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g class="logo-text">
                                       <path d="M40.96 28V7.84H44.824L53.588 21.28V7.84H57.452V28H53.588L44.824 14.56V28H40.96ZM60.6584 28V7.84H64.4664V28H60.6584ZM76.3356 28.42C74.3196 28.42 72.5789 27.9813 71.1136 27.104C69.6576 26.2267 68.5329 24.9993 67.7396 23.422C66.9556 21.8447 66.5636 20.0107 66.5636 17.92C66.5636 15.8293 66.9556 13.9953 67.7396 12.418C68.5329 10.8407 69.6576 9.61333 71.1136 8.736C72.5789 7.85867 74.3196 7.42 76.3356 7.42C78.3516 7.42 80.0876 7.85867 81.5436 8.736C83.0089 9.61333 84.1336 10.8407 84.9176 12.418C85.7109 13.9953 86.1076 15.8293 86.1076 17.92C86.1076 20.0107 85.7109 21.8447 84.9176 23.422C84.1336 24.9993 83.0089 26.2267 81.5436 27.104C80.0876 27.9813 78.3516 28.42 76.3356 28.42ZM76.3356 24.836C77.6143 24.8547 78.6783 24.5793 79.5276 24.01C80.3769 23.4407 81.0116 22.6333 81.4316 21.588C81.8609 20.5427 82.0756 19.32 82.0756 17.92C82.0756 16.52 81.8609 15.3067 81.4316 14.28C81.0116 13.2533 80.3769 12.4553 79.5276 11.886C78.6783 11.3167 77.6143 11.0227 76.3356 11.004C75.0569 10.9853 73.9929 11.2607 73.1436 11.83C72.2943 12.3993 71.6549 13.2067 71.2256 14.252C70.8056 15.2973 70.5956 16.52 70.5956 17.92C70.5956 19.32 70.8056 20.5333 71.2256 21.56C71.6549 22.5867 72.2943 23.3847 73.1436 23.954C73.9929 24.5233 75.0569 24.8173 76.3356 24.836ZM87.9223 28V7.84H95.7063C96.8357 7.84 97.8203 8.07333 98.6603 8.54C99.5003 9.00667 100.154 9.63667 100.62 10.43C101.087 11.214 101.32 12.082 101.32 13.034C101.32 14.1167 101.031 15.0827 100.452 15.932C99.8737 16.772 99.099 17.3553 98.1283 17.682L98.1003 16.996C99.407 17.3693 100.434 18.0227 101.18 18.956C101.927 19.8893 102.3 21.0187 102.3 22.344C102.3 23.5107 102.053 24.5187 101.558 25.368C101.064 26.208 100.368 26.8567 99.4723 27.314C98.5763 27.7713 97.5357 28 96.3503 28H87.9223ZM89.9943 26.026H95.8463C96.6677 26.026 97.405 25.8813 98.0583 25.592C98.7117 25.2933 99.225 24.8733 99.5983 24.332C99.981 23.7907 100.172 23.1373 100.172 22.372C100.172 21.6253 99.9997 20.9533 99.6543 20.356C99.309 19.7587 98.8377 19.2827 98.2403 18.928C97.6523 18.564 96.9803 18.382 96.2243 18.382H89.9943V26.026ZM89.9943 16.436H95.6923C96.3363 16.436 96.9243 16.2913 97.4563 16.002C97.9883 15.7033 98.4083 15.2973 98.7163 14.784C99.0337 14.2707 99.1923 13.678 99.1923 13.006C99.1923 12.054 98.861 11.2793 98.1983 10.682C97.545 10.0847 96.7097 9.786 95.6923 9.786H89.9943V16.436ZM112.276 28.42C110.27 28.42 108.576 27.9767 107.194 27.09C105.813 26.194 104.768 24.9573 104.058 23.38C103.349 21.8027 102.994 19.9827 102.994 17.92C102.994 15.8573 103.349 14.0373 104.058 12.46C104.768 10.8827 105.813 9.65067 107.194 8.764C108.576 7.868 110.27 7.42 112.276 7.42C114.292 7.42 115.986 7.868 117.358 8.764C118.74 9.65067 119.785 10.8827 120.494 12.46C121.213 14.0373 121.572 15.8573 121.572 17.92C121.572 19.9827 121.213 21.8027 120.494 23.38C119.785 24.9573 118.74 26.194 117.358 27.09C115.986 27.9767 114.292 28.42 112.276 28.42ZM112.276 26.446C113.854 26.446 115.17 26.0867 116.224 25.368C117.279 24.6493 118.068 23.6507 118.59 22.372C119.122 21.084 119.388 19.6 119.388 17.92C119.388 16.24 119.122 14.7607 118.59 13.482C118.068 12.2033 117.279 11.2047 116.224 10.486C115.17 9.76733 113.854 9.40333 112.276 9.394C110.699 9.394 109.388 9.75333 108.342 10.472C107.297 11.1907 106.508 12.194 105.976 13.482C105.454 14.7607 105.188 16.24 105.178 17.92C105.169 19.6 105.426 21.0793 105.948 22.358C106.48 23.6273 107.274 24.626 108.328 25.354C109.383 26.0727 110.699 26.4367 112.276 26.446ZM121.449 28L128.393 7.84H131.123L138.067 28H135.925L129.331 8.988H130.143L123.591 28H121.449ZM124.543 23.114V21.182H134.959V23.114H124.543ZM139.615 28V7.84H147.399C147.595 7.84 147.814 7.84933 148.057 7.868C148.309 7.87733 148.561 7.90533 148.813 7.952C149.868 8.11067 150.759 8.47933 151.487 9.058C152.224 9.62733 152.78 10.346 153.153 11.214C153.536 12.082 153.727 13.0433 153.727 14.098C153.727 15.6193 153.326 16.94 152.523 18.06C151.72 19.18 150.572 19.8847 149.079 20.174L148.365 20.342H141.673V28H139.615ZM151.823 28L147.847 19.796L149.821 19.04L154.189 28H151.823ZM141.673 18.382H147.343C147.511 18.382 147.707 18.3727 147.931 18.354C148.155 18.3353 148.374 18.3027 148.589 18.256C149.28 18.1067 149.844 17.822 150.283 17.402C150.731 16.982 151.062 16.4827 151.277 15.904C151.501 15.3253 151.613 14.7233 151.613 14.098C151.613 13.4727 151.501 12.8707 151.277 12.292C151.062 11.704 150.731 11.2 150.283 10.78C149.844 10.36 149.28 10.0753 148.589 9.926C148.374 9.87933 148.155 9.85133 147.931 9.842C147.707 9.82333 147.511 9.814 147.343 9.814H141.673V18.382ZM156.299 28V7.84H162.417C162.632 7.84 162.996 7.84467 163.509 7.854C164.032 7.86333 164.531 7.90067 165.007 7.966C166.538 8.18067 167.817 8.75 168.843 9.674C169.87 10.598 170.64 11.774 171.153 13.202C171.667 14.63 171.923 16.2027 171.923 17.92C171.923 19.6373 171.667 21.21 171.153 22.638C170.64 24.066 169.87 25.242 168.843 26.166C167.817 27.09 166.538 27.6593 165.007 27.874C164.541 27.93 164.041 27.9673 163.509 27.986C162.977 27.9953 162.613 28 162.417 28H156.299ZM158.427 26.026H162.417C162.8 26.026 163.211 26.0167 163.649 25.998C164.097 25.97 164.48 25.9233 164.797 25.858C165.973 25.6527 166.921 25.1767 167.639 24.43C168.367 23.6833 168.899 22.75 169.235 21.63C169.571 20.5007 169.739 19.264 169.739 17.92C169.739 16.5667 169.571 15.3253 169.235 14.196C168.899 13.0667 168.367 12.1333 167.639 11.396C166.911 10.6587 165.964 10.1873 164.797 9.982C164.48 9.91667 164.093 9.87467 163.635 9.856C163.187 9.828 162.781 9.814 162.417 9.814H158.427V26.026Z" fill="currentColor"></path>
                                    </g>
                                    <g class="logo-monogram">
                                       <path d="M8.95187 8.1834C9.04813 7.89486 9.30481 7.7025 9.59358 7.7025H14.5027C16.0107 7.7025 17.3262 8.79255 17.5829 10.2994L19.0909 18.571L22.1711 8.1834C22.2353 7.99104 22.8128 5.74682 23.2299 4.43234L15.9786 0.264498C15.369 -0.0881659 14.631 -0.0881659 14.0214 0.264498L0.994652 7.76662C0.385027 8.11928 0 8.76049 0 9.46582V24.5021C0 25.2075 0.385027 25.8487 0.994652 26.2013L2.56684 27.1311L8.95187 8.1834Z" fill="url(#paint0_linear_3467_17210)"></path>
                                       <path d="M29.0373 7.76643L27.5934 6.93286L22.3314 25.7523C22.2351 26.0408 21.9785 26.2332 21.6897 26.2332L16.0747 26.2652C15.7539 26.2652 15.4651 26.0408 15.4009 25.7202L12.9303 13.4411L7.18701 29.7919L14.0212 33.7353C14.6309 34.088 15.3688 34.088 15.9785 33.7353L29.0052 26.2011C29.6148 25.8485 29.9998 25.2073 29.9998 24.5019V9.46563C29.9998 8.7603 29.6469 8.11909 29.0373 7.76643Z" fill="url(#paint1_linear_3467_17210)"></path>
                                    </g>
                                    <defs>
                                       <lineargradient id="paint0_linear_3467_17210" x1="11.615" y1="-2.58227e-08" x2="2.49215" y2="29.5115" gradientunits="userSpaceOnUse">
                                          <stop stop-color="var(--logo-sym-secondary-2,#17C5EB)"></stop>
                                          <stop offset="1" stop-color="var(--logo-sym-secondary-1,#0080FF)"></stop>
                                       </lineargradient>
                                       <lineargradient id="paint1_linear_3467_17210" x1="26" y1="-2.50127" x2="14.4905" y2="28.0095" gradientunits="userSpaceOnUse">
                                          <stop stop-color="var(--logo-sym-accent-2,#478FFC)"></stop>
                                          <stop offset="1" stop-color="var(--logo-sym-accent-1,#5F38F9)"></stop>
                                       </lineargradient>
                                    </defs>
                                 </svg>
                              </div>
                           </a>
                        </div>

                        @include('templates/dashboard/nav')
                        @include('templates/dashboard/header_tools')
                     </div>
                  </div>
               </div>
               <div class="nk-content">
                  <div class="container-fluid">
                     <div class="nk-content-inner">
                        <div class="nk-content-body">
                           <div class="row g-gs">
                              <div class="col-xxl-7">
                                 <div class="row g-gs">
                                    <div class="col-md-6">
                                       <div class="card h-100">
                                          <div class="card-body">
                                             <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                <div class="nk-chart-project-active js-pureknob" data-readonly="true" data-size="110" data-angle-offset="0.4" data-angle-start="1" data-angle-end="1" data-value="73" data-track-width="0.15"></div>
                                                <div class="card-title mb-0 mt-4 mt-sm-0">
                                                   <h5 class="title mb-3 mb-xl-5">Active Projects</h5>
                                                   <div class="amount h1">284</div>
                                                   <div class="d-flex align-items-center smaller flex-wrap">
                                                      <div class="change up"><em class="icon ni ni-upword-alt-fill"></em> +2.7%</div>
                                                      <span class="text-light"> Projects this month</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="card h-100">
                                          <div class="card-body">
                                             <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between gx-xl-5">
                                                <div class="nk-chart-project-earnings">
                                                   <canvas data-nk-chart="bar" id="earningsChart"></canvas>
                                                </div>
                                                <div class="card-title mb-0 mt-4 mt-sm-0">
                                                   <h5 class="title mb-3 mb-xl-5">Projects Earnings</h5>
                                                   <div class="amount h1">$169</div>
                                                   <div class="d-flex align-items-center smaller flex-wrap">
                                                      <div class="change up"><em class="icon ni ni-upword-alt-fill"></em> 10.5%</div>
                                                      <span class="text-light">From last Week</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="card h-100">
                                          <div class="card-body">
                                             <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between gx-xl-5">
                                                <div class="nk-chart-project-earnings">
                                                   <canvas data-nk-chart="line" id="totalClientsChart"></canvas>
                                                </div>
                                                <div class="card-title mb-0 mt-4 mt-sm-0">
                                                   <h5 class="title mb-3 mb-xl-5">Total Clients</h5>
                                                   <div class="amount h1">970</div>
                                                   <div class="d-flex align-items-center smaller flex-wrap">
                                                      <div class="change up"><em class="icon ni ni-upword-alt-fill"></em> 2%</div>
                                                      <span class="text-light">Than last month</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="card h-100">
                                          <div class="card-body">
                                             <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between gx-xl-5">
                                                <div class="nk-chart-project-done js-pureknob" data-readonly="true" data-size="136" data-angle-offset="-.5" data-angle-start=".7" data-angle-end=".7" data-value="65" data-color-fg="#F24A8B" data-track-width="0.15"><span class="knob-title small text-light">Task Done</span></div>
                                                <div class="card-title mb-0 mt-4 mt-sm-0">
                                                   <h5 class="title mb-3 mb-xl-5">Total Task Done</h5>
                                                   <div class="amount h1">768</div>
                                                   <div class="d-flex align-items-center smaller flex-wrap">
                                                      <div class="change up"><em class="icon ni ni-upword-alt-fill"></em> 14.2%</div>
                                                      <span class="text-light">From last week</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-5">
                                 <div class="card h-100 col-sep">
                                    <div class="card-body py-2 flex-grow-0">
                                       <div class="card-title-group">
                                          <div class="card-title">
                                             <h5 class="title">Projects Overview</h5>
                                          </div>
                                          <div class="card-tools">
                                             <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                   <li>
                                                      <div class="dropdown-header pt-2 pb-0">
                                                         <h6 class="mb-0">Options</h6>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <hr class="dropdown-divider">
                                                   </li>
                                                   <li><a href="#" class="dropdown-item">7 Days</a></li>
                                                   <li><a href="#" class="dropdown-item">15 Days</a></li>
                                                   <li><a href="#" class="dropdown-item">30 Days</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between">
                                       <div class="row g-gs text-center">
                                          <div class="col-6 col-sm-3">
                                             <div class="amount h2 mb-0 text-success">946</div>
                                             <span class="smaller">Total Projects</span>
                                          </div>
                                          <div class="col-6 col-sm-3">
                                             <div class="amount h2 mb-0 text-primary">280</div>
                                             <span class="smaller">Active Projects</span>
                                          </div>
                                          <div class="col-6 col-sm-3">
                                             <div class="amount h2 mb-0 text-secondary">586</div>
                                             <span class="smaller">Revenue</span>
                                          </div>
                                          <div class="col-6 col-sm-3">
                                             <div class="amount h2 mb-0 text-warning">9,453</div>
                                             <span class="smaller">Working Hours</span>
                                          </div>
                                       </div>
                                       <div class="nk-chart-project-overview mt-3">
                                          <canvas data-nk-chart="bar" id="projectsOverviewChart"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-7">
                                 <div class="card h-100">
                                    <div class="card-body py-2 flex-grow-0">
                                       <div class="card-title-group">
                                          <div class="card-title">
                                             <h5 class="title">Projects Stats</h5>
                                          </div>
                                          <div class="card-tools d-none d-sm-inline-block"><a href="#" class="btn btn-sm btn-soft btn-secondary">Export Report</a></div>
                                       </div>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-middle mb-0">
                                          <thead class="table-light table-head-sm">
                                             <tr>
                                                <th class="tb-col"><span class="overline-title">items</span></th>
                                                <th class="tb-col tb-col-end tb-col-xxl"><span class="overline-title">budget</span></th>
                                                <th class="tb-col tb-col-end tb-col-sm"><span class="overline-title">progress</span></th>
                                                <th class="tb-col tb-col-end  tb-col-xxl"><span class="overline-title">asign</span></th>
                                                <th class="tb-col tb-col-end">
                                                   <span class="overline-title">status</span>
                                                </th>
                                                <th class="tb-col tb-col-end"><span class="overline-title"><span class="d-none d-sm-inline-blcok">due</span> date</span></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/a.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Create Wireframe</a><span class="text smaller">Esther Howard</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$32,400</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">63%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="63%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end  tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="David"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Sanjoy"><img src="images/avatar/b.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Kinchit"><img src="images/avatar/c.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-info-soft">In progress</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">07 Sep 2022</span></td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/b.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Divine Opulence</a><span class="text smaller">Jenny Wilson</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$265,816</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">100%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="100%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/b.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/c.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-success-soft">Completed</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">12 Aug 2022</span></td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/c.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Charto CRM</a><span class="text smaller">Cody Fisher</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$9,538</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">30%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="30%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/b.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-info-soft">In progress</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">18 Oct 2022</span></td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/d.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Mountain Trip Kit </a><span class="text smaller">Savannah Nguyen</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$12,930</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">0%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="0%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Jhon"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Marku"><img src="images/avatar/b.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-warning-soft">Pending</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">25 Jul 2022</span></td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/e.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Chat Application</a><span class="text smaller">Jane Cooper</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$184,384</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">80%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="80%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Kevin"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Ebadot"><img src="images/avatar/b.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/c.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-info-soft">In progress</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">07 Sep 2022</span></td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/a.jpg" alt=""></div>
                                                      <div class="media-text"><a href="#" class="title">Mountain Trip Kit </a><span class="text smaller">Jane Cooper</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl"><span class="small">$12,930</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="d-flex align-items-center">
                                                      <span class="small me-1">36%</span>
                                                      <div class="progress progress-sm w-100">
                                                         <div class="progress-bar bg-success" data-progress="36%"></div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end tb-col-xxl">
                                                   <div class="media-group media-group-overlap">
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Jane Smith"><img src="images/avatar/a.jpg" alt=""></div>
                                                      <div class="media media-xs media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/b.jpg" alt=""></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="badge text-bg-info-soft">In progress</span></td>
                                                <td class="tb-col tb-col-end"><span class="small">25 Jul 2022</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-5">
                                 <div class="card h-100">
                                    <div class="card-body">
                                       <div class="row g-gs">
                                          <div class="col-sm-6">
                                             <div class="card-title">
                                                <div class="mb-1 small">Next Delivery</div>
                                                <h2 class="title">Chat Application</h2>
                                             </div>
                                             <div class="media-group my-4">
                                                <div class="media media-md media-middle media-circle"><img src="images/avatar/a.jpg" alt=""></div>
                                                <div class="media-text"><span class="title">Jenny Wilson</span><span class="text smaller">Manager</span></div>
                                             </div>
                                             <p class="small">Flat cartoony illustrations with vivid unblended colors and asymmetrical beautiful purple hair lady</p>
                                             <div class="list-group-dotted mt-4 mb-5">
                                                <div class="list-group-wrap">
                                                   <div class="p-3">
                                                      <div class="h5 mb-0">25 Oct 2022</div>
                                                      <span class="smaller">Due Date</span>
                                                   </div>
                                                   <div class="p-3">
                                                      <div class="h5 mb-0">$58,642</div>
                                                      <span class="smaller">Budget</span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="d-flex flex-wrap gap g-3">
                                                <div class="gap-col"><a href="#" class="btn btn-sm btn-soft btn-primary"><span>View Project</span><em class="icon ni ni-external-alt"></em></a></div>
                                                <div class="gap-col">
                                                   <div class="media-group media-group-overlap"><a href="#" class="media media-sm media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Alex Smith"><img src="images/avatar/a.jpg" alt=""></a><a href="#" class="media media-sm media-circle media-border border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Kevin Martin"><img src="images/avatar/b.jpg" alt=""></a></div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6 text-sm-end"><img src="images/product/a-lg.jpg" alt="" class="rounded img-cover"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-xxl-4">
                                 <div class="card h-100">
                                    <div class="card-body">
                                       <div class="card-title-group">
                                          <div class="card-title mb-0">
                                             <h5 class="title">Avg. Agent Earnings</h5>
                                          </div>
                                          <div class="card-tools">
                                             <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                   <li>
                                                      <div class="dropdown-header pt-2 pb-0">
                                                         <h6 class="mb-0">Options</h6>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <hr class="dropdown-divider">
                                                   </li>
                                                   <li><a href="#" class="dropdown-item">7 Days</a></li>
                                                   <li><a href="#" class="dropdown-item">15 Days</a></li>
                                                   <li><a href="#" class="dropdown-item">30 Days</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="amount-wrap mt-3 mb-4">
                                          <div class="amount h2 mb-1">$238,560.93</div>
                                          <div class="d-flex align-items-center smaller">
                                             <div class="change up"><em class="icon ni ni-trend-up"></em> +2%</div>
                                             <span>than last Week</span>
                                          </div>
                                       </div>
                                       <div class="list-group-dotted">
                                          <div class="list-group-wrap flex-column">
                                             <div class="py-1 px-2">
                                                <div class="d-flex flex-wrap justify-content-between"><span class="small">2:30 PM</span><span class="small">$5,256.26</span><span class="change down small">-129.34</span></div>
                                             </div>
                                             <div class="py-1 px-2">
                                                <div class="d-flex flex-wrap justify-content-between"><span class="small">3:55 PM</span><span class="small">$5,837.34</span><span class="change up small">+539.84</span></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="nk-chart-project-avg-earnings mt-4">
                                          <canvas data-nk-chart="line" id="avgEarningsChart"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-xxl-4">
                                 <div class="card h-100">
                                    <div class="card-body">
                                       <div class="card-title-group">
                                          <div class="card-title">
                                             <h5 class="title mb-1">Daily Task</h5>
                                             <p class="small">Percentage of product a user demands</p>
                                          </div>
                                       </div>
                                       <ul class="nk-schedule mt-4">
                                          <li class="nk-schedule-item">
                                             <div class="nk-schedule-item-inner">
                                                <div class="nk-schedule-symbol active"></div>
                                                <div class="nk-schedule-content">
                                                   <span class="smaller">10:00</span>
                                                   <div class="h6 mb-0">IOS Dev Team Meeting</div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="nk-schedule-item">
                                             <div class="nk-schedule-item-inner">
                                                <div class="nk-schedule-symbol active"></div>
                                                <div class="nk-schedule-content">
                                                   <span class="smaller">12:00</span>
                                                   <div class="h6 mb-0">Believing is the absence of doubt</div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="nk-schedule-item">
                                             <div class="nk-schedule-item-inner">
                                                <div class="nk-schedule-symbol"></div>
                                                <div class="nk-schedule-content">
                                                   <span class="smaller">16:00</span>
                                                   <div class="h6 mb-0">Start with a baseline</div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="nk-schedule-item">
                                             <div class="nk-schedule-item-inner">
                                                <div class="nk-schedule-symbol"></div>
                                                <div class="nk-schedule-content">
                                                   <span class="smaller">18:00</span>
                                                   <div class="h6 mb-0">Break through self doubt and fear</div>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4">
                                 <div class="card h-100">
                                    <div class="card-body py-2 flex-grow-0">
                                       <div class="card-title-group">
                                          <div class="card-title">
                                             <h5 class="title">Members of Employee</h5>
                                          </div>
                                          <div class="card-tools d-none d-sm-inline-block"><a href="#" class="btn btn-sm btn-soft btn-secondary"><span>Add Member</span></a></div>
                                       </div>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-middle mb-0">
                                          <thead class="table-light table-head-sm">
                                             <tr>
                                                <th class="tb-col"><span class="overline-title">members</span></th>
                                                <th class="tb-col tb-col-end"><span class="overline-title">tasks</span></th>
                                                <th class="tb-col tb-col-end tb-col-sm"><span class="overline-title">status</span></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/a.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Timothy Smith</span><span class="text smaller">Product Manager</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">238</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="60" data-track-width="0.3" data-angle-offset="0.4" data-hide-value="true" data-color-fg="#22C55E"></div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/b.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Alexis Clarke</span><span class="text smaller">React Developer</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">107</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="42" data-track-width="0.3" data-hide-value="true" data-angle-offset="0.4" data-color-fg="#0EA5E9"></div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/c.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Herbert Stokes</span><span class="text smaller">Lead Designer</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">76</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="50" data-track-width="0.3" data-hide-value="true" data-angle-offset="0.4" data-color-fg="#6200EE"></div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/d.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Nancy Martino</span><span class="text smaller">UI/UX Designer</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">683</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="34" data-track-width="0.3" data-hide-value="true" data-angle-offset="0.4" data-color-fg="#FBBF24"></div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/e.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Michael Morris</span><span class="text smaller">Lead Developer</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">395</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="26" data-track-width="0.3" data-hide-value="true" data-angle-offset="0.4" data-color-fg="#6200EE"></div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="tb-col">
                                                   <div class="media-group">
                                                      <div class="media media-md media-middle media-circle"><img src="images/product/b.jpg" alt=""></div>
                                                      <div class="media-text"><span class="title">Glen Matney</span><span class="text smaller">Lead Designer</span></div>
                                                   </div>
                                                </td>
                                                <td class="tb-col tb-col-end"><span class="small">46</span></td>
                                                <td class="tb-col tb-col-end tb-col-sm">
                                                   <div class="nk-chart-knob js-pureknob" data-size="24" data-value="46" data-track-width="0.3" data-hide-value="true" data-angle-offset="0.4" data-color-fg="#6200EE"></div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="nk-footer">
                  <div class="container-fluid">
                     <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; 2022 Nioboard. Template by <a href="https://softnio.com" target="_blank" class="text-reset">Softnio</a>
                        </div>
                        <div class="nk-footer-links">
                           <ul class="nav nav-sm">
                              <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                              <li class="nav-item"><a href="#" class="nav-link">Support</a></li>
                              <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
   </body>
   @vite(['resources/my_assets/js/bundle.js', 'resources/my_assets/js/scripts.js'])
   <div class="offcanvas offcanvas-end offcanvas-size-lg" id="notificationOffcanvas">
      <div class="offcanvas-header border-bottom border-light">
         <h5 class="offcanvas-title" id="offcanvasTopLabel">Recent Notification</h5>
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" data-simplebar="">
         <ul class="nk-schedule">
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content">
                     <span class="smaller">2:12 PM</span>
                     <div class="h6">Added 3 New Images</div>
                     <ul class="d-flex flex-wrap gap g-2 py-2">
                        <li>
                           <div class="media media-xxl"><img src="images/product/a.jpg" alt="" class="img-thumbnail"></div>
                        </li>
                        <li>
                           <div class="media media-xxl">
                              <img src="images/product/b.jpg" alt="" class="img-thumbnail">
                           </div>
                        </li>
                        <li>
                           <div class="media media-xxl">
                              <img src="images/product/c.jpg" alt="" class="img-thumbnail">
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </li>
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content">
                     <span class="smaller">4:23 PM</span>
                     <div class="h6">Invitation for creative designs pattern</div>
                  </div>
               </div>
            </li>
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content nk-schedule-content-no-border">
                     <span class="smaller">10:30 PM</span>
                     <div class="h6">Task report - uploaded weekly reports</div>
                     <div class="list-group-dotted mt-3">
                        <div class="list-group-wrap">
                           <div class="p-3">
                              <div class="media-group">
                                 <div class="media rounded-0">
                                    <img src="images/icon/file-type-pdf.svg" alt="">
                                 </div>
                                 <div class="media-text ms-1">
                                    <a href="#" class="title">Modern Designs Pattern</a>
                                    <span class="text smaller">1.6.mb</span>
                                 </div>
                              </div>
                           </div>
                           <div class="p-3">
                              <div class="media-group">
                                 <div class="media rounded-0">
                                    <img src="images/icon/file-type-doc.svg" alt="">
                                 </div>
                                 <div class="media-text ms-1">
                                    <a href="#" class="title">Cpanel Upload Guidelines</a>
                                    <span class="text smaller">18kb</span>
                                 </div>
                              </div>
                           </div>
                           <div class="p-3">
                              <div class="media-group">
                                 <div class="media rounded-0">
                                    <img src="images/icon/file-type-code.svg" alt="">
                                 </div>
                                 <div class="media-text ms-1">
                                    <a href="#" class="title">Weekly Finance Reports</a>
                                    <span class="text smaller">10mb</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content">
                     <span class="smaller">3:23 PM</span>
                     <div class="h6">Assigned you to new database design project</div>
                  </div>
               </div>
            </li>
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content nk-schedule-content-no-border flex-grow-1">
                     <span class="smaller">5:05 PM</span>
                     <div class="h6">You have received a new order</div>
                     <div class="alert alert-info mt-2" role="alert">
                        <div class="d-flex">
                           <em class="icon icon-lg ni ni-file-code opacity-75"></em>
                           <div class="ms-2 d-flex flex-wrap flex-grow-1 justify-content-between">
                              <div>
                                 <h6 class="alert-heading mb-0">Business Template - UI/UX design</h6>
                                 <span class="smaller">
                                 Shared information with your team to understand and contribute to your project.
                                 </span>
                              </div>
                              <div class="d-block mt-1">
                                 <a href="#" class="btn btn-md btn-info">
                                 <em class="icon ni ni-download"></em>
                                 <span>Download</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <li class="nk-schedule-item">
               <div class="nk-schedule-item-inner">
                  <div class="nk-schedule-symbol active"></div>
                  <div class="nk-schedule-content">
                     <span class="smaller">2:45 PM</span>
                     <div class="h6">Project status updated successfully</div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
   @vite([
      'resources/my_assets/js/bundle.js', 
      'resources/my_assets/js/scripts.js', 
      'resources/my_assets/js/charts/project-manage-chart.js'
   ])
</html>