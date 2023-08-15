                                      <form action="{{ route('profile.update', ['id']) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')    
                                        @csrf
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
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                      </form>