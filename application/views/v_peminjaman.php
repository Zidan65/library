<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="mb-0">Manajemen Peminjaman</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Tombol Aksi dan Pencarian -->
  <div class="card shadow border-1 ms-md-3 me-md-3">
    <div class="card-body px-4 ps-3">
      <div class="row g-2 mb-3">
        <div class="col-md-6">
          <a href="<?= base_url('peminjaman/view_tambah') ?>" class="btn btn-success">
            <i class="bi bi-plus me-2"></i>Tambah Peminjaman
          </a>
          <a href="<?= base_url('peminjaman/cetak') ?>" class="btn btn-secondary">
            <i class="bi bi-printer me-2"></i>Cetak
          </a>
        </div>
        <div class="col-md-5">
          <input type="text" id="searchInput" class="form-control" placeholder="Cari Peminjaman">
        </div>
      </div>
    </div>
  </div>

  <!-- Tabel Data -->
  <div class="card shadow border-1 mt-0 mb-4 ms-md-3 me-md-3">
    <div class="table-responsive">
      <table class="table table-bordered table-hover text-center align-middle mb-0" id="table-data">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tabel-peminjaman"></tbody>
      </table>
    </div>

    <!-- Pagination & Jumlah Tampil -->
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

<!-- STYLE -->
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

  .pagination-wrapper {
    margin-bottom: 30px;
  }
</style>

<!-- SCRIPT -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/pagination.js') ?>"></script>

<script>
  $(document).ready(function () {
    get_data();

    $('#jumlah_tampil').on('change', get_data);
    $('#searchInput').on('keyup', get_data);
  });

  // 🔹 Ambil data peminjaman
  function get_data() {
    const cari = $('#searchInput').val();
    const jumlah_tampil = parseInt($('#jumlah_tampil').val());
    const count_header = $('#table-data thead tr th').length;

    $('#table-data tbody').html('');

    $.ajax({
      url: '<?= base_url('peminjaman/result_data') ?>',
      type: 'POST',
      data: { cari },
      dataType: 'json',
      cache: false,
      success: function (res) {
        let html = '';

        if (res.result && res.data.length > 0) {
          let no = 1;
          res.data.forEach(item => {
            const statusBadge =
              item.status === 'dipinjam'
                ? '<span class="badge badge-dipinjam">Dipinjam</span>'
                : item.status === 'dikembalikan'
                ? '<span class="badge badge-dikembalikan">Dikembalikan</span>'
                : `<span class="badge bg-secondary">${item.status}</span>`;

            html += `
              <tr>
                <td>${no++}</td>
                <td>${item.nama_user || 'User tidak ditemukan'}</td>
                <td>${item.judul_buku || 'Buku tidak ditemukan'}</td>
                <td>${item.tanggal_pinjam}</td>
                <td>${item.tanggal_kembali || '-'}</td>
                <td>${statusBadge}</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="<?= base_url('peminjaman/view_edit/') ?>${item.id_peminjaman}" 
                       class="btn btn-sm btn-primary" title="Edit">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    ${item.status === 'dipinjam' ? `
                      <button type="button" class="btn btn-sm btn-warning" 
                              title="Kembalikan Buku" 
                              onclick="kembalikan(${item.id_peminjaman})">
                        <i class="bi bi-arrow-repeat"></i>
                      </button>` : ''}
                    <button type="button" class="btn btn-sm btn-danger" 
                            title="Hapus" 
                            onclick="hapus(${item.id_peminjaman})">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            `;
          });

          $('#table-data tbody').html(html);
          paging($('#table-data tbody tr'), jumlah_tampil);
        } else {
          $('#table-data tbody').html(`
            <tr>
              <td colspan="${count_header}" class="text-center">Data tidak ditemukan</td>
            </tr>
          `);
          $('#pagination').html('');
        }
      },
      error: function () {
        $('#table-data tbody').html(`
          <tr>
            <td colspan="${count_header}" class="text-center text-danger">Gagal memuat data</td>
          </tr>
        `);
      }
    });
  }

  // 🔹 Pagination
  function paging($selector, jumlah_tampil = 5) {
    if (window.tp && typeof window.tp.destroy === 'function') window.tp.destroy();
    document.querySelector('#pagination').innerHTML = '';

    window.tp = new Pagination('#pagination', {
      itemsCount: $selector.length,
      pageSize: jumlah_tampil,
      labels: {
        previous: '«',
        next: '»',
        first: '««',
        last: '»»'
      },
      onPageChange: function (paging) {
        const start = paging.pageSize * (paging.currentPage - 1);
        const end = start + paging.pageSize;
        $selector.hide();
        for (let i = start; i < end; i++) $selector.eq(i).show();
      }
    });
  }

  // 🔹 Kembalikan Buku
  function kembalikan(id_peminjaman) {
    Swal.fire({
      title: 'Konfirmasi',
      text: 'Tandai buku ini sudah dikembalikan?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#198754',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Kembalikan',
      cancelButtonText: 'Batal'
    }).then(result => {
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
              icon: res.status ? 'success' : 'error',
              confirmButtonColor: '#35baf5',
              confirmButtonText: 'Oke'
            }).then(() => get_data());
          },
          error: function () {
            Swal.fire('Error', 'Terjadi kesalahan saat mengembalikan buku', 'error');
          }
        });
      }
    });
  }

  // 🔹 Hapus Data
  function hapus(id_peminjaman) {
    Swal.fire({
      title: 'Yakin hapus?',
      text: 'Data ini tidak bisa dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then(result => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('peminjaman/hapus'); ?>',
          type: 'POST',
          data: { id_peminjaman },
          dataType: 'json',
          success: function (res) {
            Swal.fire({
              title: res.status ? 'Berhasil!' : 'Gagal!',
              text: res.message,
              icon: res.status ? 'success' : 'error',
              confirmButtonColor: '#35baf5',
              confirmButtonText: 'Oke'
            }).then(() => {
              if (res.status) get_data();
            });
          },
          error: function () {
            Swal.fire('Error', 'Terjadi kesalahan saat menghapus data.', 'error');
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