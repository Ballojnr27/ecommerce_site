@extends('layouts.app')

@section('title', 'DelightFootwears - Sandals')

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
                                <li class="side-right"><a href="/cart">🛒 Cart</a></li>
                                <li class="side-right"><a href="/home">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </nav><br>


        <aside id="colorlib-hero">
            <div class="flexslider">
                <center>
                    <h1 class="welcome">Sandals Category</h1>
                </center>
                <center>
                    @foreach ($footwears as $footwear)
                        <form action="{{ route('store') }}" method="POST">
                            @csrf

                            <div class="container">
                                <div class="product">
                                    <img src="footwears/{{ $footwear->image }}" alt="{{ $footwear->name }}">
                                    <h2>{{ $footwear->name }}</h2>
                                    <p>Price (NGN): {{ $footwear->price }}</p>
                                    <p>Description: {{ $footwear->description }}</p>
                                    <input type="hidden" name="product" placeholder="Product"
                                        value="{{ $footwear->name }}">
                                    <input type="hidden" name="price" placeholder="Price" value="{{ $footwear->price }}">
                                    <label>Quantity:</label>
                                    <input type="number" name="quantity" value="1" min="1" required><br><br>
                                    <button type="submit">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                    @endforeach

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
