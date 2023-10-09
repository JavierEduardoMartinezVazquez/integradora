<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #dc6307">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="#" class="nav-link">link_1</a>-->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="#" class="nav-link">link_2</a>-->
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt"></i>
        </a>
    </li>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>
