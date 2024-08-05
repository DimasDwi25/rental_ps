<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Jenis Console</h1>
      </div>
    </div>
    <div class="col-md-12">
        <form class="card" action="<?= site_url('console-type/store', ) ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body p-3">
                <div class="row row-cards">
                    <div class="mb-3">
                        <label class="form-label required">Nama Model Console</label>
                        <input type="text" id="model" name="model"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter model..." required>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['model'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Description</label>
                        <textarea type="" id="description" name="description"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter description..." required>
                            </textarea>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['description'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Image</label>
                        <input type="file" id="image" name="image"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter image..." required>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['image'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">harga per/jam</label>
                        <input type="number" id="price" name="price"
                            class="form-control <?= session()->getFlashdata('errors') ? 'is-invalid' : '' ?>"
                            placeholder="Enter price..." required>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="invalid-feedback"><?= session()->getFlashdata('errors')['price'] ?></div>
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


