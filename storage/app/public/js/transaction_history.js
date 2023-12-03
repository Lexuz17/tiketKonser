document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tabs-nav .tab");
    const activeTabContent = document.querySelector('.tabs-content');

    function fetchDataAndRenderTabContent(eventType) {
        fetch(`/get-event-data?event=${eventType}`)
            .then(response => response.json())
            .then(data => {
                const dataArray = data.data;

                if (dataArray.length === 0) {
                    const emptyHtmlContent = `
                        <div class="invoice-list-empty">
                            <i class="fa-solid fa-ticket me-2 text-gray-4" style="font-size: 60px;"></i>
                            <div class="text-gray-4">
                                Kamu belum memiliki tiket, silakan membeli tiket terlebih dahulu.
                            </div>
                            <a href="/" target="blank" class="text-primary text-decoration-none">Cari Event Sekarang</a>
                        </div>`;
                    activeTabContent.innerHTML = emptyHtmlContent;
                } else {
                    const htmlContent = dataArray.map(item => {
                        const concertDate = new Date(item.tanggal_konser);
                        const formattedConcertDate = concertDate.toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                        const transactionDate = new Date(item.tanggal_transaction);
                        const formattedTransactionDate = transactionDate.toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });

                        const alertClass = (() => {
                            switch (item.status_pembayaran.toLowerCase()) {
                                case 'success':
                                    return 'alert-success';
                                case 'pending':
                                    return 'alert-warning';
                                case 'failed':
                                    return 'alert-danger';
                                default:
                                    return 'alert-info'
                            }
                        })();

                        return `
                        <div class="row g-3 py-3">
                            <div class="col-md-12">
                                <div class="invoice-list">
                                    <div class="invoice-item rounded-3 shadow bg-white mb-3">
                                        <div class="invoice-item-header px-4 pt-4 pb-2 d-flex justify-content-between align-items-center">
                                            <div class="invoice-status">
                                                <div class="invoice-payment-status paid alert ${alertClass} py-2 fs-label">
                                                    Pembayaran ${item.status_pembayaran}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-item-content p-4">
                                            <div class="item-content-detail">
                                                <div class="event-detail-title fs-5 fw-bold text-black">
                                                    ${item.concert_name}
                                                </div>
                                                <div class="additional d-flex align-items-center mt-1">
                                                    <div class="additional-date d-flex align-items-center">
                                                        <i class="fa-regular fa-calendar-days me-2 text-gray-3"></i>
                                                        ${formattedConcertDate}
                                                    </div>
                                                    <div class="additional-separator"></div>
                                                    <div class="additional-ticket-qty d-flex align-items-center">
                                                        <i class="fa-solid fa-ticket me-2 text-gray-3"></i>
                                                        ${item.total_tiket} Tiket
                                                    </div>
                                                </div>
                                                <div class="invoice-date mt-1">Pembelian pada ${formattedTransactionDate}</div>
                                                <div class="additional-cta mt-3">
                                                    <div class="invoice-links d-flex gap-3">
                                                        ${item.status_pembayaran === 'Success' ?
                                `<div class="btn btn-primary">
                                                                E-Voucher
                                                            </div>` : ''}
                                                        <div class="btn btn-outline-dark">
                                                            Invoice
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-content-banner">
                                                <img src="/storage/image/home/Event/${item.concert_gambar}"
                                                    class="w-100 rounded-3" alt="DUNIA MENCEKAM DANAU TERLARANG">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    }).join('');

                    activeTabContent.innerHTML = htmlContent;
                }
            })
            .catch(error => {
                console.error('Error fetching data from server.');
            });
    }

    // Panggil fungsi untuk tab aktif secara otomatis saat halaman dimuat
    fetchDataAndRenderTabContent('aktif');

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            tabs.forEach(t => t.classList.remove("tab-active"));
            tab.classList.add("tab-active");

            if (tab.textContent.trim() === 'Event Lalu') {
                fetchDataAndRenderTabContent('lalu');
            } else {
                fetchDataAndRenderTabContent('aktif');
            }
        });
    });
});
