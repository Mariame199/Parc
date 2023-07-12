
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EMD-AUTOMOBILE</title>
<link rel="stylesheet" href="{{mix("css/app.css")}}" />

@livewireStyles


<script nonce="baced647-5ee6-4778-a293-114fc6a1449d">(function(w,d){!function(dk,dl,dm,dn){dk[dm]=dk[dm]||{};dk[dm].executed=[];dk.zaraz={deferred:[],listeners:[]};dk.zaraz.q=[];dk.zaraz._f=function(dp){return function(){var dq=Array.prototype.slice.call(arguments);dk.zaraz.q.push({m:dp,a:dq})}};for(const dr of["track","set","debug"])dk.zaraz[dr]=dk.zaraz._f(dr);dk.zaraz.init=()=>{var ds=dl.getElementsByTagName(dn)[0],dt=dl.createElement(dn),du=dl.getElementsByTagName("title")[0];du&&(dk[dm].t=dl.getElementsByTagName("title")[0].text);dk[dm].x=Math.random();dk[dm].w=dk.screen.width;dk[dm].h=dk.screen.height;dk[dm].j=dk.innerHeight;dk[dm].e=dk.innerWidth;dk[dm].l=dk.location.href;dk[dm].r=dl.referrer;dk[dm].k=dk.screen.colorDepth;dk[dm].n=dl.characterSet;dk[dm].o=(new Date).getTimezoneOffset();if(dk.dataLayer)for(const dy of Object.entries(Object.entries(dataLayer).reduce(((dz,dA)=>({...dz[1],...dA[1]})))))zaraz.set(dy[0],dy[1],{scope:"page"});dk[dm].q=[];for(;dk.zaraz.q.length;){const dB=dk.zaraz.q.shift();dk[dm].q.push(dB)}dt.defer=!0;for(const dC of[localStorage,sessionStorage])Object.keys(dC||{}).filter((dE=>dE.startsWith("_zaraz_"))).forEach((dD=>{try{dk[dm]["z_"+dD.slice(7)]=JSON.parse(dC.getItem(dD))}catch{dk[dm]["z_"+dD.slice(7)]=dC.getItem(dD)}}));dt.referrerPolicy="origin";dt.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(dk[dm])));ds.parentNode.insertBefore(dt,ds)};["complete","interactive"].includes(dl.readyState)?zaraz.init():dk.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        </ul>

<ul class="navbar-nav ml-auto">


<div class="navbar-search-block">
<form class="form-inline">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
<button class="btn btn-navbar" type="button" data-widget="navbar-search">
<i class="fas fa-times"></i>
</button>
</div>
</div>
</form>
</div>
</li>




    <ul class="navbar-nav ml-auto">

    <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
    <i class="fas fa-expand-arrows-alt"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
    <i class="fas fa-user"></i>
    </a>
    </li>
    </ul>
    </nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">

<span class="brand-text font-weight-light" class='fw-bold'>EMD-AUTOMOBILE</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">

</div>
<div class="info">


</div>
</div>


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
@can("superadmin")


    <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Tableau de bord
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Vue globale</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>Locations</p>
            </a>
          </li>
        </ul>
        @endcan

        @can('admin')


        <li class="nav-item Menu-open">
            <a href="#" class="nav-link active">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Autorisations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a
                href="{{route('utilisateurs')}}"
                class="nav-link active" >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item ">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Gestion Voitures
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('typevoitures')}}"
                        class="nav-link ">

                    <i class="nav-icon far fa-circle"></i>
                    <p>Type voitures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('voitures')}}"
                        class="nav-link ">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Voitures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                        Gestion des employes
                        </p>
                    </a>
                </li>
            </li>
            @endcan
        </ul>


        @can("employe")


                <li class="nav-header">LOCATION</li>
        <li class="nav-item">
            <a href="{{route('employeclients.index')}}"
            class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Gestion des clients
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                Gestion des locations
                </p>
            </a>
        </li>

        <li class="nav-header">CAISSE</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                Gestion des paiements
                </p>
            </a>
        </li>
        <li class="nav-header">VENTE</li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                Gestion des ventes
                </p>
            </a>
        </li>
        @endcan




</div>

</aside>

<div class="content-wrapper">




<div class="content">
<div class="container-fluid">

    @yield("contenu")
</div>
</div>


    </div>
        </div>
            </div>




<aside class="control-sidebar control-sidebar-dark">

    <div class="p-3">
        <div class="card-body box-profile">
            <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{asset('images/utilisateur.png')}}" alt="Photo de profil de l'utilisateur">
            </div>
            <h3 class="profile-username text-center ellipsis">{{ userFullName() }} </h3>
            <p class="text-muted text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{getRolesName()}}</font></font></p>
            <ul class="list-group list-group mb-3">
            <li class="list-group-item">
                <a href="#" class="d-flex align-items-center"><i class="fa fa-lock pr-2"></i><b>Mot de passe</b></a>
            </li>
            <li class="list-group-item">
                <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon profil</b></a>
            </li>
            </ul>
            <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                             Deconnexion
                           </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
            </div>

    </aside>



<footer class="main-footer">



<strong>Copyright &copy; 2022-2023 <a href="">EMD-AUTO</a>.</strong> All rights reserved.
</footer>
</div>


<!-- REQUIRED SCRIPTS -->
<script src="{{ mix('js/app.js') }}"></script>

@livewireScripts
<script src="./plugins/jquery/jquery.min.js"></script>

<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
