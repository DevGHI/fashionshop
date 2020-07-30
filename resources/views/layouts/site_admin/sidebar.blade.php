
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main" >
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="{{ url('/') }}">Fashionista
          {{--  <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">  --}}
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            

            <li class="nav-item">
              <a class="nav-link" href="{{URL('order')}}">
                <i class="ni ni-align-left-2 text-orange"></i>
                <span class="nav-link-text">Orders</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{URL('total_order')}}">
                <i class="ni  ni-ui-04 text-info"></i>
                <span class="nav-link-text">Order Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('product')}}">
                <i class="ni ni-ungroup text-pink"></i>
                <span class="nav-link-text">Products</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{URL('main_category')}}">
                <i class="ni ni-single-copy-04 text-yellow"></i>
                <span class="nav-link-text">Categories</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{URL('/township')}}">
                <i class="ni ni-map-big text-green"></i>
                <span class="nav-link-text">Townships</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{URL('/color')}}">
                <i class="ni ni-map-big text-green"></i>
                <span class="nav-link-text">Colors</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{URL('/size')}}">
                <i class="ni ni-map-big text-green"></i>
                <span class="nav-link-text">Size</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/supplier')}}">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">Supplier</span>
              </a>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" href="{{URL('/customer')}}">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">Customer</span>
              </a>
            </li>

            <li class="nav-item" onclick="logout()" style="cursor:pointer">
              <a class="nav-link">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>


            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Examples</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{URL('/pricing')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Pricing </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/login')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> Login </span>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{URL('/register')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> R </span>
                      <span class="sidenav-normal"> Register </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/lock')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> Lock </span>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{URL('/timeline')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Timeline </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/profile')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Profile </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                <i class="ni ni-ui-04 text-info"></i>
                <span class="nav-link-text">Components</span>
              </a>
              <div class="collapse" id="navbar-components">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{URL('/button')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> B </span>
                      <span class="sidenav-normal"> Buttons </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/card')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Cards </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/gird')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> G </span>
                      <span class="sidenav-normal"> Grid </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                <i class="ni ni-single-copy-04 text-pink"></i>
                <span class="nav-link-text">Forms</span>
              </a>
              <div class="collapse" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{URL('/element')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> E </span>
                      <span class="sidenav-normal"> Elements </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/component')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Components </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL('/validation')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> V </span>
                      <span class="sidenav-normal"> Validation </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
              <div class="collapse" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="../../pages/tables/tables.html" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Tables </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/tables/sortable.html" class="nav-link">
                      <span class="sidenav-mini-icon"> S </span>
                      <span class="sidenav-normal"> Sortable </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/tables/datatables.html" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Datatables </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Maps</span>
              </a>
              <div class="collapse" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="../../pages/maps/google.html" class="nav-link">
                      <span class="sidenav-mini-icon"> G </span>
                      <span class="sidenav-normal"> Google </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/maps/vector.html" class="nav-link">
                      <span class="sidenav-mini-icon"> V </span>
                      <span class="sidenav-normal"> Vector </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{URL('/widget')}}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Widgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/chart')}}">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Charts</span>
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>