<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h4>Jumlah Buku</h4>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                      d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"
                    ></path>
                  </svg>
                  <a
                    href="<?= base_url('buku')?>"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Lihat<i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning">
                  <div class="inner">
                    <h4>Kategori</h4>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                      d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"
                    ></path>
                  </svg>
                  <a
                    href="<?= base_url('kategori')?>"
                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"                 >
                    Lihat<i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-danger">
                  <div class="inner">
                    <h4>Manajemen Peminjaman</h4>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"
                    ></path>
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"
                    ></path>
                  </svg>
                  <a
                    href="<?= base_url('peminjaman')?>"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Lihat<i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="app-content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h4 class="mb-0">Manajemen Peminjaman</h4>
            </div>
        </div>
        </div>
    </div>

    <div class="card shadow border-1 ms-md-3 me-md-3">
        <div class="card-body px-4 ps-3">
        <div class="row g-2 mb-3">
            <div class="col-md-6">
            <a href="<?= base_url('peminjaman/view_tambah') ?>" class="btn btn-success">
                <i class="bi bi-plus me-2"></i>Tambah Peminjaman
            </a>
            <a href="<?= base_url('peminjaman/cetak') ?>"  class="btn btn-secondary">
            <i class="bi bi-printer me-2"></i>Cetak
            </a>
            </div>
            <div class="col-md-5">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari Peminjaman">
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
                <th>Nama User</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="tabel-peminjaman">
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

    .badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.65rem;
    }

    .badge-dipinjam {
        background-color: #ff9800;
        color: white;
    }

    .badge-dikembalikan {
        background-color: #4caf50;
        color: white;
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/pagination.js') ?>"></script>

    <script>
    $(document).ready(function () {
    get_data();

    $("#jumlah_tampil").on("change", function () {
        get_data();
    });

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
        url: '<?= base_url('peminjaman/result_data') ?>',
        type: "POST",
        data: { cari },
        dataType: "json",
        cache: false,
        success: function (res) {
        let table = "";

        if (res.result && res.data.length > 0) {
            let i = 1;
            for (const item of res.data) {
            let statusBadge = '';
            if (item.status === 'dipinjam') {
                statusBadge = '<span class="badge badge-dipinjam">Dipinjam</span>';
            } else if (item.status === 'dikembalikan') {
                statusBadge = '<span class="badge badge-dikembalikan">Dikembalikan</span>';
            } else {
                statusBadge = `<span class="badge bg-secondary">${item.status}</span>`;
            }

            table += `
                <tr>
                    <td>${i}</td>
                    <td>${item.nama_user || 'User tidak ditemukan'}</td>
                    <td>${item.judul_buku || 'Buku tidak ditemukan'}</td>
                    <td>${item.tanggal_pinjam}</td>
                    <td>${item.tanggal_kembali || '-'}</td>
                    <td>${statusBadge}</td>
                    <td>
                    <div class="text-center">
                        <div class="text-center d-flex justify-content-center gap-2">
                            <a href="<?= base_url('peminjaman/view_edit/') ?>${item.id_peminjaman}" class="btn btn-sm btn-primary" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                            </a>
                            ${item.status === 'dipinjam' ? `
                            <button type="button" class="btn btn-sm btn-warning" title="Kembalikan Buku" onclick="kembalikan(${item.id_peminjaman})">
                            <i class="bi bi-arrow-repeat"></i>
                            </button>
                            ` : ''}
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

        function kembalikan(id_peminjaman) {
    Swal.fire({
        title: "Konfirmasi",
        text: "Tandai buku ini sudah dikembalikan?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#198754",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Kembalikan",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: '<?= base_url('peminjaman/kembalikan'); ?>',
            method: 'POST',
            data: { id_peminjaman },
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
            Swal.fire("Error", "Terjadi kesalahan saat mengembalikan buku", "error");
            }
        });
        }
    });
    }

    </script>