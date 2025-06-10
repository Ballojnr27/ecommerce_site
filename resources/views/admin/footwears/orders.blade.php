@extends('layouts.app')

@section('title', 'DelightFootwears - Admin-Orders')

@section('content')
    <style>
        /* Base table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            /* larger text on desktop */
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #35424b;
            color: white;
        }

        h2 {
            color: #35424b;
            margin-bottom: 20px;
        }


        button {
            background-color: #e8491d;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #35424b;
        }



        /* Responsive styling */
        @media screen and (max-width: 600px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
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
                font-size: 13px;
                /* larger text on mobile */
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

        button {
    display: block;
    width: 100%;
    font-size: 12px;
    padding: 6px;
    white-space: normal;
    word-break: break-word;
    text-align: center;
    line-height: 1.2;
    box-sizing: border-box;
     word-break: break-word;
                overflow-wrap: break-word;
}
 .action-btn-container {
        width: 100%;
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
                                <li class="side-right"><a href="/admin/footwears">Footwears</a></li>
                                <li class="side-right"> <a href="/admin/users">Users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </nav><br>


        <aside id="colorlib-hero">
            <div class="flexslider">
                <div class="container2">
                    <h2 class="welcome">Orders</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Product(s)</th>
                                <th>Amount</th>
                                <th>Location</th>
                                <th>Payment Reference</th>
                                <th>Payment Status</th>
                                <th>Dispatch Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td data-label="Order ID:">{{ $order->id }}</td>
                                    <td data-label="Customer ID:">{{ $order->user_id }}</td>
                                    <td data-label="Product(s):">{{ $order->products }}</td>
                                    <td data-label="Amount:">{{ $order->amount }}</td>
                                    <td data-label="Location:">{{ $order->location }}</td>
                                    <td data-label="Payment Reference:">{{ $order->payment_reference }}</td>
                                    <td data-label="Payment Status:">{{ $order->payment_status }}</td>
                                    <td data-label="Dispatch Status:">{{ $order->dispatch_status }}</td>
                                    <td data-label="Action:">


                                        @if ($order->dispatch_status === 'Not Dispatched')
                                            <form method="POST" action="{{ route('order.dispatch', $order->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="action-btn-container">
                                                <button type="submit" class="btn btn-sm btn-primary">M A D</button>
                                                </div>
                                            </form>
                                        @else
                                            <span class="text-success">Already Dispatched</span>
                                        @endif
                                    </td>
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

            </div>

    </div><br><br><br>
    </aside> <br><br><br>


    </div>

@endsection
