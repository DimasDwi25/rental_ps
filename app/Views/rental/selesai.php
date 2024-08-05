<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Transaksi</h1>
      </div>
    </div>
    <div class="col-12">
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>#</b></th>
            <th><b>Jenis Console</b></th>
            <th><b>Console</b></th>
            <th><b>Nama Pelanggan</b></th>
            <th><b>Email</b></th>
            <th><b>No. Telepon</b></th>
            <th><b>Alamat</b></th>
            <th><b>Tanggal Sewa</b></th>
            <th><b>Tanggal Kembali</b></th>
            <th><b>Total Harga</b></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($rentals)): ?>
            <?php foreach ($rentals as $rental): ?>
            <tr>
              <td><?= esc($rental['id']) ?></td>
              <td><?= esc($rental['console_type_name']) ?></td>
              <td><?= esc($rental['console_name']) ?></td>
              <td><?= esc($rental['customer_name']) ?></td>
              <td><?= esc($rental['email']) ?></td>
              <td><?= esc($rental['no_telp']) ?></td>
              <td><?= esc($rental['alamat']) ?></td>
              <td><?= esc($rental['rental_date']) ?></td>
              <td><?= esc($rental['return_date']) ?></td>
              <td>Rp. <?= number_format(esc($rental['total_price']), 0, ',', '.') ?></td>
              <td>
                <a href="" class="btn btn-primary">Detail</a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="10">Tidak ada data tersedia</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
