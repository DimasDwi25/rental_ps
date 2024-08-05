<section class="section">
  <div class="row">
    <div class="col-12">
      <div class="pagetitle kanan_sedikit">
          <h1>Edit Console Type</h1>
      </div>
      <div class="col-md-12">
        <form class="card" action="<?= base_url('console-type/update/' . esc($consoleTypes['id'])) ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="mb-3">
                    <label for="model" class="form-label required">Model:</label>
                    <input type="text" id="model" name="model" class="form-control" value="<?= esc($consoleTypes['model']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control"><?= esc($consoleTypes['description']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <?php if ($consoleTypes['image']): ?>
                        <img src="<?= base_url('uploads/' . esc($consoleTypes['image'])) ?>" alt="<?= esc($consoleTypes['model']) ?>" width="100">
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label required">price:</label>
                    <input type="number" id="price" name="price" class="form-control" value="<?= esc($consoleTypes['price']) ?>" required>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
