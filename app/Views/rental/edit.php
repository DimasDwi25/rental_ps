<section class="section">
  <div class="row">
    <div class="col-12 mb-2">
      <div class="pagetitle kanan_sedikit">
          <h1>Peminjaman</h1>
      </div>
    </div>
    <div class="col-md-12">
        <form action="<?= base_url('/rentals/update/' . $rental['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label for="customer_name">Customer Name:</label>
                <input type="text" name="customer_name" id="customer_name" value="<?= esc($rental['customer_name']) ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= esc($rental['email']) ?>" required>
            </div>
            <div>
                <label for="no_telp">Phone Number:</label>
                <input type="text" name="no_telp" id="no_telp" value="<?= esc($rental['no_telp']) ?>" required>
            </div>
            <div>
                <label for="alamat">Address:</label>
                <textarea name="alamat" id="alamat" required><?= esc($rental['alamat']) ?></textarea>
            </div>
            <div>
                <label for="rental_date">Rental Date:</label>
                <input type="datetime-local" name="rental_date" id="rental_date" value="<?= esc($rental['rental_date']) ?>" required>
            </div>
            <div>
                <label for="return_date">Return Date:</label>
                <input type="datetime-local" name="return_date" id="return_date" value="<?= esc($rental['return_date']) ?>">
            </div>
            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="Pending" <?= $rental['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Completed" <?= $rental['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="Canceled" <?= $rental['status'] == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                </select>
            </div>
            <div id="console-items">
                <?php foreach ($rental_items as $item): ?>
                    <div>
                        <label for="console_ids">Console:</label>
                        <select name="console_ids[]" id="console_ids" required>
                            <?php foreach ($consoles as $console): ?>
                                <option value="<?= esc($console['id']) ?>" <?= $console['id'] == $item['console_id'] ? 'selected' : '' ?>>
                                    <?= esc($console['serial_number']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="rental_prices">Rental Price:</label>
                        <input type="number" name="rental_prices[]" id="rental_prices" value="<?= esc($item['rental_price']) ?>" step="0.01" required>
                        <input type="hidden" name="rental_item_ids[]" value="<?= esc($item['id']) ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
  </div>
</section>

