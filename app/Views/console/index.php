<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
        <h1>Consoles</h1>
      </div>
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('console/create') ?>" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="col-12">
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>#</b></th>
            <th><b>Console Type</b></th>
            <th><b>Gambar Type Console</b></th>
            <th><b>Serial Number</b></th>
            <th><b>Status</b></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($consoles)): ?>
            <?php foreach ($consoles as $console) : ?>
            <tr>
              <td><?= esc($console['id']) ?></td>
              <td><?= esc($console['console_type_name']) ?></td>
              <td>
                  <?php if ($console['console_types_image']): ?>
                      <img src="<?= base_url('uploads/' . esc($console['console_types_image'])) ?>" alt="<?= esc($console['console_types_image']) ?>" width="100">
                  <?php else: ?>
                      No Image
                  <?php endif; ?>
              </td>
              <td><?= esc($console['serial_number']) ?></td>
              <td><?= esc($console['status']) ?></td>
              <td>
                  <a href="<?= base_url('console/edit/' . esc($console['id'])) ?>" class="btn btn-warning">Edit</a>
                  <form action="<?= base_url('console/delete/' . esc($console['id'])) ?>" method="POST" style="display:inline;">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                  </form>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No data available</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
