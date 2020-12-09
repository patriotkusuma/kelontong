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

      <p class="login-box-msg">Sign in to start your session</p>

      <?= view('Myth\Auth\Views\_message_block') ?>
      <form action="<?= route_to('login') ?>" method="post">
        <?= csrf_field() ?>

        <?php if ($config->validFields === ['email']): ?>
          <!-- Email -->
          <div class="input-group mb-3">
          <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php else: ?>
          <!-- Email or Username -->
          <div class="input-group mb-3">
          <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      <?php endif; ?>


        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <?php if ($config->allowRemembering): ?>
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?php if(old('remember')) : ?> checked <?php endif ?>>
              <label for="remember">
                <?=lang('Auth.rememberMe')?>
              </label>
            </div>
          </div>
          <?php endif; ?>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      


        <hr>
        <?php if ($config->activeResetter): ?>

      <p class="mb-1">
        <a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a>
      </p>
<?php endif; ?>

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