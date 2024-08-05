<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rental PlayStation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">

  <style>
    .entries-per-page,
    .add-members-btn {
      display: inline-block;
      margin-right: 20px;
    }

    .entries-per-page select {
      width: auto;
      display: inline-block;
    }
  </style>

</head>

<body>

<?= $this->include('components/header'); ?>
  
<?= $this->include('components/sidebar'); ?>

  <main id="main" class="main">
    <!-- End Page Title -->
    
    <?php echo $content; ?>
  </main>
  <!-- End #main -->

  <?= $this->include('components/footer'); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('vendor/apexcharts/apexcharts.min.js'); ?> "></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?> "></script>
  <script src="<?php echo base_url('vendor/chart.js/chart.umd.js'); ?> "></script>
  <script src="<?php echo base_url('vendor/echarts/echarts.min.js'); ?> "></script>
  <script src="<?php echo base_url('vendor/quill/quill.js'); ?> "></script>
  <script src="<?php echo base_url('vendor/tinymce/tinymce.min.js'); ?> "></script>
  <script src="<?php echo base_url('vendor/php-email-form/validate.js'); ?> "></script>
  <!-- <script src="<?php echo base_url('vendor/simple-datatables/simple-datatables.js'); ?> "></script> -->

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('js/main.js'); ?> "></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize Simple-DataTables
      var dataTable = new simpleDatatables.DataTable('.datatable', {
        perPageSelect: [5, 10, 15, 20],
        perPage: 5
      });

      // Change per page event
      document.querySelector('select[name="entries-per-page"]').addEventListener('change', function () {
        dataTable.update({
          perPage: parseInt(this.value)
        });
      });
    });
  </script>

</body>

</html>
