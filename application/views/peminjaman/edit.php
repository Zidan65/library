<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
function editData(e) {
    e.preventDefault();

    let formData = new FormData($('#form_edit')[0]);
    
    $.ajax({
        url: '<?php echo base_url('peminjaman/edit') ?>',
        method: 'POST',
        data: formData,
        contentType: false, 
        processData: false,
        dataType: 'json',
        success: function (res) {
            if (res.status == true) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: res.message,
                    icon: "success",
                    confirmButtonColor: "#35baf5",
                    confirmButtonText: "Oke",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?php echo base_url('peminjaman') ?>';
                    }
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: res.message,
                    icon: "error",
                    confirmButtonColor: "#35baf5",
                    confirmButtonText: "Oke",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        }
    });
}
</script>

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Peminjaman</li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>peminjaman">Data</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h5 class="page-title">Peminjaman</h5>
            </div>
        </div>
    </div>

    <!-- Form Edit -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pt-3 pb-3">
                    <h4 class="card-title">Edit Peminjaman</h4>
                </div>
                <div class="card-body">
                    <div class="general-label">
                        <form id="form_edit">
                            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman->id_peminjaman ?>">

                            <!-- Nama User -->
                            <div class="mb-3 row">
                                <label for="nama_user" class="col-sm-2 col-form-label">Nama User <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" 
                                           value="<?= $peminjaman->nama_user ?>" placeholder="Masukkan nama peminjam" required>
                                    <small class="text-muted">Masukkan nama lengkap peminjam</small>
                                </div>
                            </div>

                            <!-- Buku -->
                            <div class="mb-3 row">
                                <label for="id_buku" class="col-sm-2 col-form-label">Buku <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_buku" id="id_buku" required>
                                        <option value="">Pilih Buku</option>
                                        <?php foreach ($buku as $b): ?>
                                            <option value="<?= $b->id_buku ?>" 
                                                <?= ($b->id_buku == $peminjaman->id_buku) ? 'selected' : '' ?>>
                                                <?= $b->judul ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Tanggal Pinjam -->
                            <div class="mb-3 row">
                                <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" 
                                           value="<?= $peminjaman->tanggal_pinjam ?>" required>
                                </div>
                            </div>

                            <!-- Tanggal Kembali -->
                            <div class="mb-3 row">
                                <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" 
                                           value="<?= $peminjaman->tanggal_kembali ?>">
                                    <small class="text-muted">Kosongkan jika belum dikembalikan</small>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="dipinjam" <?= ($peminjaman->status == 'dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
                                        <option value="dikembalikan" <?= ($peminjaman->status == 'dikembalikan') ? 'selected' : '' ?>>Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Info tambahan -->
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <div class="alert alert-info">
                                        <h6><i class="bi bi-info-circle me-2"></i>Informasi Peminjaman</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small><strong>ID Peminjaman:</strong> <?= $peminjaman->id_peminjaman ?></small><br>
                                                <small><strong>Nama saat ini:</strong> <?= $peminjaman->nama_user ?></small>
                                            </div>
                                            <div class="col-md-6">
                                                <small><strong>Buku saat ini:</strong> <?= $peminjaman->judul_buku ?? 'Tidak diketahui' ?></small><br>
                                                <small><strong>Status saat ini:</strong> <?= $peminjaman->status ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tombol -->
                            <div class="row">
                                <div class="col-sm-10 ms-auto">
                                    <button type="button" onclick="editData(event);" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Update
                                    </button>
                                    <a href="<?php echo base_url(); ?>peminjaman" class="btn btn-warning">
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

<style>
.text-danger {
    color: #dc3545 !important;
}
.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.btn {
    margin-right: 5px;
}
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
}
.alert h6 {
    margin-bottom: 10px;
    font-weight: 600;
}
</style>
