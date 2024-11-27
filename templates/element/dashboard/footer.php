

<footer class="d-footer">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <p class="mb-0"> جميع الحقوق محفوظة  © 2024 لانستاكير.</p>
    </div>
 
  </div>
</footer>
</main>
  
  <!-- jQuery library js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/jquery-3.7.1.min.js"></script>
  <!-- Bootstrap js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/bootstrap.bundle.min.js"></script>
  <!-- Data Table js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/dataTables.min.js"></script>
  <!-- Iconify Font js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/iconify-icon.min.js"></script>
  <!-- jQuery UI js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/jquery-ui.min.js"></script>
  <!-- Vector Map js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Popup js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/magnifc-popup.min.js"></script>
  <!-- Slick Slider js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/slick.min.js"></script>
  <!-- prism js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/prism.js"></script>
  <!-- file upload js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/file-upload.js"></script>
  <!-- audioplayer -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/lib/audioplayer.js"></script>
  
  <!-- main js -->
  <script src="<?= $this->Url->build('/') ?>dashboard/assets/js/app.js"></script>

<script src="<?= $this->Url->build('/') ?>dashboard/assets/js/editor.highlighted.min.js"></script>
<script src="<?= $this->Url->build('/') ?>dashboard/assets/js/editor.quill.js"></script>
<script src="<?= $this->Url->build('/') ?>dashboard/assets/js/editor.katex.min.js"></script>


  <script>
    // Editor Js Start
    const quill = new Quill('#editor', {
      modules: {
        syntax: true,
        toolbar: '#toolbar-container',
      },
      placeholder: 'Compose an epic...',
      theme: 'snow',
    });
    // Editor Js End


  </script>

  <script>
        // =============================== Upload Single Image js start here ================================================
        const fileInput = document.getElementById("upload-file");
    const imagePreview = document.getElementById("uploaded-img__preview");
    const uploadedImgContainer = document.querySelector(".uploaded-img");
    const removeButton = document.querySelector(".uploaded-img__remove");

    fileInput.addEventListener("change", (e) => {
        if (e.target.files.length) {
        const src = URL.createObjectURL(e.target.files[0]);
        imagePreview.src = src;
        uploadedImgContainer.classList.remove('d-none');
        }
    });
    removeButton.addEventListener("click", () => {
        imagePreview.src = "";
        uploadedImgContainer.classList.add('d-none');
        fileInput.value = ""; 
    });
    // =============================== Upload Single Image js End here ================================================
  </script>
</body>
</html>