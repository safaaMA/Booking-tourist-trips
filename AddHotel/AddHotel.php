<?php

   include "../Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $Note=null;
   $Time = date("y-m-d h:i:s");
   $Date = date("ymdhis");
   $RNumber = rand(100, 200);
   $Token = $Date . $RNumber;

   $hotelName = @$_POST['hotelName'];
   $hotelLocation = @$_POST['hotelLocation'];
   $valuation = @$_POST['rating'];

   $TokenComp = $_GET['T'];
   $target_dir = "img/";

$u_img5 = isset($_FILES['hotelImage']['name']) ? $_FILES['hotelImage']['name'] : '';
$u_img_tmp5 = isset($_FILES['hotelImage']['tmp_name']) ? $_FILES['hotelImage']['tmp_name'] : '';
$target_file5 = $target_dir . basename(@$_FILES["hotelImage"]["name"]);
$imageFileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));
$uploadOk = 1;
$newimgproblem5 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['hotelImage']['name'], PATHINFO_EXTENSION));
move_uploaded_file($u_img_tmp5, "img/$newimgproblem5");

if (isset($_POST['submit'])) {
 $insertData = "INSERT INTO hotel (token, name, location, image, valuation, tokenComp) 
 VALUES ('$Token', '$hotelName', '$hotelLocation', '$newimgproblem5', '$valuation','$TokenComp')";
 if(mysqli_query($connect, $insertData)){
             $Note = '<p class="style36">تم اضافة الصور </p>';
             echo '<meta http-equiv="refresh" content="1; url=../DetailsComp.php?D=D&T=' . $TokenComp . '" />';
             exit();
         }else{
             $Note = '<p class="style36">لم يتم اضافة  الصور </p>';
             echo '<meta http-equiv="refresh" content="1; url=../DetailsComp.php?D=D&T=' . $TokenComp . '" />';
             exit();
         }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./AddHotel.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" <link
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <title>إضافة فندق</title>
</head>
<body>
    <div class="container">
        <h1>إضافة فندق</h1>
        <?php echo $Note ;?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="hotelName">اسم الفندق</label>
                <input type="text" id="hotelName" name="hotelName" required>
            </div>

            <div class="form-group">
                <label for="hotelLocation">موقع الفندق</label>
                <input type="text" id="hotelLocation" name="hotelLocation" required>
            </div>

            <div class="form-group">
                <label for="hotelImage" class="hotelImage">اضغط لاضافة صورة الفندق  </label>
                <input style="display:none;" type="file" id="hotelImage" name="hotelImage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>تقييم النجوم:</label>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="star5" required><label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" value="4" id="star4" required><label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" value="3" id="star3" required><label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" value="2" id="star2" required><label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" value="1" id="star1" required><label for="star1"><i class="fas fa-star"></i></label>
                </div>
            </div>


            <div class="form-group">
                <input class="inpAdd" type="submit" name="submit" value="إضافة فندق">
            </div>
        </form>
    </div>
</body>
</html>
