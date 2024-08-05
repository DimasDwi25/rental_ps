<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Kelola Admin</h1>
      </div>
    </div>
    <div class="col-md-12">
        <form class="card" action="<?= site_url('users/store', ) ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body p-3">
                <div class="row row-cards">
                    <div class="mb-3">
                        <label class="form-label required">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter username..." required>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['username'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter email..." required />
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter password..." required>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['password'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</section>


