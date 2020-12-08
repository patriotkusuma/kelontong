<?= $this->section('custom_css') ?>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

<?= $this->endSection() ?>
<?= view('themes/head') ?>
<?= $this->section('content') ?>
User
<?= $this->endSection() ?>
<?= view('themes/footer') ?>