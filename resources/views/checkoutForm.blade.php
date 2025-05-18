<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Checkout</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        .checkout-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {text-align: left;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        input {
            padding: 12px;
            margin: 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            background-color: #f9f9f9;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: #fff;
        }

        button {
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        button:focus {
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
h1 {
                font-size: 20px;
            }

            button {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Payment Checkout</h1>


        <form id="paymentForm">

            <!-- Email Field -->
            <label for="email">Email:</label>
            <input type="email" id="email-address" name="email" value="{{ $user->email }}" readonly><br><br>


            <!-- Name Field -->
            <label for="last-name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name}} " readonly><br><br>

            <!-- Amount Field -->
            <label for="amount">Amount to Pay (NGN) :</label>
<input type="number" id="amount" name="amount" value="{{ $sum }}" readonly><br><br>

            <!-- Submit Button -->
            <button type="submit" onclick="payWithPaystack()"> Pay </button><br><br>

            <p>NB: Your order will be dispatched once the payment is successful.</p>

        </form>
  </div>
</body>
</html>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_e25fbe5590e61ff6e05bae70c94cd3cfc0c65652', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response) {
    window.location = "/verify-payment?reference=" + response.reference;
      //alert(message);

    }
  });

  handler.openIframe();
}


  </script>

<script>

  callback: function(response) {
    window.location = "/verify-payment?reference=" + response.reference;
}


</script>


