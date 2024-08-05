<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Kelola Admin</h1>
      </div>
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('users/create') ?>" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="col-12">
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>#</b></th>
            <th><b>Name</b></th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= esc($user['id']) ?></td> <!-- Assuming there's an ID field -->
              <td><?= esc($user['username']) ?></td>
              <td><?= esc($user['email']) ?></td>
              <td>
                  <a href="<?= base_url('users/edit/'.$user['id']) ?>" class="btn btn-warning">Edit</a>
                  <!-- Form untuk Delete -->
                  <form action="<?= base_url('users/delete/'.$user['id']) ?>" method="POST" style="display:inline;">
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
