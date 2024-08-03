<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
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
    </style>
</head>
<body>
<center>
    @if ($orders->isEmpty())
    <p style="font-size: 30px"><b>Order Not Found</p></b>

    @else


    <div class="container">
        @foreach ($orders as $order)
        <div class="product">
            <h2> Product: {{$order->product}} </h2>
            <p>Price(Naira): {{$order->price}} </p>
            <form action="{{ route('search.destroy', $order->id) }}" method="POST">
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
        @endif
    </center>
</body>
</html>
