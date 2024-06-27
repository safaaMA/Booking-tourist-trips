<?php
   include "Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $notification=null;
   $message=null;

   $Copm = "SELECT * FROM location ";
   $startCopm = mysqli_query($connect, $Copm);
   $Token = @$_GET['Q'];




if(@$_GET['D'] == 'D'){

    $Delete = "DELETE FROM `location` WHERE Token = '$Token'";
    $RunDelete = mysqli_query($connect, $Delete);
    // $notification = '<p class="sendNot"><i class="fa-solid fa-check"></i> تم الحذف </p>';
    echo'<meta http-equiv="refresh" content="1; url=AllLocation.php" />';

}


if(isset($_GET['H']) && isset($_GET['W'])) {
    $token = $_GET['W'];

    $selectQuery = "SELECT top FROM location WHERE token = '$token'";
    $result = mysqli_query($connect, $selectQuery);
    $row = mysqli_fetch_assoc($result);


    $result = mysqli_query($connect, $updateQuery);
} 





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
            <div class="AddCompany">
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
                                    <a class="AddCom" href="./AddLocation/AddLocation.php">اضافة موقع اثري</a>

                                    ';
                                }else{
                                    echo'
                               
                                    ';
                                }
                            ?>   
            </div>
        </nav>
        <?php echo  $message ; ?>

        <div style="text-align: end; color:blue;"><?php echo $notification; ?></div>

        <div class="container-Comp">
  
            <div class="Gruop-Cart">
            <?php
while ($Data = mysqli_fetch_array($startCopm)) {
    echo '
    <div class="Cart">
        <div class="image-comp">
            <div class="border">
                <img src="./AddLocation/img/' . $Data["photolocation"] . '" alt="">
            </div>
        </div>
        <div class="detils-comp">
            <h1>' . $Data["nameLocation"] . '</h1>
            <p><samp>الموقع :</samp>' . $Data["location"] . '</p>
            <div class="a-det">
                <a href="./DetailsLocation.php?D=D&T=' . $Data["token"] . '">تفاصيل الموقع</a>
            </div>
        </div>
        <div class="options">';
            if ($UserType == "admin") {
                echo '<div class="deleteButton"><a href="AllLocation.php?D=D&Q=' . $Data["token"] . '"><i class="fa-solid fa-trash-can"></i></a></div>';

            }
        echo '
        </div>
    </div>';
}
?>

                
        <script src="script.js"></script>
</body>

</html>