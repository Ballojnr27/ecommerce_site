@extends('layouts.app')

@section('title', 'Home')

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
                                <li class="side-right"><a href="/order_history">Order History</a></li>
                                <li class="side-right"> <a href="/home">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </nav><br>


        <aside id="colorlib-hero">
            <div class="flexslider">
                <center>
                    <h1 class="welcome">Shopping Cart</h1>
                </center>

                @if ($carts->isEmpty())

                   <center> <p style="font-size: 25px" ><b>Your Cart Is Empty.</p></b></center>
                @else
                    <form action="{{ route('search') }}" method="GET" class="searchpro">
                        <input type="text" name="search" placeholder="Enter name of product" class="searchpro_box"
                            required>
                        <button type="submit">Search</button>
                    </form>
                    <div class="container2">
                        @foreach ($carts as $cart)
                            <div class="product">
                                <h2> Product: {{ $cart->product }} </h2>
                                <p>Quantity: {{ $cart->quantity }}</p>
                                <p>Price(NGN)/1: {{ $cart->price }} </p>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirmDelete();">Delete Order</button>
                                    <input type="hidden" name="confirmed" id="confirmed" value="false">
                                </form>
                                <script>
                                    function confirmDelete() {
                                        var confirmed = confirm("Are you sure you want to delete this order?");
                                        if (confirmed) {
                                            document.getElementById('confirmed').value = 'true';
                                        }
                                        return confirmed;
                                    }
                                </script>

                                @if (session('confirm_message'))
                                    <script>
                                        alert("{{ session('confirm_message') }}")
                                    </script>
                                @endif
                            </div>
                        @endforeach
                    </div>



                    <center>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirmedDelete();" class="checkout">Checkout</button>
                            <input type="hidden" name="confirmed" id="confirmed" value="false">
                        </form>
                        <script>
                            function confirmedDelete() {
                                var confirmed = confirm("Total order is {{ $sum }} NGN. Checkout?");
                                if (confirmed) {
                                    document.getElementById('confirmed').value = 'true';

                                }
                                return confirmed;
                            }
                        </script>

                        @if (session('confirm_message'))
                            <script>
                                alert("{{ session('confirm_message') }}")
                            </script>
                        @endif
                    </center>
                @endif


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
