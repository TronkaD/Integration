
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/choices.js/public/assets/styles/choices.min.css') }} ">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/overlayscrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('backend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page d-flex align-items-center bg-gray-100">
      <div class="container mb-3">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="card" style="background-color: black;">
              <div class="card-body p-5">
                <header class="text-center mb-5">
                  <h1 class="text-xxl text-gray-400 text-uppercase" style="color:white;">A<strong class="text-primary">Z</strong>T</h1>
                </header>
                <form class="register-form" method="POST" action="{{ route('register') }}"  method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-lg-8 mx-auto">
                      <div class="input-material-group mb-3">
                        <input class="input-material form-control text-white @error('name') is-invalid @enderror"  type="file"  name="image" value="{{ old('image') }}" required autocomplete="name"  accept=".png, .jpeg, .jpg">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="label-material" for="register-username">Nom Complet                </label>
                      </div>
                      <div class="input-material-group mb-3">
                        <input class="input-material form-control text-white @error('name') is-invalid @enderror"  type="text"  name="name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="label-material" for="register-username">Nom Complet                </label>
                      </div>
                     
                      <div class="input-material-group mb-3">
                        <input class="input-material text-white form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" type="email" name="registerEmail" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <label class="label-material">Email Address</label>
                      </div>
                      <div class="input-material-group mb-4">
                        <input class="input-material form-control text-white @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="label-material">Password</label>
                      </div>
                      <div class="input-material-group mb-4">
                        <input class="input-material form-control text-white" name="password_confirmation" type="password" required autocomplete="new-password">
                        <label class="label-material">Comfirm Password</label>
                      </div>
                      <div class="form-check mb-4">
                        <input class="form-check-input" id="register-agree" name="registerAgree" type="checkbox" required value="1" data-validate-field="registerAgree">
                        <label class="form-check-label form-label" for="register-agree">J'accepte les conditions et la politique de confidentialité                        </label>
                      </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-primary mb-3" id="login" type="submit">Annuler</button>
                      <button class="btn btn-primary mb-3" id="login" type="submit">Valider</button><br>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center position-absolute bottom-0 start-0 w-100 z-index-20">
        <p class="text-gray-500"><strong class="text-primary">A</strong>ssociation <strong class="text-primary">Z</strong>owla <strong class="text-primary">T</strong>ogo
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                      -->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/just-validate/js/just-validate.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/overlayscrollbars/js/OverlayScrollbars.min.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('backend/js/front.js') }}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>