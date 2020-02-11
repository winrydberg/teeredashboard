<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
        </li>
        <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
        </li>
      <li class=" nav-item"><a href="{{url('/new-applications')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICATIONS</span></a>
        </li>
      <li class=" nav-item"><a href="{{url('/approved-applicants')}}" onclick="openCustomRoxy2('')"><i class="ft-server"></i><span data-i18n="" class="menu-title">APPROVED</span></a>
        </li> 
          <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">ADMINISTRATORS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
          <ul class="menu-content">
            <li class=""><a href="{{url('/new-admin')}}" class="menu-item">New Admin</a>
            </li>
            <li><a href="{{url('/admins')}}" class="menu-item">Admin List</a>
            </li>
          </ul>
        </li>

        {{-- <li class=" nav-item"><a href="{{url('/regulator/admins')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">ADMINISTRATION</span></a>
        </li> --}}

        <li class=" nav-item"><a href="{{url('/regulator/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">ADMIN LOGOUT</span></a>
        </li>




      </ul>
    </div>
  </div>