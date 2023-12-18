
<?php
    define('BASE_URL', 'http://localhost/trabajo_integrador_cac');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php if($currentPage == "index.php"){?>
    <title>Proyecto Integrador Front | Erik Medina</title>
  <?php }
    else if($currentPage == "tickets.php"){?>
    <title>Comprar Tickets</title>
  <?php }?>
  
  <link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/icons/favicon.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/css/style.css">
  <?php if($currentPage == "admin-list.php" || $currentPage == "list.php"){?>
    <link rel='stylesheet' href='<?php echo BASE_URL;?>/css/list.css'>
  <?php }?>
  <?php if($currentPage == "tickets.php"){?>
    <link rel='stylesheet' href='<?php echo BASE_URL;?>/css/tickets.css'>
  <?php }?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="<?php echo BASE_URL;?>/js/script.js" defer></script>
  <?php if($currentPage == "tickets.php"){?>
    <script src='<?php echo BASE_URL;?>/js/tickets.js' defer></script>
  <?php }?>
  <?php if($currentPage == "index.php" || $currentPage == "edit.php"){?>
    <script src="<?php echo BASE_URL;?>/js/form.js" defer></script>
  <?php }?>
  <?php if($currentPage == "login.php"){?>
    <script src='<?php echo BASE_URL;?>/js/login.js' defer></script>
  <?php }?>
  <?php if($currentPage == "register.php"){?>
    <script src='<?php echo BASE_URL;?>/js/register.js' defer></script>
  <?php }?>
  
</head>
<body>