@extends("layout.master")

@section('title', 'cart')

@section("content")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <style>
        .event-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            display: flex;
            align-items: center;
        }
        .event-img {
            width: 100px;
            margin-right: 20px;
        }
        .event-quantity input[type="number"] {
            width: 40px;
            margin-right: 15px;
        }

        .event-details {
            flex: 1;
        }
        .event-price {
            font-weight: bold;
            margin-right: 10px;
        }
        /* CSS seperti yang sudah Anda buat sebelumnya */
        .total-amount {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Your Cart</h2>
    <div class="event-list mt-4">
        <div class="event-item">
            <div class="event-img">
                <img src="https://via.placeholder.com/100" alt="Event Image">
            </div>
            <div class="event-details">
                <h4>Event Name</h4>
                <p>Description of the events goes here...</p>
            </div>
            <div class="event-price">
                $50
            </div>
            <div class="event-quantity">
                <input type="number" value="1" min="1">
            </div>
            <div class="delete-icon">
                <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
            </div>
        </div>
    </div>
    <div class="total-amount mt-4">
        <h4>Total Amount:</h4>
        <p id="totalAmount">$0.00</p>
    </div>
</div>

<script>
    function calculateTotal() {
        let totalPrice = 0;
        const eventItems = document.querySelectorAll('.event-item');

        eventItems.forEach(item => {
            const priceElement = item.querySelector('.event-price');
            const quantityElement = item.querySelector('.event-quantity input');

            const price = parseFloat(priceElement.textContent.replace('$', ''));
            const quantity = parseFloat(quantityElement.value);

            totalPrice += price * quantity;
        });

        const totalAmountElement = document.getElementById('totalAmount');
        totalAmountElement.textContent = '$' + totalPrice.toFixed(2);
    }

    // Panggil fungsi calculateTotal saat halaman dimuat
    window.addEventListener('DOMContentLoaded', calculateTotal);

    // Tambahkan event listener untuk menghitung ulang total setiap kali input quantity berubah
    const quantityInputs = document.querySelectorAll('.event-quantity input');
    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
</script>

</body>
</html>


@endsection
