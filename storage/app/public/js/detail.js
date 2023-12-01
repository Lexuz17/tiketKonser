let tickets = [];

function number_format(number, decimals, decPoint, thousandsSep) {
    decimals = decimals || 0;
    number = parseFloat(number);

    if (!decPoint || !thousandsSep) {
        return number.toLocaleString();
    }

    var roundedNumber = number.toFixed(decimals);
    var parts = roundedNumber.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep);

    return parts.join(decPoint);
}


function showTicketStatus(ticket, ticketId, maxQty, cheapest) {
    if (new Date(ticket.tanggal_selesai_penjualan) < new Date()) {
        return '<p class="fw-bold text-danger title">SALE ENDED</p>';
    }
    else if (ticket.jumlah_tersedia === 0) {
        return '<p class="fw-bold text-danger title">SOLD OUT</p>';
    }
    else {
        ticketNama = ticket.kategori;
        ticketHarga = ticket.harga;
        return `
            <div class="ticket-controller">
                <span ticket-id="${ticketId}" class="ticket-controller-decrease btn-min" onclick="updateTicketQuantity(${ticketId}, -1, ${maxQty}, '${ticketNama}', ${ticketHarga}, ${cheapest})"></span>
                <input ticket-id="${ticketId}" class="ticket-controller-label ticket-qty-input" type="text" readonly="" value="0" disabled>
                <span ticket-id="${ticketId}" class="ticket-controller-increase btn-add" onclick="updateTicketQuantity(${ticketId}, 1, ${maxQty}, '${ticketNama}', ${ticketHarga}, ${cheapest})"></span>
            </div>
        `;
    }
}

function updateTicketQuantity(ticketId, value, maxQty, ticketNama, ticketHarga, cheapest) {
    const ticketQtyInput = document.querySelector(`.ticket-controller-label[ticket-id="${ticketId}"]`);
    const totalQuantityInput = document.getElementById('total_quantity');

    let currentQty = parseInt(ticketQtyInput.value, 10);
    let newQty = currentQty + value;

    if (newQty > maxQty) {
        showLebihDariMaxNotification(maxQty);
        return;
    }

    newQty = Math.min(maxQty, Math.max(0, newQty));
    ticketQtyInput.value = newQty;

    // Update the hidden input for the specific ticket
    const hiddenInputName = `selected_tickets[${ticketId}]`;
    const hiddenInput = document.querySelector(`input[name="${hiddenInputName}"]`);
    if (hiddenInput) {
        hiddenInput.value = newQty;
    }

    totalQuantityInput.value = calculateTotalQuantity();

    newHarga = ticketHarga * newQty;

    // Temukan tiket yang sesuai dalam array tickets
    const ticketIndex = tickets.findIndex(ticket => ticket.id === ticketId);

    if (ticketIndex !== -1) {
        // Jika tiket sudah ada dalam array, perbarui jumlahnya
        tickets[ticketIndex].quantity = newQty;
        tickets[ticketIndex].harga = newHarga;
    } else {
        // Jika tiket belum ada dalam array, tambahkan sebagai objek baru
        tickets.push({ id: ticketId, quantity: newQty, nama: ticketNama, harga: ticketHarga });
    }

    updateCartUI(tickets, cheapest);
}


function calculateTotalQuantity() {
    // Fungsi ini menghitung dan mengembalikan total kuantitas tiket yang dipilih.
    const ticketQtyInputs = document.querySelectorAll('.ticket-controller-label');
    let totalQuantity = 0;

    ticketQtyInputs.forEach(input => {
        totalQuantity += parseInt(input.value, 10);
    });

    return totalQuantity;
}

function updateCartUI(tickets, cheapest) {
    const cartNowContainer = document.getElementById('cartNowContainer');

    cartNowContainer.innerHTML = '';

    // Filter out tickets with quantity 0
    const validTickets = tickets.filter(ticket => ticket.quantity > 0);

    if (validTickets.length > 0) {
        // Loop through valid tickets and add them to the cart list
        validTickets.forEach(ticket => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('event-detail-cart-list');
            cartItem.innerHTML = `
                <div class="event-detail-cart-item">
                    <i class="fa-solid fa-ticket-simple fs-4 mt-2 me-3 mb-1 ms-1 text-secondary" style="transform: rotate(-15deg);"></i>
                    <div class="cart-item-name">${ticket.nama}</div>
                    <div class="cart-item-description d-flex justify-content-between">
                        <span class="biji text-gray-3">${ticket.quantity} Tiket</span>
                        <span class="harga fw-semibold">Rp ${number_format(ticket.harga, 0, ',', '.')}</span>
                    </div>
                </div>
            `;
            cartNowContainer.appendChild(cartItem);
        });

        const totalAmount = validTickets.reduce((total, ticket) => total + ticket.harga, 0);

        const cartAmount = document.createElement('div');
        cartAmount.classList.add('event-detail-cart-amount');

        cartAmount.innerHTML = `
            <div class="event-detail-cart-amount-label">
                <label class="amount-label-qty">Total ${validTickets.length} tiket</label>
                <label class="fs-5 fw-semibold">Rp
                    <span class="fs-5 fw-semibold">${number_format(totalAmount, 0, ',', '.')}</span>
                </label>
            </div>
        `;

        cartNowContainer.appendChild(cartAmount);
    } else {
        // Jika tiket null atau semua quantity 0, tampilkan pesan lain
        const noTicketMessage = document.createElement('div');
        noTicketMessage.classList.add('event-detail-cart-none');

        noTicketMessage.innerHTML = `
            <div class="d-flex border-bottom border-1 border-light-subtle">
                <i class="fa-solid fa-ticket-simple fs-4 mt-2 me-3 ms-1 text-secondary"
                    style="transform: rotate(-15deg);"></i>
                <p class="fs-label">Kamu belum memilih tiket.
                    Silakan pilih lebih dulu di tab menu TIKET.</p>
            </div>
            <div class="d-flex flex-row pt-4">
                <p class="fs-6 fontxlarge">Harga Mulai Dari</p>
                <p class="fs-6 fw-bold fontxlarge ms-auto">Rp ${number_format(cheapest, 0, ',', '.')}</p>
            </div>
        `;

        cartNowContainer.appendChild(noTicketMessage);
    }
}

function showLebihDariMaxNotification(maxQty) {
    const notifLebihDariMax = document.querySelector('.notif-lebihdarimax');
    notifLebihDariMax.classList.add('show');
    notifLebihDariMax.innerHTML = `<span class="fa fa-exclamation-circle me-3"></span>Maksimal pembelian tiket dalam 1 transaksi adalah ${maxQty} tiket`;

    setTimeout(() => {
        notifLebihDariMax.classList.remove('show');
    }, 5000);
}

window.onload = function () {
    const controllerCartContainers = document.querySelectorAll('.buy-controller-container');
    const cartNowContainer = document.querySelector('.cart-now');
    const cheapest = JSON.parse(cartNowContainer.getAttribute('cheapest-price'));

    controllerCartContainers.forEach(container => {
        let ticketData = JSON.parse(container.getAttribute('data-ticket'));
        let ticketId = JSON.parse(container.getAttribute('id-ticket'));
        let maxQty = ticketData.jumlah_tersedia;
        if (maxQty > 5) {
            maxQty = 5;
        }
        container.innerHTML = showTicketStatus(ticketData, ticketId, maxQty, cheapest);
    });

    updateCartUI(tickets, cheapest);
};

function validateForm() {
    // Ambil nilai jumlah tiket dari elemen HTML
    var ticketQuantity = parseInt(document.getElementById('total_quantity').value);

    if (ticketQuantity < 1) {
        const notifLebihDariMax = document.querySelector('.notif-gblhZero');
        notifLebihDariMax.classList.add('show');

        setTimeout(() => {
            notifLebihDariMax.classList.remove('show');
        }, 5000);
        return false;
    }

    return true;
}
