function onChangeEventTabs(tabType) {
    $("#active-events, #past-events").hide();

    // Tampilkan konten sesuai dengan tab yang dipilih
    $("#" + tabType + "-events").show();

    $("#organizer-event-tabs li a").removeClass('selected');
    $("#organizer-event-tabs li[data-index='" + (tabType === 'active' ? '0' : '1') + "'] a").addClass('selected');
}

// Panggil fungsi untuk menetapkan tab aktif berdasarkan URL atau keadaan awal
$(document).ready(function () {
    // Panggil fungsi untuk menetapkan tab aktif
    onChangeEventTabs('active');
});
