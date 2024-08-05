<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Data Peminjaman</h1>
      </div>
    </div>
    <div class="col-md-12">
        <form action="<?= base_url('/rentals/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="customer_name" class="form-label required">Customer Name:</label>
                <input class="form-control" type="text" name="customer_name" id="customer_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label required" for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label required" for="no_telp">Phone Number:</label>
                <input class="form-control" type="text" name="no_telp" id="no_telp" required>
            </div>
            <div class="mb-3">
                <label class="form-label required" for="alamat">Address:</label>
                <textarea class="form-control" name="alamat" id="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label required" for="rental_date">Tanggal Peminjaman:</label>
                <input class="form-control" type="date" name="rental_date" id="rental_date" required>
            </div>
            <div class="mb-3">
                <label class="form-label required" for="return_date">Tanggal Pengembalian:</label>
                <input class="form-control" type="date" name="return_date" id="return_date" required>
            </div>
            <div id="console-items" class="mb-3">
                <div>
                    <label class="form-label required" for="console_id">Console:</label>
                    <select class="form-control" name="console_id[]" id="console_id" required>
                        <?php foreach ($consoles as $console): ?>
                            <option value="<?= esc($console['id']) ?>"> <?= esc($console['console_type_name']) ?> - <?= esc($console['serial_number']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
  </div>
</section>

