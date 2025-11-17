<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    :root {
      --primary: #0d9488;
      --primary-light: #ccfbf1;
      --primary-dark: #115e59;
      --accent: #f97316;
      --accent-light: #fed7aa;
      --text: #1e293b;
      --light-bg: #f0fdfa;
      --success: #10b981;
      --warning: #f59e0b;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--light-bg);
      padding-top: 70px;
      color: var(--text);
    }

    .navbar {
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      background: white;
    }

    .navbar-brand {
      color: var(--primary) !important;
      font-weight: 700;
    }

    .btn-primary {
      background: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    .hero {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 80px 20px;
      text-align: center;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
    }

    .hero h1 {
      font-size: 2.8rem;
      font-weight: 800;
    }

    .search-section {
      margin-top: -40px;
      position: relative;
      z-index: 10;
    }

    .search-box {
      background: white;
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 6px 20px rgba(13, 148, 136, 0.2);
      border: 1px solid rgba(13, 148, 136, 0.15);
    }

    .stats-section {
      padding: 60px 20px;
      background: white;
    }

    .stat-card {
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      background: var(--primary-light);
      transition: all 0.3s ease;
      border: 1px solid rgba(13, 148, 136, 0.1);
    }

    .stat-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(13, 148, 136, 0.15);
    }

    .stat-card i {
      color: var(--primary);
    }

    .stat-card.success {
      background: #d1fae5;
    }

    .stat-card.success i {
      color: var(--success);
    }

    .stat-card.warning {
      background: var(--accent-light);
    }

    .stat-card.warning i {
      color: var(--accent);
    }

    .books-section {
      padding: 60px 20px;
      background-color: var(--light-bg);
    }

    .book-card {
      border: none;
      border-radius: 16px;
      overflow: hidden;
      height: 100%;
      background: white;
      transition: all 0.35s ease;
    }

    .book-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(13, 148, 136, 0.25) !important;
    }

    .status-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .status-tersedia {
      background: var(--success);
      color: white;
    }

    .status-dipinjam {
      background: var(--accent);
      color: white;
    }

    .footer {
      background: linear-gradient(to right, var(--primary), var(--primary-dark));
      color: white;
      padding: 28px 0;
      text-align: center;
    }

    .footer-container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .footer-text {
      margin-bottom: 12px;
      opacity: 0.95;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 24px;
    }

    .social-icons a img {
      width: 32px;
      height: 32px;
      transition: transform 0.3s ease;
    }

    .social-icons a:hover img {
      transform: scale(1.2);
    }

    .loading {
      text-align: center;
      padding: 50px;
      color: var(--primary);
    }

    .modal-header {
      background: linear-gradient(to right, var(--primary), var(--accent)) !important;
    }

    .book-detail-btn {
      background: var(--primary);
    }

    .book-detail-btn:hover {
      background: var(--primary-dark) !important;
    }

    .category-tag {
      color: var(--accent) !important;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.2rem;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="<?= base_url('assets/img/logobuku.jpg'); ?>" alt="Logo" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
      PerpusKu
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#koleksi">Koleksi</a></li>
        <li class="nav-item"><a class="nav-link" href="#statistik">Statistik</a></li>
        <li class="nav-item">
          <a class="btn btn-primary ms-2" href="<?= base_url('auth/login') ?>">
            Login Admin
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <h1>Selamat Datang di PerpusKu</h1>
    <p class="lead mt-3">Temukan dan pinjam ribuan koleksi buku favorit Anda secara online</p>
  </div>
</section>

<!-- Search -->
<section class="search-section">
  <div class="container">
    <div class="search-box">
      <div class="row g-3 align-items-center">
        <div class="col-md-8">
          <input type="text" id="searchInput" class="form-control" placeholder="Cari judul buku atau pengarang...">
        </div>
        <div class="col-md-3">
          <select id="categoryFilter" class="form-select">
            <option value="">Semua Kategori</option>
            <?php foreach($kategori as $k): ?>
              <option value="<?= $k->id ?>"><?= $k->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-1 text-end">
          <button class="btn btn-primary w-100" onclick="searchBooks()">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Statistik -->
<section id="statistik" class="stats-section">
  <div class="container">
    <h2 class="mb-5 text-center fw-bold" style="color: var(--primary-dark); font-size: 2.2rem;">
      <i class="fas fa-chart-bar me-2"></i>Statistik Perpustakaan
    </h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="stat-card">
          <i class="fas fa-book fa-2x mb-3"></i>
          <h3 class="stat-number" data-count="<?= $total_buku ?>">0</h3>
          <p>Total Buku</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card success">
          <i class="fas fa-check-circle fa-2x mb-3"></i>
          <h3 class="stat-number" data-count="<?= $buku_tersedia ?>">0</h3>
          <p>Buku Tersedia</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card warning">
          <i class="fas fa-hand-holding fa-2x mb-3"></i>
          <h3 class="stat-number" data-count="<?= $buku_dipinjam ?>">0</h3>
          <p>Sedang Dipinjam</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="stat-card">
          <i class="fas fa-layer-group fa-2x mb-3"></i>
          <h3 class="stat-number" data-count="<?= $total_kategori ?>">0</h3>
          <p>Kategori</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="stat-card">
          <i class="fas fa-exchange-alt fa-2x mb-3"></i>
          <h3 class="stat-number" data-count="<?= $total_peminjaman ?>">0</h3>
          <p>Total Peminjaman</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Koleksi -->
<section id="koleksi" class="books-section">
  <div class="container">
    <h2 class="mb-5 text-center fw-bold" style="color: var(--primary-dark); font-size: 2.2rem;">
      <i class="fas fa-book-open me-2"></i>Koleksi Buku
    </h2>
    <div class="row" id="bookList">
      <div class="col-12 text-center py-5">
        <div class="loading">
          <i class="fas fa-spinner fa-spin fa-2x"></i>
          <p class="mt-3 text-muted">Memuat data buku...</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <p class="footer-text">&copy; 2025 PerpusKu. Semua Hak Dilindungi.</p>
    <div class="social-icons">
      <a href="https://wa.me/6281234567890" target="_blank" aria-label="WhatsApp">
        <img src="https://img.icons8.com/ios-filled/30/ffffff/whatsapp.png" alt="WhatsApp">
      </a>
      <a href="https://instagram.com/perpustakaan_digital" target="_blank" aria-label="Instagram">
        <img src="https://img.icons8.com/ios-filled/30/ffffff/instagram-new.png" alt="Instagram">
      </a>
    </div>
  </div>
</footer>

<!-- Modal Buku -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);">
      <div class="modal-header" style="background: linear-gradient(to right, var(--primary), var(--accent)); color: white;">
        <h5 class="modal-title"><i class="fas fa-book-open me-2"></i>Detail Buku</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="bookDetail">
        <div class="text-center py-4">
          <i class="fas fa-spinner fa-spin fa-2x" style="color: var(--primary);"></i>
          <p class="mt-2">Memuat detail buku...</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  let allBooks = [];

  function displayBooks(books) {
    const bookList = document.getElementById("bookList");
    bookList.innerHTML = "";
    
    if (books.length === 0) {
      bookList.innerHTML = `
        <div class="col-12">
          <div class="text-center py-5">
            <i class="fas fa-book fa-3x text-muted mb-3"></i>
            <p class="text-muted">Tidak ada buku ditemukan</p>
          </div>
        </div>`;
      return;
    }
    
    books.forEach(book => {
      const coverUrl = book.cover 
        ? `<?= base_url('assets/cover/') ?>${book.cover}` 
        : 'https://via.placeholder.com/200x300/2563eb/ffffff?text=No+Image';
      
      const status = book.status || 'tersedia';
      const statusClass = status === 'tersedia' ? 'status-tersedia' : 'status-dipinjam';
      const statusText = status === 'tersedia' ? 'Tersedia' : 'Dipinjam';
      const statusIcon = status === 'tersedia' ? 'fa-check-circle' : 'fa-clock';
      
      bookList.innerHTML += `
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card book-card h-100">
            <div class="position-relative">
              <img src="${coverUrl}" class="card-img-top" alt="${book.judul}" 
                  onerror="this.src='https://via.placeholder.com/200x300/2563eb/ffffff?text=No+Image'"
                  style="height: 260px; object-fit: cover;">
              <div class="status-badge ${statusClass}">
                <i class="fas ${statusIcon} me-1"></i>${statusText}
              </div>
              <div class="position-absolute top-0 end-0 bg-white px-2 py-1 rounded-start shadow-sm"
                  style="font-size: 0.75rem; color: var(--primary);">
                <i class="fas fa-tag me-1"></i> ${book.nama_kategori || 'Umum'}
              </div>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <h6 class="card-title fw-bold mb-2" style="font-size: 1.1rem;">${book.judul}</h6>
              <p class="text-muted small mb-1"><i class="fas fa-user me-1"></i> ${book.pengarang}</p>
              <p class="text-muted small mb-2"><i class="fas fa-calendar me-1"></i> ${book.tahun_terbit}</p>
              <div class="mt-auto text-center">
                <button class="btn btn-sm w-100 fw-medium text-white"
                        style="background: var(--primary);"
                        onmouseover="this.style.background='#0d9488'"
                        onmouseout="this.style.background='#0d9488'"
                        onclick="viewBook(${book.id_buku})">
                  <i class="fas fa-eye me-1"></i> Lihat Detail
                </button>
              </div>
            </div>
          </div>
        </div>`;
    });
  }

  function searchBooks() {
    const keyword = document.getElementById("searchInput").value.toLowerCase();
    const category = document.getElementById("categoryFilter").value;
    
    const filtered = allBooks.filter(book => {
      const matchTitle = book.judul.toLowerCase().includes(keyword) || 
                        book.pengarang.toLowerCase().includes(keyword);
      const matchCategory = category ? book.id_kategori == category : true;
      return matchTitle && matchCategory;
    });
    
    displayBooks(filtered);
  }

  function viewBook(id) {
    const modal = new bootstrap.Modal(document.getElementById("bookModal"));
    modal.show();
    
    fetch(`<?= base_url('home/get_book_detail/') ?>${id}`)
      .then(response => response.json())
      .then(book => {
        if (book) {
          const coverUrl = book.cover 
            ? `<?= base_url('assets/cover/') ?>${book.cover}` 
            : 'https://via.placeholder.com/300x400/2563eb/ffffff?text=No+Image';
          
          const status = book.status || 'tersedia';
          const statusClass = status === 'tersedia' ? 'badge bg-success' : 'badge bg-warning';
          const statusText = status === 'tersedia' ? 'Tersedia' : 'Dipinjam';
          const statusIcon = status === 'tersedia' ? 'fa-check-circle' : 'fa-clock';
          
          const detailHTML = `
            <div class="row">
              <div class="col-md-5 text-center mb-4 mb-md-0">
                <img src="${coverUrl}" class="img-fluid rounded-4 shadow" alt="${book.judul}"
                    onerror="this.src='https://via.placeholder.com/300x400/2563eb/ffffff?text=No+Image'"
                    style="max-height: 420px; object-fit: cover; border: 1px solid #eee;">
                <div class="mt-3">
                  <span class="${statusClass} fs-6 px-3 py-2">
                    <i class="fas ${statusIcon} me-1"></i>${statusText}
                  </span>
                </div>
              </div>
              <div class="col-md-7">
                <h4 class="mb-3 fw-bold" style="color: var(--primary-dark);">${book.judul}</h4>
                <table class="table table-borderless">
                  <tr><td style="width: 30%;"><strong>Pengarang:</strong></td><td>${book.pengarang}</td></tr>
                  <tr><td><strong>Penerbit:</strong></td><td>${book.penerbit || '-'}</td></tr>
                  <tr><td><strong>Tahun Terbit:</strong></td><td>${book.tahun_terbit}</td></tr>
                  <tr><td><strong>Kategori:</strong></td><td>${book.nama_kategori || 'Tidak ada kategori'}</td></tr>
                  <tr><td><strong>Status:</strong></td><td><span class="${statusClass}"><i class="fas ${statusIcon} me-1"></i>${statusText}</span></td></tr>
                </table>
                ${book.deskripsi ? `<div class="mt-3"><strong>Deskripsi:</strong><p class="mt-2 text-muted">${book.deskripsi}</p></div>` : ''}
              </div>
            </div>`;
          
          document.getElementById("bookDetail").innerHTML = detailHTML;
        }
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById("bookDetail").innerHTML = 
          '<p class="text-center text-danger py-4">Gagal memuat detail buku</p>';
      });
  }

  function loadBooks() {
    fetch('<?= base_url('home/get_books') ?>')
      .then(response => response.json())
      .then(books => {
        allBooks = books;
        displayBooks(books);
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById("bookList").innerHTML = 
          '<div class="col-12"><p class="text-center text-danger py-5">Gagal memuat data buku</p></div>';
      });
  }

  function animateCounters() {
    $('.stat-number').each(function() {
      const $this = $(this);
      const countTo = parseInt($this.data('count'));
      $({ countNum: 0 }).animate(
        { countNum: countTo },
        {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(countTo);
          }
        }
      );
    });
  }

  let animationTriggered = false;
  $(window).on('scroll', function() {
    if (!animationTriggered) {
      const statsTop = $('.stats-section').offset().top - window.innerHeight + 100;
      if ($(window).scrollTop() > statsTop) {
        animateCounters();
        animationTriggered = true;
      }
    }
  });

  document.getElementById("searchInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") searchBooks();
  });

  document.getElementById("categoryFilter").addEventListener("change", searchBooks);
  document.getElementById("searchInput").addEventListener("input", function() {
    clearTimeout(window.searchTimeout);
    window.searchTimeout = setTimeout(searchBooks, 300);
  });

  document.addEventListener("DOMContentLoaded", function() {
    loadBooks();
    setTimeout(() => {
      const statsTop = $('.stats-section').offset().top - window.innerHeight + 100;
      if ($(window).scrollTop() > statsTop) {
        animateCounters();
        animationTriggered = true;
      }
    }, 1000);
  });
</script>

</body>
</html>