                                    <div class="card-body">
        
                                        <h4 class="card-title">Account Settings</h4>
                                        <p class="card-title-desc"></p>
        
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Profile</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Avatar</span> 
                                                </a>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Messages</span>   
                                                </a>
                                            </li> -->
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block">Account</span>    
                                                </a>
                                            </li>
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active show" id="profile1" role="tabpanel">
                                                <div class="mb-0">
                                                <form id="password-update-form" action="{{ route('profile') }}" method="post" enctype="multipart/form-data"> 
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Full Name</label>
                                                                <input name="full_name" value="{{ old('full_name') }}" type="text" class="form-control @error('full_name') is-invalid @enderror" id="formrow-email-input" autocomplete="off">
                                                            </div>
                                                            @error('full_name')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">Phone</label>
                                                                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" id="formrow-password-input" autocomplete="off">
                                                            </div>
                                                            @error('phone')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">Address</label>
                                                                <input name="address" value="{{ old('address') }}" type="text" class="form-control @error('address') is-invalid @enderror" id="formrow-password-input" autocomplete="off">
                                                            </div>
                                                            @error('address')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                            <button type="submit" class="btn btn-soft-primary btn-lg w-md">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="home1" role="tabpanel">
                                                <div class="mb-0">
                                                <div class="card-body">
                                                    <!-- <h4 class="card-title">Dropzone</h4> -->
                                                    <p class="card-title-desc">Upload your profile picture </p> 
                                                    <form action="{{ route('updateAvatar')}}" method="post" enctype="multipart/form-data" >
                                                        @csrf
                                                        @method('PUT')                     
                                                        <div class="mb-3">
                                                            <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" autocomplete="off">
                                                            @error('avatar')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div> 
                                                        <div class="text-center mt-4">
                                                            <button name="submit" type="submit" class="btn btn-soft-primary btn-lg waves-effect waves-light">Upload</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="settings1" role="tabpanel">
                                                <div class="mb-0">
                                                    <form action="{{ route('updateAccount')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Username</label>
                                                                <input name="username" value="{{ old('username') }}" type="text" class="form-control @error('username') is-invalid @enderror" id="formrow-email-input" autocomplete="off">
                                                            </div>
                                                            @error('username')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Email</label>
                                                                <input name="email" value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" id="formrow-email-input" autocomplete="off">
                                                            </div>
                                                            @error('email')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Current Password</label>
                                                                <input name="current_password" value="{{ old('current_password') }}" type="password" class="form-control @error('current_password') is-invalid @enderror" id="formrow-email-input" autocomplete="off">
                                                            </div>
                                                            @error('current_password')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">New Password</label>
                                                                <input name="new_password" value="{{ old('new_password') }}" type="password" class="form-control @error('new_password') is-invalid @enderror" id="formrow-password-input" autocomplete="off">
                                                            </div>
                                                            @error('new_password')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">Confirm New Password</label>
                                                                <input name="confirm_password" value="{{ old('confirm_password') }}" type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="formrow-password-input" autocomplete="off">
                                                            </div>
                                                            @error('confirm_password')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                            <button type="submit" class="btn btn-soft-primary btn-lg w-md">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>