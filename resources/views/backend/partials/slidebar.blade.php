    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
          <!-- User Info-->
            <form action="{{route('update_profil_image')}}" method="POST" enctype="multipart/form-data" id="form-image">
                @csrf
              <div class="sidenav-header-inner text-center">
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" id="image" style="display: none; cursor: pointer;">
                  <label for="image">
                      <img class="img-fluid rounded-circle avatar mb-3" src="storage/{{Auth::user()->image}}" alt="{{Auth::user()->name}}">
                  </label>
                <h2 class="h5 text-white text-uppercase mb-0">{{Auth::user()->name}}</h2>
                <p class="text-sm mb-0 text-muted">Sécrétaire Général</p>
              </div>
            </form>
          <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="{{ url('#') }}">
            <p class="h1 m-0">AZT</p></a>
        </div>
        <!-- Sidebar Navigation Menus--><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Menu</span>
        <ul class="list-unstyled">
          <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#real-estate-1"> </use>
              </svg>Accueil </a>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdown" data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#browser-window-1"> </use>
                </svg>Listes</a>
              <ul class="collapse list-unstyled " id="exampledropdown">
                <li><a class="sidebar-link" href="{{ route('index_eleve') }}">Elève</a></li>
                <li><a class="sidebar-link" href="{{ route('index_classe') }}">Classe</a></li>
                <li><a class="sidebar-link" href="{{ route('index_message') }}">Message</a></li>
                <li><a class="sidebar-link" href="{{ route('index_donnateur') }}">Donnateur</a></li>
              </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#exampledrop" data-bs-toggle="collapse">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg>Paramètre</a>
            <ul class="collapse list-unstyled " id="exampledrop">
              <li><a class="sidebar-link" href="{{ route('index_objectif') }}">Objectif</a></li>
              <li><a class="sidebar-link" href="{{ route('index_collaborateur') }}">Collaborateur</a></li>
            </ul>
          </li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/connect') }}">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#disable-1"> </use>
              </svg>connexion</a>
            </li>
        </ul>
      </nav>
    <script>
        $(function (){
           $('#image').change(function (){
               $('#form-image').submit();
           });
        });
    </script>
