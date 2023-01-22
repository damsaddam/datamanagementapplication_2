<?php include_once('../_header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
   <style>
      body {
         font-family: 'Nunito Sans', sans-serif;
      }

      .brand {
         font-family: 'Montserrat', sans-serif;
         font-weight: bolder;
         letter-spacing: 1px;
         margin: 0;
         padding: 0;
      }

      .fullscreen {
         width: 25px;
         padding: 0;
         margin: 0 0 8px 0;
         transition: transform 0.5s;
      }

      .fullscreen:hover {
         transform: scale(1.3);
      }

      .fullscreen i {
         font-size: 25px;
         font-weight: bold;
         color: rgb(55, 0, 255);
      }

      p {
         font-size: 16px;
         text-align: justify;
         margin-top: 30px;
      }
   </style>

</head>

<body>
   <div class="wrapper">
      <div class="container-fluid">
         <div class="header row">
            <div class="col-lg-12">
               <div class="fullscreen">
                  <a href="#menu-toggle" id="menu-toggle"><i class="bi bi-fullscreen"></i></a>
               </div>
               <h2 class="brand">MENU HOME</h2>
            </div>
         </div>
         <div class="content row">
            <div class="col-lg-12">
               <p>Selamat Datang <b><mark><?= $_SESSION['user']; ?></mark></b> di Aplikasi SDN Kalibaru 09. Bila sudah selesai menggunakan aplikasi, dimohon <b style="color: red;">logout</b> terlebih dahulu, untuk menghindari pihak yang tidak bertanggung jawab mengakses aplikasi ini. Terimakasih. Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa dignissimos iure voluptatum illum. Beatae consequuntur libero dolorem explicabo rem, quisquam non delectus modi, fugit quod ut officia aspernatur nostrum sit quae et voluptates dicta culpa quas labore maxime hic aliquid!</p>
            </div>
         </div>
      </div>
   </div>
</body>

<script src="<?= base_url('_assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>

<!-- Menu Toggle Script -->
<script>
   $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
   });
</script>

</html>
<?php include_once('../_footer.php'); ?>