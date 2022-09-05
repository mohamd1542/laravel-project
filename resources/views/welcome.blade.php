<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Electronic shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Electronic shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('categories.index')}}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('products.index')}}">Products</a></li>
            </ul>
{{--            <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>--}}
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-item nav-link">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" >
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu rounded-0 m-0" aria-labelledby="navbarDropdown">
                        @if( Auth::user()->is_admin==1 )
                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                Dashboard
                            </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Our products</h1>
            <p class="lead fw-normal text-white-50 mb-0">Welcome to our store my friend</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $p)
            <div class="col mb-5">

                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://kddi-h.assetsadobe3.com/is/image/content/dam/au-com/mobile/mb_img_58.jpg?scl=1" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$p->name}}</h5>
                            <!-- Product price-->
                            {{$p->price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>

            </div>
            @endforeach
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Sale badge-->--}}
{{--                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Special Item</h5>--}}
{{--                            <!-- Product reviews-->--}}
{{--                            <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                            </div>--}}
{{--                            <!-- Product price-->--}}
{{--                            <span class="text-muted text-decoration-line-through">$20.00</span>--}}
{{--                            $18.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Sale badge-->--}}
{{--                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Sale Item</h5>--}}
{{--                            <!-- Product price-->--}}
{{--                            <span class="text-muted text-decoration-line-through">$50.00</span>--}}
{{--                            $25.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Popular Item</h5>--}}
{{--                            <!-- Product reviews-->--}}
{{--                            <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                            </div>--}}
{{--                            <!-- Product price-->--}}
{{--                            $40.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Sale badge-->--}}
{{--                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Sale Item</h5>--}}
{{--                            <!-- Product price-->--}}
{{--                            <span class="text-muted text-decoration-line-through">$50.00</span>--}}
{{--                            $25.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Fancy Product</h5>--}}
{{--                            <!-- Product price-->--}}
{{--                            $120.00 - $280.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Sale badge-->--}}
{{--                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Special Item</h5>--}}
{{--                            <!-- Product reviews-->--}}
{{--                            <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                            </div>--}}
{{--                            <!-- Product price-->--}}
{{--                            <span class="text-muted text-decoration-line-through">$20.00</span>--}}
{{--                            $18.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col mb-5">--}}
{{--                <div class="card h-100">--}}
{{--                    <!-- Product image-->--}}
{{--                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                    <!-- Product details-->--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <!-- Product name-->--}}
{{--                            <h5 class="fw-bolder">Popular Item</h5>--}}
{{--                            <!-- Product reviews-->--}}
{{--                            <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                                <div class="bi-star-fill"></div>--}}
{{--                            </div>--}}
{{--                            <!-- Product price-->--}}
{{--                            $40.00--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Product actions-->--}}
{{--                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
