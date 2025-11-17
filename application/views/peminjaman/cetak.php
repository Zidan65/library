<div class="print-area container-fluid">
  <!-- Header -->
  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box bg-light rounded p-3 mb-4">
        <div class="float-end">
          <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item">Peminjaman</li>
            <li class="breadcrumb-item"><a href="<?= base_url('peminjaman') ?>">Data</a></li>
            <li class="breadcrumb-item active">Laporan</li>
          </ol>
        </div>
        <h5 class="page-title">Laporan Riwayat Peminjaman</h5>
      </div>
    </div>
  </div>

  <!-- Statistik Ringkasan -->
  <div class="row mb-3 no-print">
    <div class="col-md-3">
      <div class="card border-primary">
        <div class="card-body text-center">
          <h6 class="card-title text-primary">Total Peminjaman</h6>
          <h4 class="text-primary"><?= count($peminjaman) ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-warning">
        <div class="card-body text-center">
          <h6 class="card-title text-warning">Sedang Dipinjam</h6>
          <h4 class="text-warning">
            <?= count(array_filter($peminjaman, function($item) { return strtolower($item->status) == 'dipinjam'; })) ?>
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-success">
        <div class="card-body text-center">
          <h6 class="card-title text-success">Sudah Dikembalikan</h6>
          <h4 class="text-success">
            <?= count(array_filter($peminjaman, function($item) { return strtolower($item->status) == 'dikembalikan'; })) ?>
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-info">
        <div class="card-body text-center">
          <h6 class="card-title text-info">Tanggal Laporan</h6>
          <h6 class="text-info"><?= date('d/m/Y') ?></h6>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered align-middle table-hover table-sm">
      <thead class="table-info text-center">
        <tr>
          <th width="5%">No</th>
          <th width="20%">Nama</th>
          <th width="25%">Judul Buku</th>
          <th width="15%">Tanggal Pinjam</th>
          <th width="15%">Tanggal Kembali</th>
          <th width="10%">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($peminjaman)): ?>
          <?php $no = 1; foreach ($peminjaman as $item): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= htmlspecialchars($item->nama_user ?? 'User tidak ditemukan') ?></td>
            <td><?= htmlspecialchars($item->judul_buku ?? 'Buku tidak ditemukan') ?></td>
            <td class="text-center">
              <?= $item->tanggal_pinjam ? date('d/m/Y', strtotime($item->tanggal_pinjam)) : '-' ?>
            </td>
            <td class="text-center">
              <?php if ($item->tanggal_kembali && $item->tanggal_kembali != '0000-00-00'): ?>
                <?= date('d/m/Y', strtotime($item->tanggal_kembali)) ?>
              <?php else: ?>
                <span class="text-muted">Belum dikembalikan</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <?php $status = strtolower(trim($item->status)); ?>
              <?php if ($status == 'dipinjam'): ?>
                <span class="badge badge-dipinjam">Dipinjam</span>
              <?php elseif ($status == 'dikembalikan'): ?>
                <span class="badge badge-dikembalikan">Dikembalikan</span>
              <?php else: ?>
                <span class="badge bg-secondary"><?= htmlspecialchars($item->status ?? '-') ?></span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted py-4">
              <i class="bi bi-inbox fs-2 d-block mb-2"></i>
              Tidak ada data peminjaman
              <br><small>Silakan tambah data peminjaman terlebih dahulu</small>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
      
      <!-- Footer Tabel untuk Print -->
      <?php if (!empty($peminjaman)): ?>
      <tfoot class="d-none d-print-table-footer-group">
        <tr>
          <td colspan="6" class="text-center pt-3">
            <strong>
              Total: <?= count($peminjaman) ?> data peminjaman | 
              Dipinjam: <?= count(array_filter($peminjaman, function($item) { return strtolower($item->status) == 'dipinjam'; })) ?> | 
              Dikembalikan: <?= count(array_filter($peminjaman, function($item) { return strtolower($item->status) == 'dikembalikan'; })) ?>
            </strong>
          </td>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
  </div>

  <!-- Tombol Aksi -->
  <div class="text-center mt-4 no-print">
    <button onclick="window.print()" class="btn btn-secondary me-2">
      <i class="bi bi-printer me-2"></i> Cetak Laporan
    </button>
    <a href="<?= base_url('peminjaman') ?>">
      <button type="button" class="btn btn-warning">
        <i class="bi bi-reply me-2"></i> Kembali
      </button>
    </a>
  </div>

  <!-- Footer Saat Print -->
  <div class="d-none d-print-block print-footer text-muted small mt-5">
    <hr>
    <div class="row">
      <div class="col-6">
        <strong>Dicetak pada:</strong> <?= date('d/m/Y H:i:s') ?><br>
        <strong>Sistem:</strong> Perpustakaan Digital
      </div>
      <div class="col-6 text-end">
        <strong>Halaman:</strong> <span class="page-number"></span><br>
        <strong>Total Data:</strong> <?= count($peminjaman) ?> peminjaman
      </div>
    </div>
  </div>
</div>

<!-- CSS -->
<style>
  @media print {
    body * {
      visibility: hidden;
    }
    .print-area, .print-area * {
      visibility: visible;
    }
    .print-area {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      padding: 0;
      margin: 0;
    }
    .no-print,
    .breadcrumb-item a,
    .breadcrumb-item:not(.active) {
      display: none !important;
    }
    a[href]:after {
      content: none;
    }
  }

  .badge-dipinjam {
    background-color: #ff9800 !important; /* Orange */
    color: #fff !important;
    font-size: 0.8rem;
    padding: 0.4em 0.7em;
    border-radius: 0.4rem;
    font-weight: bold;
  }

  .badge-dikembalikan {
    background-color: #4caf50 !important; /* Hijau */
    color: #fff !important;
    font-size: 0.8rem;
    padding: 0.4em 0.7em;
    border-radius: 0.4rem;
    font-weight: bold;
  }
</style>
