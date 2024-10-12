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
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            height: 100%;

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
        .home, .logout-link {
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
            flex: 1;

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
        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 17px;
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
            padding: 20px 0;
    position: relative;

        }
        h1{
          margin-left:70px;
        }
        .checkout{
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 17px;
            width: 300px;
            height: 100px;
        }
        .search{
            margin-left: 1050px;
            align-items: center;

        }
        .search_box{
            size: 100px;
        }

    </style>
</head>
<body>

<header>
    <div class="logo"><span class="highlight">De'light </span>Footwears</div>

    <div>
        <a href="/home" class="home">Home</a>
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
<h1>Shopping Cart</h1>
<form action="{{ route('search') }}" method="GET" class="search">
    <input type="text" name="search" placeholder="Enter name of product" class="search_box">
    <button type="submit">Search</button>
</form>
<center>



    @if($carts->isEmpty())

<p style="font-size: 30px"><b>You Cart Is Empty.</p></b>

@else

<div class="container">

      @foreach($carts as $cart)

            <div class="product">
            <h2> Product: {{$cart->product}} </h2>
            <p>Price(NGN): {{$cart->price}} </p>
            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                @csrf
                   @method('DELETE')
                 <button onclick="return confirmDelete();">Delete Order</button>
                 <input type="hidden" name="confirmed" id="confirmed" value="false">
              </form>
              <script>
                  function confirmDelete(){
                      var confirmed = confirm("Are you sure you want to delete this order?");
                      if (confirmed){
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


  <form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
       @method('DELETE')
     <button onclick="return confirmedDelete();" class="checkout">Checkout</button>
     <input type="hidden" name="confirmed" id="confirmed" value="false">
  </form>
  <script>
      function confirmedDelete(){
          var confirmed = confirm("Total order is {{ $sum }} NGN. Checkout?");
          if (confirmed){
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
@endif



</center>

</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<b>De'light Footwears &copy; 2024</b>
</footer>

</html>
