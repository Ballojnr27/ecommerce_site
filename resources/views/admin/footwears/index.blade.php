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

        td button {
            background-color: #e8491d;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 3px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #35424b;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            width: 60%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .modal-content form input,
        .modal-content form select,
        .modal-content form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
             .action-buttons {
        display: flex;
        flex-direction: row;
        gap: 8px;
        flex-wrap: wrap; /* optional, to wrap if very tight */
    }

    .action-buttons button {
        font-size: 12px;
        padding: 4px 8px;
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
                                <li class="side-right"><a href="/admin/orders">Orders</a></li>
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
                    <center>
                        <h1 class="welcome">Available Footwears</h1>
                    </center>
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footwears as $item)
                                <tr>
                                    <td data-label="Category:">{{ $item->category }}</td>
                                    <td data-label="Name:">{{ $item->name }}</td>
                                    <td data-label="Price:">{{ $item->price }}</td>
                                    <td data-label="Description:">{{ $item->description }}</td>
                                    <td data-label="Action:">
                                        <div class="action-buttons">
                                            <button onclick="editModal({{ $item }})">Edit</button>
                                            <form method="POST" action="{{ route('footwears.destroy', $item->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button class="primary" onclick="openAddModal()">Add New Footwear</button>
                </div>

                <!-- Add Modal -->
                <div id="addModal" class="modal">
                    <div class="modal-content">
                        <h3>Add New Footwear</h3>
                        <form method="POST" action="{{ route('footwears.store') }}" enctype="multipart/form-data">
                            @csrf
                            <select name="category" required>
                                <option value="Male Shoe">Male Shoe</option>
                                <option value="Female Shoe">Female Shoe</option>
                                <option value="Casual Wear">Casual Wear</option>
                                <option value="Sandal">Sandal</option>
                            </select>
                            <input type="text" name="name" placeholder="Footwear Name" required>
                            <input type="number" step="0.01" name="price" placeholder="Price" required>
                            <textarea name="description" placeholder="Description" required></textarea>
                            <input type="file" name="image" required>
                            <button type="submit" class="primary">Add</button>
                            <button type="button" onclick="closeAddModal()">Cancel</button>
                        </form>
                    </div>
                </div>


                <!-- Edit Modal -->
                <div id="editModal" class="modal">
                    <div class="modal-content">
                        <h3>Edit Footwear</h3>
                        <form id="editForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="editId">

                            <label>Category</label>
                            <select name="category" id="editCategory" required>
                                <option value="Male Shoe">Male Shoe</option>
                                <option value="Female shoe">Female Shoe</option>
                                <option value="Casual Wear">Casual Wear</option>
                                <option value="Sandal">Sandal</option>
                            </select>

                            <label>Name</label>
                            <input type="text" name="name" id="editName" required>

                            <label>Price</label>
                            <input type="number" step="0.01" name="price" id="editPrice" required>

                            <label>Description</label>
                            <textarea name="description" id="editDescription" required></textarea>

                            <label>Change Image (optional)</label>
                            <input type="file" name="image">

                            <button type="submit">Update</button>
                            <button type="button" onclick="closeModal()">Cancel</button>
                        </form>
                    </div>
                </div>


                <script>
                    function openAddModal() {
                        document.getElementById('addModal').style.display = 'block';
                    }

                    function closeAddModal() {
                        document.getElementById('addModal').style.display = 'none';
                    }

                    function editModal(item) {
                        document.getElementById('editId').value = item.id;
                        document.getElementById('editCategory').value = item.category;
                        document.getElementById('editName').value = item.name;
                        document.getElementById('editPrice').value = item.price;
                        document.getElementById('editDescription').value = item.description;

                        document.getElementById('editForm').action = '/admin/footwears/' + item.id;
                        document.getElementById('editModal').style.display = 'block';
                    }

                    function closeEditModal() {
                        document.getElementById('editModal').style.display = 'none';
                    }

                    window.onclick = function(event) {
                        if (event.target === document.getElementById('editModal')) {
                            closeEditModal();
                        }
                        if (event.target === document.getElementById('addModal')) {
                            closeAddModal();
                        }
                    }
                </script>

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
