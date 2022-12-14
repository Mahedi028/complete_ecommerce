<header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 offset-md-1 py-4">
            <h4 class="text-white">Category</h4>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li>
                            <a class="text-decoration-none"href="{{$category->slug}}">{{$category->name}}</a>
                        </li>
                    @endforeach
              </ul>
          </div>
          <div class="col-sm-3 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
                <ul class="list-unstyled">
                    @guest
                        <li><a href="{{route('register')}}" class="text-white text-decoration-none">Register</a></li>
                        <li><a href="{{route('login')}}" class="text-white text-decoration-none">login</a></li>
                    @endguest

                    @auth
                        <li><a href="{{route('profile')}}" class="text-white text-decoration-none">Profile</a></li>
                        <li><a href="{{route('logout')}}" class="text-white text-decoration-none">logout</a></li>
                    @endauth

                    <li><a href="{{route('cart.show')}}" class="text-white text-decoration-none">Cart</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          <strong>{{config('app.name')}}</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
