<div class="nk-header-tools">
                           <ul class="nk-quick-nav ms-2">
                              <!-- <li class="dropdown">
                                 <button class="btn btn-icon btn-sm btn-zoom d-sm-none" data-bs-toggle="dropdown" data-bs-auto-close="outside"><em class="icon ni ni-search"></em></button><button class="btn btn-icon btn-md btn-zoom d-none d-sm-inline-flex" data-bs-toggle="dropdown" data-bs-auto-close="outside"><em class="icon ni ni-search"></em></button>
                                 <div class="dropdown-menu dropdown-menu-lg">
                                    <div class="dropdown-content dropdown-content-x-lg py-1">
                                       <div class="search-inline">
                                          <div class="form-control-wrap flex-grow-1"><input placeholder="Type Query" type="text" class="form-control-plaintext"></div>
                                          <em class="icon icon-sm ni ni-search"></em>
                                       </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <div class="dropdown-content dropdown-content-x-lg py-3">
                                       <div class="dropdown-title pb-2">
                                          <h5 class="title">Recent searches</h5>
                                       </div>
                                       <ul class="dropdown-list gap gy-2">
                                          <li>
                                             <div class="media-group">
                                                <div class="media media-md media-middle media-circle text-bg-light"><em class="icon ni ni-clock"></em></div>
                                                <div class="media-text">
                                                   <div class="lead-text">Styled Doughnut Chart</div>
                                                   <span class="sub-text">1 days ago</span>
                                                </div>
                                                <div class="media-action media-action-end"><button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button></div>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="media-group">
                                                <div class="media media-md media-middle media-circle text-bg-light"><em class="icon ni ni-clock"></em></div>
                                                <div class="media-text">
                                                   <div class="lead-text">Custom Select Input</div>
                                                   <span class="sub-text">07 Aug</span>
                                                </div>
                                                <div class="media-action media-action-end"><button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button></div>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="media-group">
                                                <div class="media media-md media-middle media-circle text-bg-light"><img src="images/avatar/a.jpg" alt=""></div>
                                                <div class="media-text">
                                                   <div class="lead-text">Sharon Walker</div>
                                                   <span class="sub-text">Admin</span>
                                                </div>
                                                <div class="media-action media-action-end"><button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button></div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </li> -->
                              <li><button class="btn btn-icon btn-sm btn-zoom d-sm-none" data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas"><em class="icon ni ni-bell"></em></button><button class="btn btn-icon btn-md btn-zoom d-none d-sm-inline-flex" data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas"><em class="icon ni ni-bell"></em></button></li>
                              <li class="dropdown">
                                 <a href="#" data-bs-toggle="dropdown">
                                    <div class="d-sm-none">
                                       <div class="media media-md media-circle">
                                       <img src="{{ asset('images/avatar/avatar-placeholder.jpg') }}" alt="" class="img-thumbnail">

                                       </div>
                                    </div>
                                    <div class="d-none d-sm-block">
                                       <div class="media media-circle">
                                       <img src="{{ asset('images/avatar/avatar-placeholder.jpg') }}" alt="" class="img-thumbnail">

                                       </div>
                                    </div>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-md">
                                    <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                       <div class="media-group">
                                          <div class="media media-xl media-middle media-circle">
                                          <img src="{{ asset('images/avatar/avatar-placeholder.jpg') }}" alt="" class="img-thumbnail">

                                          </div>
                                          <div class="media-text">
                                             <div class="lead-text">{{ucfirst(auth()->user()->name)}}</div>
                                             <span class="sub-text">{{auth()->user()->email}}</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                       <ul class="link-list">
                                          <li>
                                             <a href="{{url('dashboard/profile')}}">
                                                <em class="icon ni ni-user"></em> <span>My Profile</span>
                                             </a>
                                          </li>
                                          <!-- <li><a href="user-manage/user-cards.html.htm"><em class="icon ni ni-contact"></em> <span>My Contacts</span></a></li> -->
                                          <!-- <li><a href="profile-edit.html.htm"><em class="icon ni ni-setting-alt"></em> <span>Account Settings</span></a></li> -->
                                       </ul>
                                    </div>
                                    <div class="dropdown-content dropdown-content-x-lg py-3">
                                    <ul class="link-list">
                                       <li>
                                       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          <em class="icon ni ni-signout"></em> <span>Log Out</span>
                                       </a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                       </form>
                                       </li>
                                    </ul>
                                 </div>
                                 </div>
                              </li>
                           </ul>
                        </div>