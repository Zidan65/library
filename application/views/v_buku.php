    <main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h4 class="mb-0">Data Buku</h4>
            </div>
        </div>
        </div>
    </div>

    <div class="card shadow border-1 ms-md-3 me-md-3">
        <div class="card-body px-4 ps-3">
        <div class="row g-2 mb-3">
            <div class="col-md-6">
            <a href="<?= base_url('buku/view_tambah') ?>" class="btn btn-success">
                <i class="bi bi-plus me-2"></i>Tambah Buku
            </a>
            </div>
            <div class="col-md-5">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari Buku">
            </div>
        </div>
        </div>
    </div>

    <div class="card shadow border-1 mt-0 mb-4 ms-md-3 me-md-3">
        <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle mb-0" id="table-data">
            <thead class="table-info">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="tabel-buku">
            <!-- Data akan dimuat disini -->
            </tbody>
        </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 px-3 pagination-wrapper">
        <nav aria-label="Navigasi halaman">
            <ul class="pagination flex-wrap mb-0" id="pagination">
            <li class="page-item" data-page="-3">
                <a class="page-link" href="#" aria-label="Halaman pertama">««</a>
            </li>
            <li class="page-item" data-page="-1">
                <a class="page-link" href="#" aria-label="Sebelumnya">«</a>
            </li>
            <li class="page-item" data-page="-2">
                <a class="page-link" href="#" aria-label="Berikutnya">»</a>
            </li>
            <li class="page-item" data-page="-4">
                <a class="page-link" href="#" aria-label="Halaman terakhir">»»</a>
            </li>
            </ul>
        </nav>

        <!-- Bagian Jumlah Tampil -->
        <div class="d-flex align-items-center">
            <label for="jumlah_tampil" class="me-2 fw-semibold mb-0">Jumlah Tampil</label>
            <select class="form-select form-select-sm" id="jumlah_tampil" style="width: 80px;">
            <option value="5" selected>5</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            </select>
        </div>
        </div>
    </div>
    </main>

    <style>
    .table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.8rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 0.4rem 0.6rem;
        text-align: center;
        vertical-align: middle;
        max-width: 150px;
        word-wrap: break-word;
    }

    .table thead {
        background-color: #007bff;
        color: #fff;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: #f1f9ff;
        transition: background-color 0.3s ease;
    }

    #pagination {
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .paginationjs {
        display: flex;
        justify-content: start;
        gap: 5px;
    }

    .pagination-wrapper,
    .d-flex.justify-content-between.align-items-center.mt-3.px-3 {
        margin-bottom: 30px;
    }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/pagination.js') ?>"></script>

    <script>
    $(document).ready(function () {
    get_data();

    // Saat jumlah tampil berubah
    $("#jumlah_tampil").on("change", function () {
        get_data();
    });

    // Saat input pencarian berubah
    $('#searchInput').on('keyup', function () {
        get_data();
    });
    });

    function get_data() {
    let cari = $('#searchInput').val();
    let jumlah_tampil = parseInt($('#jumlah_tampil').val());
    let count_header = $('#table-data thead tr th').length;

    // Tampilkan loading
    $('#tr-loading').show();
    $('#table-data tbody').html("");

    $.ajax({
        url: '<?= base_url('buku/result_data') ?>',
        type: "POST",
        data: { cari },
        dataType: "json",
        cache: false,
        success: function (res) {
        let table = "";

        if (res.result && res.data.length > 0) {
            let i = 1;
            for (const item of res.data) {
            table += `
                <tr>
                <td>${i}</td>
                <td>${item.cover ? `<img src="<?= base_url('assets/cover/') ?>${item.cover}" width="60" class="img-thumbnail">` : '<span class="text-muted">No Cover</span>'}</td>
                <td>${item.judul}</td>
                <td>${item.pengarang}</td>
                <td>${item.penerbit}</td>
                <td>${item.tahun_terbit}</td>
                <td>${item.nama_kategori || '-'}</td>
                <td>${item.deskripsi}</td>
                <td>
                    <div class="text-center">
                    <a href="<?= base_url('buku/view_detail/') ?>${item.id_buku}">
                        <button type="button" class="btn btn-sm btn-warning" title="Detail">
                            <i class="bi bi-eye"></i>
                        </button>
                    </a>
                    <a href="<?= base_url('buku/view_edit/') ?>${item.id_buku}">
                        <button type="button" class="btn btn-sm btn-primary" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="hapus(${item.id_buku})">
                        <i class="bi bi-trash"></i>
                    </button>
                    </div>
                </td>
                </tr>
            `;
            i++;
            }

            $('#table-data tbody').html(table);

            paging($('#table-data tbody tr'), jumlah_tampil);
        } else {
            table = `
            <tr>
                <td colspan="${count_header}" class="text-center">Data tidak ditemukan</td>
            </tr>
            `;
            $('#table-data tbody').html(table);
            $('#pagination').html(''); 
        }
        },
        error: function () {
        $('#table-data tbody').html(`
            <tr>
            <td colspan="${count_header}" class="text-center text-danger">Gagal memuat data</td>
            </tr>
        `);
        },
        complete: function () {
        $('#tr-loading').hide();
        }
    });
    }

    function paging($selector, jumlah_tampil = 5) {
    if (window.tp) {
        window.tp.destroy();
    }

    window.tp = new Pagination('#pagination', {
        itemsCount: $selector.length,
        pageSize: jumlah_tampil,
        labels: {
        previous: '«',
        next: '»',
        first: '««',
        last: '»»',
        },
        onPageChange: function (paging) {
        const start = paging.pageSize * (paging.currentPage - 1);
        const end = start + paging.pageSize;

        $selector.hide();
        for (let i = start; i < end; i++) {
            $selector.eq(i).show();
        }
        }
    });
    }

    function hapus(id_buku) {
    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Menghapus Data Buku Saat Ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Dihapus",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: '<?= base_url('buku/hapus'); ?>',
            method: 'POST',
            data: { id_buku },
            dataType: 'json',
            success: function (res) {
            Swal.fire({
                title: res.status ? 'Berhasil!' : 'Gagal!',
                text: res.message,
                icon: res.status ? "success" : "error",
                confirmButtonColor: "#35baf5",
                confirmButtonText: "Oke"
            }).then(() => {
                get_data(); 
            });
            },
            error: function () {
            Swal.fire("Error", "Terjadi kesalahan saat menghapus data", "error");
            }
        });
        }
    });
    }

    </script>

    <style>
        /* Spasi antar tombol pagination */
.pagination {
  gap: 6px; /* jarak antar tombol */
}

.page-item .page-link {
  padding: 6px 12px;      /* ukuran tombol lebih proporsional */
  border-radius: 8px;     /* biar tombol agak bulat */
  border: 1px solid #dee2e6;
}

.page-item.active .page-link {
  background-color: #0d6efd;
  border-color: #0d6efd;
  color: white;
}

/* Tambahan efek hover biar halus */
.page-link:hover {
  background-color: #e9ecef;
}


    </style>
