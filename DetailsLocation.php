<?php
   include "Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');

   $TokenComp = $_GET['T'];
   $Copm = "SELECT * FROM location WHERE token = '$TokenComp'";
   $startCopm = mysqli_query($connect, $Copm);
   $Data = mysqli_fetch_array($startCopm);
   

?>
  <style>
        .photos {
            margin-top: 20px;
        }
        
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
        }
        
        .photo-gallery img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease-in-out;
}

.photo-gallery img:hover {
    transform: scale(1.1);
}
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" <link
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styleDetPhoto.css">
    <title>Tourist Reservation</title>
</head>

<body>
<div class="booking"><a href="https://wsend.co/9647722470444">احجز الان <i class="fa-brands fa-whatsapp"></i></a></div>

    <div class="Container">
        <nav class="Navbar">
            <div class="Moode">
                <i class="fa-solid fa-moon"></i>
            </div>
            <div class="list">
                <ul>
                    <li><a href="./index.php">الصفحة الرئيسيه</a></li>
                    <li><a href="./All-Comp.php">شركات سياحية</a></li>
                    <li><a href="./index.php">رحلات خاصه</a></li>
                </ul>
            </div>
            <div class="searsh">
                <a href="">ابحث</a>
            </div>
        </nav>
        <div class="Comp-Det">
            <h1><?php echo $Data['nameLocation']; ?></h1>
        </div>
        <div class="detl-group">
            <div class="location">
                <h2> <?php echo $Data['location']; ?> <i class="fa-solid fa-location-dot"></i></h2>
                <div class="msp">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7038.001859472163!2d44.3637642336561!3d33.31128697692682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15577f009ca2a139%3A0x5a96201867baea10!2z2KjYutiv2KfYryDZhdmI2YQ!5e0!3m2!1sar!2siq!4v1701510131846!5m2!1sar!2siq"
                        width="1200" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<div class="ditails">
    <h1>تفاصيل الموقع</h1>
    <p>
    <?php echo $Data['detels']; ?> 

    </p>
</div>
                <div class="photos">
        <h2>صور الموقع:</h2>
        <div class="photo-gallery">
            <img src="./AddLocation/img/<?php echo $Data['photolocation']; ?>" alt="صورة 1">
            <img src="./AddLocation/img/<?php echo $Data['photolocationtow']; ?>" alt="صورة 2">
            <img src="./AddLocation/img/<?php echo $Data['photolocationthree']; ?>" alt="صورة 3">
            <img src="./AddLocation/img/<?php echo $Data['photolocationfour']; ?>" alt="صورة 4">
            <img src="./AddLocation/img/<?php echo $Data['photolocationfife']; ?>" alt="صورة 5">
        </div>
    </div>

            </div>

        </div>
       

        <script src="script.js"></script>
        

</body>

</html>