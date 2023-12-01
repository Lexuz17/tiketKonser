function showTicketStatus(ticket, ticketId, maxQty) {
    if (new Date(ticket.tanggal_selesai_penjualan) < new Date() || ticket.jumlah_tersedia === 0) {
        return '<p class="fw-bold text-danger title">SALE ENDED</p>';
    } else {
        return `
            <div class="ticket-controller">
                <span ticket-id="${ticketId}" class="ticket-controller-decrease btn-min" onclick="updateTicketQuantity(${ticketId}, -1, ${maxQty})"></span>
                <input ticket-id="${ticketId}" class="ticket-controller-label ticket-qty-input" type="text" readonly="" value="0" disabled>
                <span ticket-id="${ticketId}" class="ticket-controller-increase btn-add" onclick="updateTicketQuantity(${ticketId}, 1, ${maxQty})"></span>
            </div>
        `;
    }
}

function updateTicketQuantity(ticketId, value, maxQty) {
    const ticketQtyInput = document.querySelector(`.ticket-controller-label[ticket-id="${ticketId}"]`);
    let currentQty = parseInt(ticketQtyInput.value, 10);
    let newQty = currentQty + value;

    if (newQty > maxQty) {
        showLebihDariMaxNotification(maxQty);
        return;
    }

    newQty = Math.min(maxQty, Math.max(0, newQty));
    ticketQtyInput.value = newQty;
}

function showLebihDariMaxNotification(maxQty) {
    const notifLebihDariMax = document.querySelector('.notif-lebihdarimax');
    notifLebihDariMax.classList.add('show');
    notifLebihDariMax.innerHTML = `<span class="fa fa-exclamation-circle me-2"></span>Maksimal pembelian tiket dalam 1 transaksi adalah ${maxQty} tiket`;

    setTimeout(() => {
        notifLebihDariMax.classList.remove('show');
    }, 5000);
}



window.onload = function () {
    let targetContainers = document.querySelectorAll('.buy-controller-container');

    targetContainers.forEach(container => {
        let ticketData = JSON.parse(container.getAttribute('data-ticket'));
        let ticketId = JSON.parse(container.getAttribute('id-ticket'));
        let maxQty = ticketData.jumlah_tersedia;
        if(maxQty > 5){
            maxQty = 5;
        }
        container.innerHTML = showTicketStatus(ticketData, ticketId, maxQty);
    });
};

