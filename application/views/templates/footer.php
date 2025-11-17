</div>
              </div>
            </div>
          </div>
        </div>

        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">
              PerpusKu
            </div>
            <strong>
              &copy; 2025&nbsp;
              <a href="#" class="text-decoration-none">PerpusKu</a>.
            </strong>
            Semua Hak Dilindungi.
          </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
   
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
  
    <script src="<?= base_url('assets/template/dist/js/adminlte.js')?>"></script>
    
  </script>
  <script src="<?= base_url('assets/template/dist/js/adminlte.js') ?>"></script>

  <?php if (!empty($extra_js)) echo $extra_js; ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Sidebar Toggle
      const sidebarToggle = document.getElementById('sidebarToggle');
      if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
          e.preventDefault();
          document.body.classList.toggle('sidebar-collapse');
        });
      }

      // Fullscreen Toggle
      const fullscreenToggle = document.getElementById('fullscreenToggle');
      if (fullscreenToggle) {
        fullscreenToggle.addEventListener('click', function(e) {
          e.preventDefault();
          const maximizeIcon = this.querySelector('[data-lte-icon="maximize"]');
          const minimizeIcon = this.querySelector('[data-lte-icon="minimize"]');
          
          if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
            maximizeIcon.style.display = 'none';
            minimizeIcon.style.display = 'inline';
          } else {
            document.exitFullscreen();
            maximizeIcon.style.display = 'inline';
            minimizeIcon.style.display = 'none';
          }
        });
      }
    });
  </script>
    </script>
  </body>
</html>