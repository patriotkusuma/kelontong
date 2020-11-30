<?php $request = \Config\Services::request();
$totalSegments = $request->uri->getTotalSegments() ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php echo view('themes/navbar') ?>
  <div class="wrapper">
    <?= view('themes/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $request->uri->getSegment(1) ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">HOME</a></li>
                <?php for ($i = 0; $i < $totalSegments; $i++) : ?>
                  <li class="breadcrumb-item active"><a href="#"><?= $request->uri->getSegment($i) ?></a></li>
                <?php endfor; ?>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main Content -->
      <section class="content">
        <div class="container-fluid">

          <?= $this->renderSection('content') ?>
        </div>
      </section>
      <!-- /.main-content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="<?= base_url() ?>">Kelontong</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->