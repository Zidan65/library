<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url("<?= base_url('assets/foto/perpus.jpg') ?>") no-repeat center center fixed;
      background-size: cover;
    }

        .login-card {
      width: 380px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      padding: 40px 30px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.25);
      color: #fff;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }


    .login-card h4 {
      font-weight: bold;
      color: #fff;
      margin-bottom: 25px;
      text-align: center;
    }

    .form-control {
      border-radius: 12px;
    }

    .input-group-text {
      border-radius: 12px 0 0 12px;
    }

    .btn-custom {
      border-radius: 12px;
      font-weight: bold;
      letter-spacing: 1px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      transform: translateY(-2px);
    }

    .login-icon {
      font-size: 65px;
      color: #fff;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="login-card text-white">
    <div class="text-center">
      <i class="fa fa-book-open login-icon"></i>
    </div>
    <h4>Login Admin</h4>
    <form id="form-login">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text bg-success text-white"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text bg-success text-white"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
        </div>
      </div>
      <button type="submit" class="btn btn-success btn-custom w-100">
        <i class="fa fa-sign-in-alt"></i> Login
      </button>
    </form>
  </div>

<script>
$('#form-login').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '<?= base_url("auth/proses_login") ?>',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function(res) {
      if(res.success){
        Swal.fire({
          icon: 'success',
          title: res.message,
          showConfirmButton: false,
          timer: 1500
        }).then(()=>{
          window.location.href = res.redirect;
        });
      } else {
        Swal.fire('Gagal', res.message, 'error');
      }
    },
    error: function() {
      Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
    }
  });
});
</script>
</body>
</html>
