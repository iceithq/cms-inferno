<head>
  <base href="<?php echo base_url(); ?>">
  <title>
    <?php echo config_item('project_name'); ?>
    <?php echo app_version(); ?>
  </title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom -->
  <link rel="stylesheet" href="themes/default/css/style.css">

  <?php load_view('_fonts'); ?>

</head>