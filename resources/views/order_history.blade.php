@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
  /* Base table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 15px; /* larger text on desktop */
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 15px;
    text-align: left;
}

th {
    background-color: #35424b;
    color: white;
}

/* Responsive styling */
@media screen and (max-width: 600px) {
    table, thead, tbody, th, td, tr {
        display: block;
        width: 100%;
    }

    thead {
        display: none;
    }

    tr {
        background: #f9f9f9;
        margin-bottom: 25px;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    td {
        text-align: left;
        padding: 16px 16px 16px 60%;
        position: relative;
        border: none;
        border-bottom: 1px solid #eee;
        font-size: 13px; /* larger text on mobile */
        background: #fff;
        line-height: 1.6;
    }

    td::before {
        content: attr(data-label);
        position: absolute;
        top: 16px;
        left: 15px;
        width: 40%;
        padding-right: 10px;
        font-weight: 600;
        color: #222;
        font-size: 16px;
        white-space: nowrap;
    }
}



        .welcome {
            color: #35424b;
        }
    </style>
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
                                <li class="side-right"><a href="/cart">Cart</a></li>
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
                    <h1 class="welcome">Order History</h1>
                </center>

                @if ($orders->isEmpty())

                    <p style="font-size: 30px"><b>You have not placed any order yet.</p></b>
                @else
                    <div class="container2">

                        <table class="history">
                            <thead>
                                <tr>
                                    <th class="th2">Date</th>
                                    <th class="th2">Product(s)</th>
                                    <th class="th2">Amount</th>
                                    <th class="th2">Payment Reference</th>
                                    <th class="th2">Payment Status</th>
                                    <th class="th2">Dispatch Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="td2" data-label="Date:">{{ $order->created_at }}</td>
                                        <td class="td2" data-label="Products(s):">{{ $order->products }}</td>
                                        <td class="td2" data-label="Amount:">{{ $order->amount }}</td>
                                        <td class="td2" data-label="Payment Reference:">{{ $order->payment_reference }}</td>
                                        <td class="td2" data-label="Payment Status:">{{ $order->payment_status }}</td>
                                        <td class="td2" data-label="Dispatch Status:">{{ $order->dispatch_status }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
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
