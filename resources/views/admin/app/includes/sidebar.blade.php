  <!-- Sidenav Menu Start -->
  <div class="sidenav-menu">

      <!-- Brand Logo -->
      <a href="#" class="logo">
          <span class="logo-light">
              <span class="logo-lg"><img src="{{ asset('web/assets/img/logo/logo1.png') }}" alt="logo"></span>
              <span class="logo-sm"><img src="{{ asset('web/assets/img/icon/favicon.png') }}" alt="small logo"></span>
          </span>

          <span class="logo-dark">
              <span class="logo-lg"><img src="{{ asset('web/assets/img/logo/logo1.png') }}" alt="dark logo"></span>
              <span class="logo-sm"><img src="{{ asset('web/assets/img/icon/favicon.png') }}" alt="small logo"></span>
          </span>
      </a>

      <!-- Sidebar Hover Menu Toggle Button -->
      <button class="button-sm-hover">
          <i class="ti ti-circle align-middle"></i>
      </button>

      <!-- Full Sidebar Menu Close Button -->
      <button class="button-close-fullsidebar">
          <i class="ti ti-x align-middle"></i>
      </button>

      <div data-simplebar>

          <!--- Sidenav Menu -->
          <ul class="side-nav">
              <li class="side-nav-title">Dash</li>

              {{-- Dashboard --}}
              <li class="side-nav-item">
                  <a href="#" class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                      <span class="menu-text">Dashboard </span>
                  </a>
              </li>
              {{-- Tesimonial --}}
              <li class="side-nav-item">
                  <a data-bs-toggle="collapse" href="#sidebarTestimonial" aria-expanded="false"
                      aria-controls="sidebarTestimonial" class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-medical-cross"></i></span>
                      <span class="menu-text"> Testimonial</span>
                      <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarTestimonial">
                      <ul class="sub-menu">
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">List</span>
                              </a>
                          </li>
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">Add New Testimonial</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              {{-- Category --}}
              <li class="side-nav-item">
                  <a data-bs-toggle="collapse" href="#sidebarCategory" aria-expanded="false"
                      aria-controls="sidebarCategory" class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-medical-cross"></i></span>
                      <span class="menu-text"> Category</span>
                      <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarCategory">
                      <ul class="sub-menu">
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">List</span>
                              </a>
                          </li>
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">Add New Category</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              {{-- Vendor List and add Vendor --}}
              <li class="side-nav-item">
                  <a data-bs-toggle="collapse" href="#sidebarVendor" aria-expanded="false" aria-controls="sidebarVendor"
                      class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-medical-cross"></i></span>
                      <span class="menu-text"> Vendor</span>
                      <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarVendor">
                      <ul class="sub-menu">
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">List</span>
                              </a>
                          </li>
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">Add New Vendor</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              {{-- Listing List --}}
              <li class="side-nav-item">
                  <a data-bs-toggle="collapse" href="#sidebarListing" aria-expanded="false" aria-controls="sidebarListing"
                      class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-medical-cross"></i></span>
                      <span class="menu-text"> Listing</span>
                      <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarListing">
                      <ul class="sub-menu">
                          <li class="side-nav-item">
                              <a href="#" class="side-nav-link">
                                  <span class="menu-text">List</span>
                              </a>
                          </li>
                          {{-- <li class="side-nav-item">
                              <a href="{{ route('admin.vendor.create') }}" class="side-nav-link">
                                  <span class="menu-text">Add New Vendor</span>
                              </a>
                          </li> --}}
                      </ul>
                  </div>
              </li>


              <li class="side-nav-item">
                  <a href="#" class="side-nav-link">
                      <span class="menu-icon"><i class="ti ti-building-hospital"></i></span>
                      <span class="menu-text"> Logout </span>
                  </a>
              </li>
          </ul>

          <!-- Help Box -->
          <div class="help-box text-center">
              <img src="{{ asset('assets/images/coffee-cup.svg') }}" height="90" alt="Helper Icon Image" />
              <h5 class="mt-3 fw-semibold fs-16">Unlimited Access</h5>
              <p class="mb-3 text-muted">Upgrade to plan to get access to unlimited reports</p>
              <a href="javascript: void(0);" class="btn btn-danger btn-sm">Upgrade</a>
          </div>

          <div class="clearfix"></div>
      </div>
  </div>
  <!-- Sidenav Menu End -->
