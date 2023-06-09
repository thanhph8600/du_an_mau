<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="//www.freepnglogos.com/uploads/php-logo-png/php-logo-php-elephant-logo-vectors-download-5.png">

    <title>X-shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>



    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/header.css">
    <script src="<?= $CONTENT_URL ?>/js/login.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/addcart.js"></script>
    <!-- <script src="<?= $CONTENT_URL ?>/js/js/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="<?= $CONTENT_URL ?>/js/js/bootstrap.min.js"></script> -->
    <script src="<?= $CONTENT_URL ?>/js/validation.js"></script>

    <!-- carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.green.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
</head>

<body>


    <?php
    include '../layout/menu.php';

    require $VIEW_NAME;

    !empty($TOP10) ? include $TOP10 : '';

    include '../layout/footer.php';
    ?>
</body>
