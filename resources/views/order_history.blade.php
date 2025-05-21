<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        .footwears {
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }

        .highlight{
          color:#e8491d;
          font-weight:bold;

        }

        h1{

          margin-left: 25px;
        }
        @media (max-width: 768px) {
            .cart-logo, .logout-link, .edit {
            font-size: 9px;
            color: #fff;
            text-decoration: none;
            margin-left: 11px;
        }
       }

          .container {
        max-width: 1300px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    h2 {
        color: #35424b;
        margin-bottom: 20px;
    }
    button.primary {
        background-color: #35424b;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }
    button.primary:hover {
        background-color: #e8491d;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #35424b;
        color: white;
    }


    </style>
</head>
<body>

<header>
    <div class="logo"><span class="highlight">De'light </span>Footwears</div>

    <div class="sidebar" id="sidebar">


    </div>
</header>

<div class="container">
    <h2>Order History</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Product(s)</th>
                <th>Amount</th>
                <th>Payment Reference</th>
                <th>Payment Status</th>
                <th>Dispatch Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->products }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->payment_reference }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->dispatch_status }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>



<script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('show');
    }
  </script>


</body>

</html>
