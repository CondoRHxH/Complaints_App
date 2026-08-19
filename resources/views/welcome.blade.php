<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        body {
            width: 100%;
            height:100%;

            background: url() center top repeat-x ;
        }

        body .accueil-header, .accueil-body, .accueil-footer {
            width: 100%;
        }

        .accueil-header {
            text-align: center;
            height: 200px;
        }

        .accueil-body {
            text-align: center;
        }

        .accueil-footer {
            position: absolute;
            bottom: 0px;
            left: 18%;
            width: 60%;
            background: #c02424;
            border-top: 1px solid #d2d6de;
            padding: 12px;
        }

        .accueil-component {
            width: 500px;
            height: 184px;
            display: inline-block;
            padding-top: 6px;
        }

        .accueil-component:hover {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 45px, rgba(0, 0, 0, 0.22) 0px 10px 18px;
            cursor: pointer;
        }

        .materiel-color-orange {
            background: #801818;
        }

        .materiel-color-gray {
            background: #8fa4ae;
        }

        .accueil-component-icon {
            width: 40%;
            margin: auto;

            border: 0px solid;
            width: 208px;
            border-radius: 110px;
        }

        .accueil-component-icon img {
            width: 208px;
            height: 208px;
            border-radius: 50%;
            border: 4px solid #9da7dc;
        }

        .accueil-component-title {
            display: inline-block;
            border: 0px solid;
            position: relative;
            background: #eeeeee;
            width: 97%;
            bottom: 15px;
            z-index: -1;
        }

        .accueil-component-title p {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
        }

        .pull-right {
            float: left !important;
        }

        .pull-left {
            float: right !important;
        }


        </style>
    </head>
    <body class="antialiased h-screen
    bg-[url('/img/hero-pattern.svg')]">

        <div class="">

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/interProf') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif

        </div>
        <body>
    <div class="accueil-header">

    </div>
    <div class="accueil-body grid gap-4 grid-cols-2">


                    <div class="accueil-component materiel-color-gray" data-url="./waliye">
                        <div class="accueil-component-icon">
                        <a href="{{ route('Professeur.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <img src="https://th.bing.com/th/id/OIP.pn8tQGcQMyRWt7SbamsbuwAAAA?w=349&h=250&rs=1&pid=ImgDetMain"></a>
                        </div>
                        <div class="accueil-component-title">
                            <p>Professeur</p>
                        </div>
                    </div>
                    <div class="accueil-component materiel-color-orange" data-url="./moutamadris">
                        <div class="accueil-component-icon">
                        <a href="{{ route('Etudiant.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <img src="https://th.bing.com/th/id/R.83c253c55fcf6749b45c22c6d4d67937?rik=CzZI3cSSUG8jUg&pid=ImgRaw&r=0"></a>
                        </div>
                        <div class="accueil-component-title">
                            <p>Etudiant</p>
                        </div>
                    </div>





    </div>

    <div class="letter-image">
        <div class="animated-mail">
          <div class="back-fold"></div>
          <div class="letter">
            <div class="letter-border"></div>
            <div class="letter-title"></div>
            <div class="letter-context"></div>
            <div class="letter-stamp">
              <div class="letter-stamp-inner"></div>
            </div>
          </div>
          <div class="top-fold"></div>
          <div class="body"></div>
          <div class="left-fold"></div>
        </div>
        <div class="shadow"></div>
      </div>
    <style>
body {
  background: #323641;
}

.letter-image {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 200px;
  height: 200px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  cursor: pointer;
}

.animated-mail {
  position: absolute;
  height: 150px;
  width: 200px;
  -webkit-transition: .4s;
  -moz-transition: .4s;
  transition: .4s;

  .body {
    position: absolute;
    bottom: 0;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 0 100px 200px;
    border-color: transparent transparent #e95f55 transparent;
    z-index: 2;
  }

  .top-fold {
    position: absolute;
    top: 50px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 50px 100px 0 100px;
    -webkit-transform-origin: 50% 0%;
    -webkit-transition: transform .4s .4s, z-index .2s .4s;
    -moz-transform-origin: 50% 0%;
    -moz-transition: transform .4s .4s, z-index .2s .4s;
    transform-origin: 50% 0%;
    transition: transform .4s .4s, z-index .2s .4s;
    border-color: #cf4a43 transparent transparent transparent;
    z-index: 2;
  }

  .back-fold {
    position: absolute;
    bottom: 0;
    width: 200px;
    height: 100px;
    background: #cf4a43;
    z-index: 0;
  }

  .left-fold {
    position: absolute;
    bottom: 0;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 50px 0 50px 100px;
    border-color: transparent transparent transparent #e15349;
    z-index: 2;
  }

  .letter {
    left: 20px;
    bottom: 0px;
    position: absolute;
    width: 160px;
    height: 60px;
    background: white;
    z-index: 1;
    overflow: hidden;
    -webkit-transition: .4s .2s;
    -moz-transition: .4s .2s;
    transition: .4s .2s;

    .letter-border {
      height: 10px;
      width: 100%;
      background: repeating-linear-gradient(
        -45deg,
        #cb5a5e,
        #cb5a5e 8px,
        transparent 8px,
        transparent 18px
      );
    }

    .letter-title {
      margin-top: 10px;
      margin-left: 5px;
      height: 10px;
      width: 40%;
      background: #cb5a5e;
    }
    .letter-context {
      margin-top: 10px;
      margin-left: 5px;
      height: 10px;
      width: 20%;
      background: #cb5a5e;
    }

    .letter-stamp {
      margin-top: 30px;
      margin-left: 120px;
      border-radius: 100%;
      height: 30px;
      width: 30px;
      background: #cb5a5e;
      opacity: 0.3;
    }
  }
}

.shadow {
  position: absolute;
  top: 200px;
  left: 50%;
  width: 400px;
  height: 30px;
  transition: .4s;
  transform: translateX(-50%);
  -webkit-transition: .4s;
  -webkit-transform: translateX(-50%);
  -moz-transition: .4s;
  -moz-transform: translateX(-50%);

  border-radius: 100%;
  background: radial-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.0), rgba(0,0,0,0.0));
}

  .letter-image:hover {
    .animated-mail {
      transform: translateY(50px);
      -webkit-transform: translateY(50px);
      -moz-transform: translateY(50px);
    }

    .animated-mail .top-fold {
      transition: transform .4s, z-index .2s;
      transform: rotateX(180deg);
      -webkit-transition: transform .4s, z-index .2s;
      -webkit-transform: rotateX(180deg);
      -moz-transition: transform .4s, z-index .2s;
      -moz-transform: rotateX(180deg);
      z-index: 0;
    }

    .animated-mail .letter {
      height: 180px;
    }

    .shadow {
      width: 250px;
    }
  }
    </style>

    </body>
</html>
