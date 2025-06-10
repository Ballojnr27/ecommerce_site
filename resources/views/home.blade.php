@extends('layouts.app')

@section('title', 'DelightFootwears - Home')

@section('content')
    <!-- Paste the HTML content here from index.html body -->
    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div id="colorlib-logo"><a href="/">Delight Footwears</a></div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul>

                                <li class="side-right"> <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                <li class="side-right"><a href="/edit">Edit Profile</a></li>
                                <li class="side-right"><a href="/cart">🛒 Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </nav><br>


        <aside id="colorlib-hero">
            <div class="flexslider">
                <center>
                    <h1 class="welcome">Welcome, {{ $user->name }}</h1>
                </center>
                <center>
                    <div class="container2">

                        <div class="product">
                            <img src="assets/images/img/mshoe1.jpg" alt="Product 1">
                            <h2>Male Shoe Category</h2>
                            <p>Nice male shoes for classy people.</p>
                            <a href="/male-shoes"><button>View Category</button></a>
                        </div>
                        <div class="product">
                            <img src="assets/images/img/babyshoe.jpg" alt="Product 2">
                            <h2>Female Shoe Category</h2>
                            <p>Beautiful female shoes for parties and events.</p>
                            <a href="/female-shoes"><button>View Category</button></a>
                        </div>
                        <div class="product">
                            <img src="assets/images/img/slide1.jpg" alt="Product 2">
                            <h2>Casual Wears Category</h2>
                            <p>Nicely made hand slides for you.</p>
                            <a href="/slides"><button>View Category</button></a>
                        </div>
                        <div class="product">
                            <img src="assets/images/img/sandal.jpg" alt="Product 2">
                            <h2>Sandal Category </h2>
                            <p>Sandals for schools and offices.</p>
                            <a href="/sandals"><button>View Category</button></a>
                        </div>

                    </div>
                </center>

            </div><br><br><br>
        </aside> <br><br><br>

        <footer id="colorlib-footer" role="contentinfo">

            <div class="copy">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>
                            <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Delight Footwear
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection
