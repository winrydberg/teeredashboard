<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">

    
        @role('Super Admin')
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/new-applicant')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICANT</span></a>
            </li>
          <li class=" nav-item"><a href="{{url('/new-applications')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICATIONS</span></a>
            </li>
          <li class=" nav-item"><a href="{{url('/approved-applicants')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">APPROVED</span></a>
            </li> 
            <li class=" nav-item"><a href="{{url('/send-sms')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">SEND SMS</span></a>
            </li> 
            <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">STAFFS/OFFICERS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
              <ul class="menu-content">
                <li class=""><a href="{{url('/new-admin')}}" class="menu-item">New Staff</a>
                </li>
                <li><a href="{{url('/admins')}}" class="menu-item">Staff List</a>
                </li>
              </ul>
            </li>
    
            <li class=" nav-item"><a href="{{url('/search')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">SEARCH</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">ADMIN LOGOUT</span></a>
            </li>
          </ul>
        @endrole

        @role('Finance Officer')
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/new-applicant')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICANT</span></a>
            </li>         
          <li class=" nav-item"><a href="{{url('/approved-applicants')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">APPROVED APPLICANTS</span></a>
          </li> 
           <li class=" nav-item"><a href="{{url('/disbursements')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">DISBURSEMENTS</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/send-sms')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">SEND SMS</span></a>
            </li> 
    
            <li class=" nav-item"><a href="{{url('/search')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">SEARCH</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">ADMIN LOGOUT</span></a>
            </li>
          </ul>
        @endrole


        @role('Approval Officer')
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/new-applicant')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICANT</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/new-applications')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICATIONS</span></a>
            </li>
         
          <li class=" nav-item"><a href="{{url('/approved-applicants')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">APPROVED APPLICANTS</span></a>
          </li> 
          <li class=" nav-item"><a href="{{url('/send-sms')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">SEND SMS</span></a>
            <li class=" nav-item"><a href="{{url('/search')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">SEARCH</span></a>
            </li>
          
          </li> 
            <li class=" nav-item"><a href="{{url('/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">ADMIN LOGOUT</span></a>
            </li>
          </ul>
        @endrole


        @role('Secretary')
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/new-applicant')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">NEW APPLICANT</span></a>
            </li>         
          <li class=" nav-item"><a href="{{url('/approved-applicants')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">APPROVED APPLICANTS</span></a>
          </li> 
          <li class=" nav-item"><a href="{{url('/send-sms')}}" ><i class="ft-server"></i><span data-i18n="" class="menu-title">SEND SMS</span></a>
          </li> 
          <li class=" nav-item"><a href="{{url('/search')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">SEARCH</span></a>
          </li>
            <li class=" nav-item"><a href="{{url('/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">ADMIN LOGOUT</span></a>
            </li>
          </ul>
        @endrole

       
      
              
             
      
    </div>
  </div>