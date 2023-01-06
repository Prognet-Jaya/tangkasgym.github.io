
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <!-- <a class="sidebar-brand brand-logo" href=""><img src="Tangkas.png" alt="logo" /></a> -->
          <!-- <a class="sidebar-brand brand-logo-mini" href=" "><img src="" alt="logo" /></a> -->
          <img class="logotangkas" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiQh050y3RnoUG4UGFXm6DcEpwSSvjBGsDRdScJdHl2BpktOIh7d7czNvTZ9K_AUzNOkXhp7LiMCPrrKsi7RF4Peg7UHXjs57ZPIWw-HEBadszzrRqvP4gqPH0DaRFgMZfdrdDOGEb6K33BQW-8x8fGzsbCpyG3Q1jFBKxAQNzYq9PqGqdGwYpwhOaUXg/s500/Tangkas%20Gym%20and%20Fitness%20Center%20Logo.png" alt="Logo">
          <h3 class="fontTangkas">Tangkas Fitness</h3>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                <img class="img-xs rounded-circle " src="/latihan/{{$user->foto}}" >
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{$user->nama_lengkap}}</h5>
                  <span>Non member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="{{url('profile')}}" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    
                      <button type="submit" class="profbutton">
                        profile
                      </button>
                
                   
                  </div>
                </a>
                <div class="dropdown-divider"></div>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                    
                  </div>
                  <div class="preview-item-content">
                  <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" href="{{ route('logout') }}"  class="profbutton">Log Out</button>
                      <!-- <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    
                  </p> -->
                    
                </form>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('dashboard_user')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('list_training')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">List Training</span>
              
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('your_training')}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Your Training</span>
            </a>
          </li>

          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('prananda')}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Cart</span>
            </a>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('userjadwal_training')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Jadwal Training</span>
            </a>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('merchandise')}}">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Merchandise</span>
            </a>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="user/pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="user/pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="user/pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="user/pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="user/pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li> -->
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('status')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Informasi</span>
            </a>
          </li> 
        </ul>
      </nav>
