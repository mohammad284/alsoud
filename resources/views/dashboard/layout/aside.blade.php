<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
      <img src="{{ asset('images/logoo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="white-space: wrap;font-size:15px;">{{ App\Models\Setting::first()->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/home" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.engineers')}}" class="nav-link {{ (request()->is('admin/engineers')) ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              
              <p>
                Engineers
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="{{ route('admin.addTask')}}" class="nav-link {{ (request()->is('admin/addTask')) ? 'active' : '' }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Task
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.tasks')}}" class="nav-link {{ (request()->is('admin/tasks')) ? 'active' : '' }}">
              <i class=" nav-icon fas fa-tasks"></i>
              <p>
                Tasks
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.endedTasks')}}" class="nav-link {{ (request()->is('admin/endedTasks')) ? 'active' : '' }}">
              <i class=" nav-icon fas fa-tasks"></i>
              <p>
                Completed  Tasks
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.deletedTasks')}}" class="nav-link {{ (request()->is('admin/deletedTasks')) ? 'active' : '' }}">
               <i class=" nav-icon fas fa-remove-format"></i>
              <p>
                Deleted Tasks
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.certificates')}}" class="nav-link {{ (request()->is('admin/certificates')) ? 'active' : '' }}">
              <i class=" nav-icon fas fa-certificate"></i>
              <p>
                Certificates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.clients')}}" class="nav-link {{ (request()->is('admin/clients')) ? 'active' : '' }}">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.managementMessage')}}" class="nav-link {{ (request()->is('admin/managementMessage')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Management Messages 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.salaries')}}" class="nav-link {{ (request()->is('admin/salaries')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Salaries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.requestVacations')}}" class="nav-link {{ (request()->is('admin/requestVacations')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pending vacations
              </p>
              <span class="badge bg-danger float-right">{{ App\Models\Vacation::where('type','request')->count() }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.vacations')}}" class="nav-link {{ (request()->is('admin/vacations')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Vacations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.deniedVacations')}}" class="nav-link {{ (request()->is('admin/deniedVacations')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Denied vacations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.rebates')}}" class="nav-link {{ (request()->is('admin/rebates')) ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Rebates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.admins')}}" class="nav-link {{ (request()->is('admin/admins')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Admins
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.setting')}}" class="nav-link {{ (request()->is('admin/setting')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.privacy')}}" class="nav-link {{ (request()->is('admin/privacy')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Privacy & Term
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.charges')}}" class="nav-link {{ (request()->is('admin/charges')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Charge
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.works')}}" class="nav-link {{ (request()->is('admin/works')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                    Works
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.payments')}}" class="nav-link {{ (request()->is('admin/payments')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                    Payments
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.machines')}}" class="nav-link {{ (request()->is('admin/machines')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Scope of Work
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <i class=" nav-icon fas fa-sign-out-alt"></i>
              <span class="link">
                {{__('Logout')}}
              </span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <i class=" nav-icon fas fa-sign-out-alt"></i>
              <span class="link">
              </span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>