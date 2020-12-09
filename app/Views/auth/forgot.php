<?= view('themes/head') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a href="<?= base_url() ?>">
          <img width="40%" src="<?= base_url('img/LogoKelontong.png') ?>" alt="">
        </a>
      </div>
      <div class="text-center">
        <h4 class="text-success" style="font-weight: 500;"> Kelontong</h4>
        <p class="text-primary" style="font-weight: 100; margin-top: -3%;">BEST PRICE GOOD DEALS</p>
      </div>
      <p class="login-box-msg"><?=lang('Auth.enterEmailForInstructions')?></p>

      <form action="<?= route_to('forgot') ?>" method="post">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.email')?>" name="email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.sendInstructions')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= route_to('login') ?>"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
      </p>
<?php if ($config->allowRegistration) : ?>

      <p class="mb-0">
        <a href="<?= route_to('register') ?>" class="text-center"><?=lang('Auth.needAnAccount')?></a>
      </p>
<?php endif; ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>
<?= view('themes/footer') ?>