<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <div class="main-menu-content">



    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right"
          data-original-title="General" class=" ft-minus"></i>
      </li>
      <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="ft-menu"></i><span data-i18n=""
            class="menu-title">DASHBOARD</span></a>
      </li>
      <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n=""
            class="menu-title">APPLICATIONS</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          <li class=""><a href="{{url('/new-applicant')}}" class="menu-item">New Applicant</a>
          </li>
          {{-- @role('Approval Officer') --}}
          <li><a href="{{url('/new-applications')}}" class="menu-item">Submissions</a>
          </li>
          {{-- @endrole --}}
          <li><a href="{{url('/approved-applicants')}}" class="menu-item">Approved Applicants</a>
          </li>
        </ul>
      </li>


     
      {{-- <li class=" nav-item"><a href="{{url('/disbursements')}}"><i class="ft-book"></i><span data-i18n=""
            class="menu-title">DISBURSEMENTS</span></a>
      </li> --}}
      <li class=" nav-item"><a href="#"><i class="ft-book"></i><span data-i18n=""
            class="menu-title">DISBURSEMENTS</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          @role('Finance Officer')
          <li class=""><a href="{{url('/disbursements')}}" class="menu-item">Disbursements</a>
          </li>
          @endrole
          <li><a href="{{url('/disbursed-applicants')}}" class="menu-item">Disbursed Applicants</a>
          </li>
        </ul>
      </li>
      

     
      <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n=""
            class="menu-title">MONITORING</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          @role('Monitoring Officer')
          <li class=""><a href="{{url('/my-monitorings')}}" class="menu-item">My Monitorings</a>
          </li>
          @endrole
          <li><a href="{{url('/all-monitorings')}}" class="menu-item">All Monitorings</a>
          </li>
        </ul>
      </li>
   


      <li class=" nav-item"><a href="{{url('/search')}}"><i class="ft-search"></i><span data-i18n=""
            class="menu-title">SEARCH</span></a>
      </li>

      {{-- <li class=" nav-item"><a href="{{url('/send-sms')}}"><i class="ft-mail"></i><span data-i18n=""
            class="menu-title">SEND SMS</span></a>
      </li> --}}

      <li class=" nav-item"><a href="#"><i class="ft-bell"></i><span data-i18n="" class="menu-title">NOTIFICATIONS</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          <li class=""><a href="{{url('/send-sms')}}" class="menu-item">Send SMS</a>
          </li>
          <li><a href="{{url('/send-notification')}}" class="menu-item">Push Notification</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="ft-pie-chart"></i><span data-i18n=""
            class="menu-title">REPORTS</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          @role('Super Admin')
          <li class=""><a href="{{url('/district-report')}}" class="menu-item">District Report</a>
          </li>
          @endrole
          <li><a href="{{url('/quarterly-report')}}" class="menu-item">Quarterly Report</a>
          </li>
        </ul>
      </li>

      @role('Super Admin')

      <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">STAFF</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          <li class=""><a href="{{url('/new-admin')}}" class="menu-item">New Staff</a>
          </li>
          <li><a href="{{url('/admins')}}" class="menu-item">Staff List</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span data-i18n=""
            class="menu-title">DISTRICT</span><span
            class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
        <ul class="menu-content">
          <li><a href="{{url('/new-district')}}" class="menu-item">New District</a>
          </li>
        </ul>
      </li>
      @endrole

      
      <li class=" nav-item"><a href="{{url('/logout')}}"><i class="ft-log-out"></i><span data-i18n=""
            class="menu-title">LOGOUT</span></a>
      </li>
    </ul>














  </div>
</div>