<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="{{ asset('backend/assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">Fobia</h4>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="index.html">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      
      <li class="menu-label">Pages</li>
      <li>
        <a class="has-arrow" href="javascript:;">
          <div class="parent-icon">
            <ion-icon name="leaf-outline"></ion-icon>
          </div>
          <div class="menu-title">Home</div>
        </a>
        <ul>
          <li> 
              <a href="{{ route('hero.section') }}">
                <ion-icon name="ellipse-outline"></ion-icon>Home-section
              </a>
          </li>
        </ul>
      </li>
      <li>
          <a href="pages-user-profile.html">
            <div class="parent-icon">
              <ion-icon name="person-circle-outline"></ion-icon>
            </div>
            <div class="menu-title">User Profile</div>
          </a>
      </li>
    </ul>
    <!--end navigation-->
  </aside>