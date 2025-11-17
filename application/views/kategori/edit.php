<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
function edit(e) {
    e.preventDefault();
    
    $.ajax({
        url: '<?php echo base_url('kategori/edit') ?>',
        method: 'POST',
        data: $('#form_edit').serialize(),
        dataType: 'json',
        success: function (res) {
            console.log(res);
            
            if (res.status == true) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: res.message,
                    icon: "success",
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonColor: "#35baf5",
                    confirmButtonText: "Oke",
                    closeOnConfirm: false,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?php echo base_url() ?>kategori'
                    }
                })
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: res.message,
                    icon: "error",
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonColor: "#35baf5",
                    confirmButtonText: "Oke",
                    closeOnConfirm: false,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
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
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>kategori">Data</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h5 class="page-title">Kategori</h5>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pt-3 pb-3">
                    <h4 class="card-title">Edit Kategori</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="general-label">
                        <form id="form_edit">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <!-- inputan start -->
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->nama ?>" placeholder="Nama Kategori" required>
                                </div>
                            </div>
                            <!-- inputan end -->
                            <div class="row">
                                <div class="col-sm-10 ms-auto">
                                    <button type="button" onclick="edit(event);" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Update
                                    </button>
                                    <a href="<?php echo base_url(); ?>kategori">
                                        <button type="button" class="btn btn-warning">
                                            <i class="bi bi-reply me-2"></i>Kembali
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div><!-- container -->