<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle ms-5">
        <h1>Selamat datang, <?= session()->get('username'); ?>,</br> Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Jumlah Barang Dipinjam</h4>
                    <div class="h5 mb-0"><?= esc($countRentals) ?></div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Jumlah pendapatan</h4>
                    <div class="h5 mb-0">Rp. <?= number_format(esc($totalCost), 0, ',', '.') ?></div>
                </div>
            </div>
        </div>

      
        <div class="col-sm-6 col-lg-3">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Jumlah Konsol Berdasarkan Tipe</h4>
                  <ul class="list-group">
                      <?php foreach ($consolesByType as $type): ?>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <?= esc($type['console_type_name']) ?>
                              <span class="badge bg-primary rounded-pill"><?= esc($type['total']) ?></span>
                          </li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">5 Data Rental Terakhir (Selesai)</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                              <th>ID Rental</th>
                              <th>Nama Konsol</th>
                              <th>Tipe Konsol</th>
                              <th>Nama Pelanggan</th>
                              <th>Tanggal Rental</th>
                              <th>Tanggal Kembali</th>
                              <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($recentCompletedRentals as $rental): ?>
                            <tr>
                              <td><?= esc($rental['id']) ?></td>
                              <td><?= esc($rental['console_name']) ?></td>
                              <td><?= esc($rental['console_type_name']) ?></td>
                              <td><?= esc($rental['customer_name']) ?></td>
                              <td><?= esc($rental['rental_date']) ?></td>
                              <td><?= esc($rental['return_date']) ?></td>
                              <td>Rp. <?= number_format(esc($rental['total_price']), 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</section>

