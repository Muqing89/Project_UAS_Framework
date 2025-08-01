// Donut Chart: Kegiatan
const ctxKegiatan = document.getElementById("chartKegiatan");
if (ctxKegiatan) {
    new Chart(ctxKegiatan, {
        type: 'doughnut',
        data: {
            labels: ["Disetujui", "Ditolak", "Belum Diverifikasi"],
            datasets: [{
                data: kegiatanData,
                backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e'],
                hoverBackgroundColor: ['#17a673', '#be2617', '#dda20a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, position: 'bottom' },
            },
            cutout: '70%',
        },
    });
}

// Donut Chart: Laporan
const ctxLaporan = document.getElementById("chartLaporan");
if (ctxLaporan) {
    new Chart(ctxLaporan, {
        type: 'doughnut',
        data: {
            labels: ["Terverifikasi", "Ditolak", "Menunggu"],
            datasets: [{
                data: laporanData,
                backgroundColor: ['#4e73df', '#e74a3b', '#f6c23e'],
                hoverBackgroundColor: ['#2e59d9', '#be2617', '#dda20a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, position: 'bottom' },
            },
            cutout: '70%',
        },
    });
}

// Donut Chart: Keuangan
const ctxKeuangan = document.getElementById("chartKeuangan");
if (ctxKeuangan) {
    new Chart(ctxKeuangan, {
        type: 'doughnut',
        data: {
            labels: ["Disetujui", "Ditolak", "Belum Diverifikasi"],
            datasets: [{
                data: keuanganData,
                backgroundColor: ['#36b9cc', '#e74a3b', '#f6c23e'],
                hoverBackgroundColor: ['#2c9faf', '#be2617', '#dda20a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, position: 'bottom' },
            },
            cutout: '70%',
        },
    });
}
