<div id="auth">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12 mx-auto">
        <div class="card pt-4">
          <div class="card-body">
            <div class="text-center mb-5">
              <img src="<?= base_url('assets'); ?>/images/Logo-kemensos.png" class="w-25 h-25 mb-3" alt="" srcset="" />
              <h3>Log In</h3>
              <p>Please sign in to continue.</p>
              <?= $this->session->flashdata('pesan'); ?>
            </div>
            <form action="<?= base_url('auth'); ?>" method="POST">
              <div class="form-group position-relative has-icon-left">
                <label for="username">Username</label>
                <div class="position-relative">
                  <input type="text" class="form-control" id="username" name="username" />
                  <div class="form-control-icon">
                    <i data-feather="user"></i>
                  </div>
                </div>
                <?= form_error('username', '<span class="text-danger text-sm">', '</span>'); ?>
              </div>
              <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                  <label for="password">Password</label>
                </div>
                <div class="position-relative">
                  <input type="password" class="form-control" id="password" name="password" />
                  <div class="form-control-icon">
                    <i data-feather="lock"></i>
                  </div>
                </div>
                <?= form_error('password', '<span class="text-danger text-sm">', '</span>'); ?>
              </div>

              <div class="clearfix">
                <button class="btn btn-primary float-right" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>