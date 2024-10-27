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
        .cart-logo, .home {
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

        @media (max-width: 768px) {
            .cart-logo, .home {
            font-size: 11px;
            color: #fff;
            text-decoration: none;
            margin-left: 11px;
        }
        .logo {
            font-size: 19px;
        }
        .welcome{
            font-size: 25px;
            margin-left: 25px;

        }
        .product{

            margin-left: 75px;
        }
    }
    </style>
</head>
<body>

<header>
    <div class="logo"><span class="highlight">De'light </span>Footwears</div>

    <div>

        <a href="/home" class="home">Home</a>
        <a href="/cart" class="cart-logo">🛒 Cart</a>
    </div>
</header>
<h1 class="welcome">Female Shoes Category</h1>
<center>

@php
$products = [
    [
        'name' => 'Red High Heel Shoe',
        'price' => 150000,
        'description' => 'High heel suitable for parties, events and may be worn for official purposes.',
        'image' => 'fshoe1.jpg'
    ],
    [
        'name' => 'Grey Low Heel Shoe',
        'price' => 120000,
        'description' => 'Low soled heel most suitable for ceremonies, nice on native dresses as well.',
        'image' => 'fshoe2.jpg'
    ],
    [
        'name' => 'Baby Shoe',
        'price' => 200000,
        'description' => 'Nice baby shoe, most suitable for official purposes.',
        'image' => 'fshoe3.jpg'
    ],
    [
        'name' => 'Covered Low Heel Shoe',
        'price' => 160000,
        'description' => 'Covered low heel show suitable for official purposes.',
        'image' => 'fshoe4.jpg'
    ],
    [
        'name' => 'Birken Stock Shoe',
        'price' => 200000,
        'description' => 'Beautiful portable shoe suitable for official purposes and casual wear.',
        'image' => 'fshoe5.jpg'
    ]
];
@endphp




@foreach($products as $product)
      <form action="{{route('store')}}" method="POST" >
            @csrf

            <div class="container">
    <div class="product">


            <img src="assets/images/img/{{$product['image'] }}" alt="Product 1">
    <h2>{{ $product['name'] }}</h2>
    <p>Price (NGN): {{ $product['price'] }}</p>
    <p>Description: {{ $product['description'] }}</p>


        <input type="hidden" name="product" placeholder="Product" value="{{$product['name']}}">
        <input type="hidden" name="price" placeholder="Price" value="{{$product['price']}}">
        <button type="submit">Add To Cart</button>
        </div>
</div>
       </form>

@endforeach

</center>
</body>
<footer>
<b>De'light Footwears &copy; 2024</b>
</footer>

</html>
