<!-- jQuery dan SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(document).ready(function () {
    kategori();
});

function edit(e) {
    e.preventDefault();

    let formData = new FormData($('#form_edit')[0]);

    $.ajax({
        url: '<?= base_url('buku/edit') ?>',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (res) {
            if (res.status === true) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: res.message,
                    icon: 'success',
                    confirmButtonColor: '#35baf5',
                    confirmButtonText: 'Oke',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?= base_url('buku') ?>';
                    }
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: res.message,
                    icon: 'error',
                    confirmButtonColor: '#35baf5',
                    confirmButtonText: 'Oke',
                    allowOutsideClick: false
                });
            }
        },
        error: function (xhr, status, error) {
            Swal.fire("Error", "Terjadi kesalahan saat menyimpan data.", "error");
            console.log(xhr.responseText);
        }
    });
}

function kategori() {
    $.ajax({
        url: '<?= base_url('buku/kategori'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (Array.isArray(data)) {
                $('#id_kategori').empty().append('<option value="">--Pilih Kategori--</option>');
                data.forEach(item => {
                    $('#id_kategori').append(`<option value="${item.id}" data-nama="${item.nama}">${item.nama}</option>`);
                });

                $('#id_kategori').val('<?= $row->id_kategori ?>').trigger('change');
            } else {
                console.warn('Data kategori tidak valid:', data);
            }
        },
        error: function (xhr) {
            console.error("Gagal memuat kategori:", xhr.responseText);
        }
    });
}

$(document).on('change', '#id_kategori', function () {
    const nama = $('#id_kategori option:selected').data('nama');
    $('#nama_kategori').val(nama || '');
});
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><?= $title ?></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Data</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h5 class="page-title"><?= $title ?></h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pt-3 pb-3">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <form id="form_edit" enctype="multipart/form-data">
                        <input type="hidden" name="id_buku" value="<?= $row->id_buku ?>">

                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" id="judul" class="form-control" value="<?= $row->judul ?>" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" name="pengarang" id="pengarang" class="form-control" value="<?= $row->pengarang ?>" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= $row->penerbit ?>" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-10">
                                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="<?= $row->tahun_terbit ?>" min="1900" max="2100" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option value="">--Pilih Kategori--</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="nama_kategori" id="nama_kategori" value="<?= $row->nama_kategori ?>" readonly>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"><?= $row->deskripsi ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                            <div class="col-sm-10">
                                <?php if ($row->cover): ?>
                                    <div class="mb-2">
                                        <img src="<?= base_url('assets/cover/' . $row->cover) ?>" width="100" class="img-thumbnail">
                                        <small class="text-muted d-block">Cover saat ini</small>
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="cover" id="cover" class="form-control" accept=".jpg,.jpeg,.png">
                                <small class="text-muted">Format JPG/PNG, maksimal 2MB. Kosongkan jika tidak ingin mengubah.</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 ms-auto">
                                <button type="button" class="btn btn-primary" onclick="edit(event);">
                                    <i class="fas fa-save me-2"></i> Update
                                </button>
                                <a href="<?= base_url('buku'); ?>" class="btn btn-warning">
                                    <i class="fas fa-reply me-2"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
</div>
