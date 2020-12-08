<?= view('themes/head') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?=lang('Auth.resetYourPassword')?></p>
      <?= view('Myth\Auth\Views\_message_block') ?>


      <form action="<?= route_to('reset-password') ?>" method="post">
        <?= csrf_field() ?>
        <!-- Token -->
        <div class="input-group mb-3">
          <input type="text" class="form-control <?php if(session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.newPassword') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- Password Confirm -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.newPasswordRepeat') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.resetPassword')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= base_url('login') ?>"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>
<?= view('themes/footer') ?>