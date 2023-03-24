@can('login')
<nav class="navbar navbar-expand-lg border-bottom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Social</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
      </div>
      
      <ul class="navbar-nav ms-auto me-5 ">
        <li class="nav-item dropdown text-white ">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->username }}
            
            @if(auth()->user()->image)
            <img class="rounded-circle ms-2" src="{{ asset('storage/' . auth()->user()->image) }}" width="40" height="40" alt="">
            @else
            <img class="rounded-circle ms-2" src="img/Empty.jfif" width="40" height="40" alt="">
            @endif
          
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
            <li><a class="dropdown-item" href="/logout">Log out</a></li>
          </ul>
        
        </li>
      </ul>
    </div>
  </div>
</nav>
@endcan