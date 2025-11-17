<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Peminjaman</li>
                        <li class="breadcrumb-item"><a href="<?= base_url('peminjaman') ?>">Data</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
                <h5 class="page-title">Tambah Peminjaman</h5>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pt-3 pb-3">
                    <h4 class="card-title">Form Tambah Peminjaman</h4>
                </div>
                <div class="card-body">
                    <div class="general-label">
                        <form id="form_tambah">
                            <!-- inputan start -->
                            <div class="mb-3 row">
                                <label for="nama_user" class="col-sm-2 col-form-label">Nama User <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukkan nama peminjam" required>
                                    <small class="text-muted">Masukkan nama lengkap peminjam</small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="id_buku" class="col-sm-2 col-form-label">Buku <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_buku" id="id_buku" required>
                                        <option value="">Pilih Buku</option>
                                        <?php foreach ($buku as $b): ?>
                                            <option value="<?= $b->id_buku ?>"><?= $b->judul ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
                                    <small class="text-muted">Kosongkan jika belum dikembalikan</small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="dipinjam" selected>Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- inputan end -->

                            <div class="row">
                                <div class="col-sm-10 ms-auto">
                                    <button type="button" onclick="tambah(event);" class="btn btn-success">
                                        <i class="bi bi-save me-2"></i>Simpan
                                    </button>
                                    <a href="<?= base_url('peminjaman') ?>" class="btn btn-warning">
                                        <i class="bi bi-reply me-2"></i>Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS Tambah -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function tambah(e) {
    e.preventDefault();
    let formData = new FormData($('#form_tambah')[0]);

    $.ajax({
        url: '<?= base_url('peminjaman/tambah') ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(res) {
            if (res.status == true) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: res.message,
                    icon: "success",
                }).then(() => {
                    window.location.href = '<?= base_url('peminjaman') ?>';
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: res.message,
                    icon: "error",
                });
            }
        },
        error: function() {
            Swal.fire("Error", "Terjadi kesalahan pada server!", "error");
        }
    });
}
</script>

<style>
.text-danger {
    color: #dc3545 !important;
}
.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}
.btn {
    margin-right: 5px;
}
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
}
</style>
