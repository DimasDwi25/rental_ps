<section class="section">
  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url('console/store') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <label for="console_type_id" class="form-label required">Console Type:</label>
              <select name="console_type_id" id="console_type_id" class="form-control">
                <?php foreach ($consoleTypes as $type): ?>
                    <option value="<?= esc($type['id']) ?>"><?= esc($type['model']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label required">Serial Number:</label>
              <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Enter Serial Number..." required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <?php foreach ($statusOptions as $key => $label): ?>
                        <option value="<?= esc($key) ?>"><?= esc($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          </div>
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
