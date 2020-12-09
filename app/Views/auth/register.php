<?= view('themes/head') ?>
<body class="hold-transition login-page">
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
    <div class="register-logo">
        <a href="<?= base_url() ?>">
          <img width="40%" src="<?= base_url('img/LogoKelontong.png') ?>" alt="">
        </a>
      </div>
      <div class="text-center">
        <h4 class="text-success" style="font-weight: 500;"> Kelontong</h4>
        <p class="text-primary" style="font-weight: 100; margin-top: -3%;">BEST PRICE GOOD DEALS</p>
      </div>

      <p class="login-box-msg">Register a new membership</p>
      <?= view('Myth\Auth\Views\_message_block') ?>

      <form action="<?= route_to('register') ?>" method="post">
          <?= csrf_field() ?>

          <!-- First Name -->
        <div class="input-group mb-3">
          <input type="text" class="form-control <?php if(session('errors.firstname')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.firstname')?>" name="firstname" value="<?= old('firstname') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- Last Name -->
        <div class="input-group mb-3">
          <input type="text" class="form-control <?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.lastname')?>" name="lastname" value="<?= old('lastname') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- Username -->
        <div class="input-group mb-3">
          <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.username')?>" name="username" value="<?= old('username') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- Email -->
        <div class="input-group mb-3">
          <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.email')?>" name="email" value="<?= old('email') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- Password Confirm -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" name="pass_confirm" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr>

      <a href="<?= route_to('login') ?>" class="text-center"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>
<?= view('themes/footer') ?>