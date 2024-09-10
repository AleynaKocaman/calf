<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== REMIXICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/sidebar.css">
   <!--=============== BOS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Highcharts kütüphanesi -->
   <script src="https://code.highcharts.com/highcharts.js"></script>

   <title>Buzağı Kilo</title>
</head>

<body>
   <?php require_once "database.php"; ?>
   <!--=============== HEADER ===============-->
   <header class="header">
      <nav class="nav container">
         <div class="nav__data">
            <a href="#" class="nav__logo">
               <p style="font-size: 25px; color:white;margin-top: 20px;text-decoration: none;">HAYTART</p>
            </a>

            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-line nav__burger"></i>
               <i class="ri-close-line nav__close"></i>
            </div>
         </div>

         <!--=============== NAV MENU ===============-->
         <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
               <li><a href="index.php" class="nav__link" style="text-decoration: none;">Ana Sayfa</a></li>

               <li><a href="addcalf.php" class="nav__link" style="text-decoration: none;">Buzağı Ekle</a></li>


               <!--=============== DROPDOWN 1 ===============-->
               <li class="dropdown__item" style=" top:0; position: sticky; z-index:1;">
                  <div class="nav__link">
                     <a href="calfkg.php" style="text-decoration: none;color:white;"> Buzağı Kilo Durum Raporu</a>
                  </div>
               </li>


               <!--=============== DROPDOWN 2 ===============-->
               <!-- <li class="dropdown__item">
                  <div class="nav__link">
                     Kullanıcı <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                  </div>

                  <ul class="dropdown__menu">
                     <li>
                        <a href="#" class="dropdown__link">
                           <i class="ri-user-line"></i> Profil
                        </a>
                     </li>

                     <li>
                        <a href="#" class="dropdown__link">
                           <i class="ri-settings-2-line"></i> Ayarlar
                        </a>
                     </li>

                     <li>
                        <a href="#" class="dropdown__link">
                           <i class="ri-logout-circle-r-line"></i> Çıkış Yap
                        </a>
                     </li>
                  </ul>
               </li> -->




            </ul>
         </div>
      </nav>
   </header>

   <!--=============== MAIN JS ===============-->
   <script src="assets/js/sidebar.js"></script>
</body>

</html>