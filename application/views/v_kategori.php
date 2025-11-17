<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="mb-0">Kategori</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Tombol Tambah & Pencarian -->
  <div class="card shadow border-1 ms-md-3 me-md-3">
    <div class="card-body px-4 ps-3">
      <div class="row g-2 mb-3">
        <div class="col-md-6">
          <a href="<?= base_url('kategori/view_tambah') ?>" class="btn btn-success">
            <i class="bi bi-plus me-2"></i>Tambah Kategori
          </a>
        </div>
        <div class="col-md-5">
          <input type="text" id="searchInput" class="form-control" placeholder="Cari Kategori">
        </div>
      </div>
    </div>
  </div>

  <!-- Tabel Data -->
  <div class="card shadow border-1 mt-0 ms-md-3 me-md-3">
    <div class="table-responsive">
      <table class="table table-bordered table-hover text-center align-middle mb-0">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tabel-kategori"></tbody>
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

    $('#searchInput').on('keyup', get_data);
    $('#jumlah_tampil').on('change', get_data);
  });

  // Ambil Data
  function get_data() {
    const cari = $('#searchInput').val();

    $.ajax({
      url: '<?= base_url('kategori/result_data') ?>',
      method: 'POST',
      data: { cari: cari },
      dataType: 'json',
      success: function (res) {
        if (res.result) {
          let html = '';
          let no = 1;

          res.data.forEach(item => {
            html += `
              <tr>
                <td>${no++}</td>
                <td>${item.nama}</td>
                <td>
                  <a href="<?= base_url('kategori/view_edit/') ?>${item.id}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <button type="button" class="btn btn-sm btn-danger" onclick="hapus(${item.id})">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
            `;
          });

          $('#tabel-kategori').html(html);
          paging($('#tabel-kategori tr'));
        } else {
          $('#tabel-kategori').html('<tr><td colspan="3" class="text-center">Data tidak ditemukan</td></tr>');
          $('#pagination').html('');
        }
      },
      error: function () {
        Swal.fire('Error', 'Gagal memuat data', 'error');
      }
    });
  }

  // Hapus Data
  function hapus(id) {
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
          url: '<?= base_url('kategori/hapus'); ?>',
          type: 'POST',
          data: { id: id },
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

  // Pagination
  function paging($selector, jumlah_tampil = parseInt($('#jumlah_tampil').val())) {
    if (window.tp) window.tp.destroy();

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
        for (let i = start; i < end; i++) {
          $selector.eq(i).show();
        }
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