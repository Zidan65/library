<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid">
    <!-- Breadcrumb & Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-flex justify-content-between align-items-center">
                <h5 class="page-title mb-0">Detail Buku</h5>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">Buku</li>
                    <li class="breadcrumb-item"><a href="<?= base_url('buku') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pt-3 pb-3">
                    <h4 class="card-title">Informasi Buku</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($row)) : ?>
                        <div class="row">
                            <!-- Cover Buku -->
                            <div class="col-md-4 text-center">
                                <div class="cover-container">
                                    <img
                                        src="<?= $row->cover && file_exists('./assets/cover/' . $row->cover) ? base_url('assets/cover/' . $row->cover) : base_url('assets/img/no-image.png') ?>"
                                        alt="Cover <?= htmlspecialchars($row->judul) ?>"
                                        class="img-fluid cover-image"
                                        title="<?= htmlspecialchars($row->judul) ?>"
                                        id="coverImage"
                                        onclick="zoomCover()"
                                    >
                                    <div class="mt-3">
                                        <button class="btn btn-sm btn-outline-primary" onclick="zoomCover()">
                                            <i class="bi bi-zoom-in me-1"></i>Perbesar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Buku -->
                            <div class="col-md-8">
                                <div class="detail-info">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Judul:</label>
                                        <div class="col-sm-9">
                                            <span class="text-primary fs-5"><?= htmlspecialchars($row->judul) ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Pengarang:</label>
                                        <div class="col-sm-9">
                                            <span><?= htmlspecialchars($row->pengarang) ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Penerbit:</label>
                                        <div class="col-sm-9">
                                            <span><?= htmlspecialchars($row->penerbit) ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Tahun Terbit:</label>
                                        <div class="col-sm-9">
                                            <span class="badge bg-secondary fs-6"><?= $row->tahun_terbit ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Kategori:</label>
                                        <div class="col-sm-9">
                                            <span class="badge bg-info fs-6"><?= $row->nama_kategori ?? 'Tidak ada kategori' ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 fw-bold">Deskripsi:</label>
                                        <div class="col-sm-9">
                                            <div class="description-box">
                                                <?= nl2br(htmlspecialchars($row->deskripsi)) ?>
                                            </div>
                                        </div>
                                    </div>

                              

                        <!-- Tombol Aksi -->
                        <div class="row mt-4">
                            <div class="col-sm-10 ms-auto text-end">
                                <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
                                    <i class="bi bi-reply me-2"></i>Kembali
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning text-center">Data buku tidak ditemukan.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STYLE -->
<style>
.cover-image {
    max-width: 100%;
    max-height: 400px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    cursor: zoom-in;
}

.cover-image:hover {
    transform: scale(1.05);
}

.detail-info {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
}

.description-box {
    background: #fff;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #17a2b8;
    min-height: 100px;
    line-height: 1.6;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

@media print {
    .btn, .breadcrumb, .page-title-box {
        display: none !important;
    }
}
</style>
<script>
function printDetail() {
    window.print();
}

function zoomCover() {
    const img = document.getElementById('coverImage');
    Swal.fire({
        imageUrl: img.src,
        imageAlt: img.alt,
        showConfirmButton: false,
        showCloseButton: true,
        width: 'auto',
        padding: '1rem',
        customClass: {
            image: 'swal-image-custom'
        }
    });
}

const style = document.createElement('style');
style.innerHTML = `
.swal2-image.swal-image-custom {
    max-width: 450px !important; /* atur ukuran maksimal (sedang) */
    width: 100%;
    height: auto;
    border-radius: 10px;
}
`;
document.head.appendChild(style);

</script>
