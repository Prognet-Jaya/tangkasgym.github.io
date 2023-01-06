<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <!-- <a class="sidebar-brand brand-logo" href="index.html"><img src="user/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="user/assets/images/logo-mini.svg" alt="logo" /></a> -->
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
                  <span>Trainer</span>
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
                    
                      <button type="submit" class="preview-subject ellipsis mb-1 text-small">
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
                    <button type="submit" href="{{ route('logout') }}"  class="preview-subject ellipsis mb-1 text-small">Log Out</button>
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
            <a class="nav-link" href="{{ route('login') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('jadwal_training')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Jadwal Training</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('pengajuan')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Absensi</span>
              
            </a>
          </li>

        </ul>
      </nav>