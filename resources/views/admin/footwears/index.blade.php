<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
          .orders {
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
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
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

    </style>
</head>
<body>

<header>
    <div class="logo"><span class="highlight">De'light </span>Footwears</div>

    <div class="sidebar" id="sidebar">
        <a href="/admin/orders" class="orders">Orders</a>

    </div>
</header>


<div class="container">
   <h2>Available Footwears</h2>
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
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <button onclick="editModal({{ $item }})">Edit</button>
                        <form method="POST" action="{{ route('footwears.destroy', $item->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
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
<div id="editModal"  class="modal">
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


</body>

</html>
