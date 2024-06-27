<?php
   include "Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $Time = date("y-m-d h:i:s");
   $Date = date("ymdhis");
   $RNumber = rand(100, 200);
   $Token = $Date . $RNumber;
   $TokenComp = $_GET['T'];
   $Copm = "SELECT * FROM company WHERE token = '$TokenComp'";
   $startCopm = mysqli_query($connect, $Copm);
   $Data = mysqli_fetch_array($startCopm);
   $Photo = "SELECT * FROM photocomp WHERE tokencomp = '$TokenComp' ORDER BY id DESC";
   $startPhoto = mysqli_query($connect, $Photo);
   $DataPhoto = mysqli_fetch_array($startPhoto);
   $hotel = "SELECT * FROM hotel WHERE tokenComp = '$TokenComp' ORDER BY id DESC";
   $starthotel = mysqli_query($connect, $hotel);
   $comment = @$_POST['comment'];
   if (isset($_POST['submit'])) {
    $insertData = "INSERT INTO comments (token, comment, tokenComp) 
    VALUES ('$Token', '$comment','$TokenComp')";
    if(mysqli_query($connect, $insertData)){
                $Note = '<p class="style36">تم اضافة التعليق  </p>';
                echo '<meta http-equiv="refresh" content="1; url=DetailsComp.php?D=D&T=' . $TokenComp . '" />';
                exit();
            }else{
                $Note = '<p class="style36">لم يتم اضافة  التعليق  </p>';
                echo '<meta http-equiv="refresh" content="1; url=DetailsComp.php?D=D&T=' . $TokenComp . '" />';
                exit();
            }
    }
    $comments = "SELECT * FROM comments WHERE tokenComp = '$TokenComp' ORDER BY id DESC";
    $startcomments = mysqli_query($connect, $comments);

    $datatrips = "SELECT * FROM trips WHERE companyToken = '$TokenComp'";
    $startdatatrips = mysqli_query($connect, $datatrips);
?>


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
            <h1><?php echo $Data['name']; ?></h1>
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
            </div>

        </div>
        <div class="titleCOP">
        <?php
                                include "Database.php"; 
                                global $connect; 
                                mysqli_set_charset($connect, 'utf8');
                                $CookiesUser = @$_COOKIE["userToken"];
                                $GetUserInfo = "SELECT * FROM users WHERE user_token='$CookiesUser'";
                                $RunUserInfo = mysqli_query($connect, $GetUserInfo);
                                $RowUserInfo = mysqli_fetch_array($RunUserInfo);
                                $UserType = @$RowUserInfo['user_admin'];
                                if($UserType == "admin"){
                                    echo'
                                    <h1 class="imgComName"><a class="btn-comp" href="./AddPhoto/AddPhoto.php?D=D&T=' . $Data["token"] . '">اضافة صور الشركة</a></h1>
                                    <h1 class="imgComName"><a class="btn-comp" href="./AddHotel/AddHotel.php?D=D&T=' . $Data["token"] . '">اضافة فنادق معتمدة</a></h1>';
                                    
                                }else{
                                    echo'
                       
                                    ';
                                }
                            ?>   
     

        </div>
        <div class="titleCOP">
            <h1 class="imgComName">صور رحلات الشركة <i class="fa-solid fa-image"></i></h1>
            <h1 class="imgComName">فنادق معتمدة <i class="fa-solid fa-hotel"></i></h1>

        </div>
        <div class="2cont">

            <div class="container-photo">
                <div class="big-image">
                    <img src="./AddPhoto/img/<?php echo $DataPhoto['photp1']; ?>"  alt="">
                </div>
                <div class="s-image">
                    <div class="imageCom"><img class="imgCompan" src="./AddPhoto/img/<?php echo $DataPhoto['photp2']; ?>" alt=""></div>
                    <div class="imageCom"><img class="imgCompan" src="./AddPhoto/img/<?php echo $DataPhoto['photp3']; ?>" alt=""></div>
                    <div class="imageCom"><img class="imgCompan" src="./AddPhoto/img/<?php echo $DataPhoto['photp4']; ?>"  alt=""></div>
                    <div class="imageCom"><img class="imgCompan" src="./AddPhoto/img/<?php echo $DataPhoto['photp5']; ?>"  alt=""></div>
                </div>
            </div>

            <div class="hotels">
            <?php

                while($Datahotel = mysqli_fetch_array($starthotel)){
                    $valuation= $Datahotel['valuation'];
                    $Rvaluation = '';

                    for ($i = 1; $i <= $valuation; $i++) {
                        // بناء السلسلة النصية للنجوم
                        $Rvaluation .= '<i class="fas fa-star';
                        if ($i <= $valuation) {
                            $Rvaluation .= ' filled';
                        }
                        $Rvaluation .= '"></i>';
                    }
                    echo'
                <div class="hotel-cart">
                    <div class="img-hotel"><img class="csphoto" src="./AddHotel/img/'; echo $Datahotel['image']; echo'"></div>
                    <div class="det-hotel">
                        <h3>'; echo $Datahotel['name']; echo' </h3>
                        <p>'; echo $Datahotel['location']; echo' <i class="fa-solid fa-location-dot"></i></p>
                        <p>
                        '; echo  $Rvaluation; echo'
                        </p>
                    </div>
                </div>
                ';
            }
        ?>
               
            </div>
        </div>
        <?php
                                include "Database.php"; 
                                global $connect; 
                                mysqli_set_charset($connect, 'utf8');
                                $CookiesUser = @$_COOKIE["userToken"];
                                $GetUserInfo = "SELECT * FROM users WHERE user_token='$CookiesUser'";
                                $RunUserInfo = mysqli_query($connect, $GetUserInfo);
                                $RowUserInfo = mysqli_fetch_array($RunUserInfo);
                                $UserType = @$RowUserInfo['user_admin'];
                                if($UserType == "admin"){
                                    echo'<h1 class="addTrips"><a class="btn-comp" href="./addTrips.php?D=D&T=<?php echo $Data["token"];?>اضافة رحلات  الشركة</a></h1>
                                    ';
                                }else{
                                    echo'
                                    ';
                                }
                            ?>   

        <div class="containerHotelOfTravel">
        <?php
$unique_names = array(); 

while($GOdatatrips = mysqli_fetch_array($startdatatrips)){
    $name = $GOdatatrips['nameTrips']; 

    if (!in_array($name, $unique_names)) {
        $unique_names[] = $name;
        echo '
            <a href="./ditelaTrip.php?D=D&T=' . $name . '" class="styleTravel">
                <div class="trip-details">
                    <h2>' . $name . '</h2>
                </div>
            </a>
        ';
    }
}
?>

     </div>
        <div class="comments">
            <h2>تعليقات المستخدمين</h2>
            <?php
                while($DataComments = mysqli_fetch_array($startcomments)){
                    echo'
                <div class="bob-comment">
                <div class="comm">
                    <div class="iconComm"><i class="fa-regular fa-user"></i></div>
                </div>
                <br>
                <div class="textCom">
                    <p>'; echo $DataComments['comment']; echo'</p>
                </div>
            </div>
            ';
        }
     ?>
          
 
            <div class="Add-comment">
                <h4>اضف تعليق <i class="fa-regular fa-comment"></i></h4>
                <form action="" method="post" >
                        <div class="inp-group">
                        <input type="text" name="comment" placeholder="كتابه تعليق">
                        <input type="submit" name="submit" value="ارسال">
                    </div>
                 </form>
            </div>
        </div>

        <script src="script.js"></script>

</body>

</html>