                                    <div class="card-body">
        
                                        <h4 class="card-title">Account Settings</h4>
                                        <p class="card-title-desc"></p>
        
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Password</span> 
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
                                                    <span class="d-none d-sm-block">Settings</span>    
                                                </a>
                                            </li>
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active show" id="profile1" role="tabpanel">
                                                <div class="mb-0">
                                                <form id="password-update-form" action="{{ route('profile.update', ['user']) }}" method="post" enctype="multipart/form-data"> 
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Current Password</label>
                                                                <input name="current_password" value="{{ old('current_password') }}" type="password" class="form-control @error('current_password') is-invalid @enderror" id="formrow-email-input">
                                                            </div>
                                                            @error('current_password')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">New Password</label>
                                                                <input name="new_password" value="{{ old('new_password') }}" type="password" class="form-control @error('new_password') is-invalid @enderror" id="formrow-password-input">
                                                            </div>
                                                            @error('new_password')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-password-input" class="form-label">Confirm New Password</label>
                                                                <input name="confirm_password" value="{{ old('confirm_password') }}" type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="formrow-password-input">
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

                                            <div class="tab-pane" id="home1" role="tabpanel">
                                                <div class="mb-0">
                                                <div class="card-body">
                                                    <!-- <h4 class="card-title">Dropzone</h4> -->
                                                    <p class="card-title-desc">Upload your profile picture </p> 
                                                    <form action="{{ route('profile-avatar.update', ['user'])}}" method="post" enctype="multipart/form-data" >
                                                        @csrf 
                                                        @method('PUT')                     
                                                        <div class="mb-3">
                                                            <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror">
                                                        </div> 
                                                        <div class="text-center mt-4">
                                                            <button name="submit" type="submit" class="btn btn-soft-primary btn-lg waves-effect waves-light">Upload</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="tab-pane" id="messages1" role="tabpanel">
                                                <p class="mb-0">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                                    mi whatever gluten-free carles.
                                                </p>
                                            </div> -->

                                            <div class="tab-pane" id="settings1" role="tabpanel">
                                                <div class="mb-0">
                                                <h4 class="card-title">Delete Your Account</h4>
                                                <p class="card-title-desc">Request for your account to be deleted.<br> Deleting your account means you are no longer an employee at 1staccess Home Care</p>
                                                    <form action="{{ route('request-delete.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    <div class="row">
                                                    @if(!empty($deleteData[0]['applicant_id']) )
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <div class="alert alert-info mb-0" role="alert">
                                                                   You have already request that your account should deleted and it's under review. Your account will be deleted after reviewing your request. If you think it was a mistake contact the HR department 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formrow-email-input" class="form-label">Current Password</label>
                                                                <input name="your_password" value="{{ old('your_password') }}" type="password" class="form-control @error('your_password') is-invalid @enderror" id="formrow-email-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                            <button type="submit" class="btn btn-soft-danger btn-lg w-md">Delete Account</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>