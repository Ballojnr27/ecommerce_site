<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #35424b;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
        }
        .cart-logo, .logout-link {
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            width: calc(45% - 20px);
            margin-bottom: 20px;
            text-align:center;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
        .product h2 {
            margin-top: 0;
            font-size: 18px;
        }
        .product p {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .product button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
        }
        .highlight{
          color:#e8491d;
          font-weight:bold;

        }
        footer {
            background-color: #35424b;
            color:#e8491d;
            font-weight:bold;
            padding: 10px 20px;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        h1{
          margin-left:70px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo"><span class="highlight">De'light </span>Footwears</div>

    <div>
        <a href="/cart" class="cart-logo">🛒 Cart</a>
        <a class="logout-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
         </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</header>
<h1>Welcome, {{$user->name}}</h1>
<center>
<div class="container">

    <div class="product">
        <img src="assets/images/img/mshoe1.jpg" alt="Product 1">
        <h2>Male Shoe Category</h2>
        <p>Nice male shoes for classy people.</p>
        <a href="/maleshoes"><button>View Category</button></a>
    </div>
    <div class="product">
        <img src="assets/images/img/babyshoe.jpg" alt="Product 2">
        <h2>Female Shoe Category</h2>
        <p>Beautiful female shoes for parties and events.</p>
        <a href="/femaleshoes"><button>View Category</button></a>
    </div>
    <div class="product">
        <img src="assets/images/img/palm1.jpg" alt="Product 2">
        <h2>Slide and Palm Category</h2>
        <p>Nicely made hand crafted slides for you.</p>
        <a href="/slides"><button>View Category</button></a>
    </div>
    <div class="product">
        <img src="assets/images/img/sandal.jpg" alt="Product 2">
        <h2>Sandal Category </h2>
        <p>Sandals for many eevnts.</p>
        <a href="/sandals"><button>View Category</button></a>
    </div>
</div>
</center>
</body>
<footer>
<b>De'light Footwears &copy; 2024</b>
</footer>

</html>
