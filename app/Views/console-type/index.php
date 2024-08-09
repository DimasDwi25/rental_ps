<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Jenis Console</h1>
      </div>
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('console-type/create') ?>" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="col-12">
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>#</b></th>
            <th><b>Nama model console</b></th>
            <th>Description</th>
            <th>Gambar</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($consoleTypes)): ?>
            <?php foreach ($consoleTypes as $items) : ?>
            <tr>
              <td><?= esc($items['id']) ?></td> <!-- Assuming there's an ID field -->
              <td><?= esc($items['model']) ?></td>
              <td><?= esc($items['description']) ?></td>
              <td>
                  <?php if ($items['image']): ?>
                      <img src="<?= base_url('uploads/' . esc($items['image'])) ?>" alt="<?= esc($items['model']) ?>" width="100">
                  <?php else: ?>
                      No image
                  <?php endif; ?>
              </td>
              <td>Rp. <?= number_format(esc($items['price']), 0, ',', '.') ?></td>
              <td>
                  <a href="<?= base_url('console-type/edit/' . esc($items['id'])) ?>" class="btn btn-warning">Edit</a>
                  <!-- Form untuk Delete -->
                  <form action="<?= base_url('console-type/delete/' . esc($items['id'])) ?>" method="POST" style="display:inline;">
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
