<?php
   include "../Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $Note=null;
   $Time = date("y-m-d h:i:s");
   $Date = date("ymdhis");
   $RNumber = rand(100, 200);
   $Token = $Date . $RNumber;

   $TokenComp = $_GET['T'];
   $Copm = "SELECT * FROM company WHERE token = '$TokenComp'";
   $startCopm = mysqli_query($connect, $Copm);
   $Data = mysqli_fetch_array($startCopm);

   $target_dir = "img/";

   $u_img1 = isset($_FILES['tripImage1']['name']) ? $_FILES['tripImage1']['name'] : '';
   $u_img_tmp1 = isset($_FILES['tripImage1']['tmp_name']) ? $_FILES['tripImage1']['tmp_name'] : '';
   $target_file1 = $target_dir . basename(@$_FILES["tripImage1"]["name"]);
   $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
   $uploadOk = 1;
   $newimgproblem1 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['tripImage1']['name'], PATHINFO_EXTENSION));
   move_uploaded_file($u_img_tmp1, "img/$newimgproblem1");

   $u_img2 = isset($_FILES['tripImage2']['name']) ? $_FILES['tripImage2']['name'] : '';
   $u_img_tmp2 = isset($_FILES['tripImage2']['tmp_name']) ? $_FILES['tripImage2']['tmp_name'] : '';
   $target_file2 = $target_dir . basename(@$_FILES["tripImage2"]["name"]);
   $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
   $uploadOk = 1;
   $newimgproblem2 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['tripImage2']['name'], PATHINFO_EXTENSION));
   move_uploaded_file($u_img_tmp2, "img/$newimgproblem2");

   $u_img3 = isset($_FILES['tripImage3']['name']) ? $_FILES['tripImage3']['name'] : '';
   $u_img_tmp3 = isset($_FILES['tripImage3']['tmp_name']) ? $_FILES['tripImage3']['tmp_name'] : '';
   $target_file3 = $target_dir . basename(@$_FILES["tripImage3"]["name"]);
   $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
   $uploadOk = 1;
   $newimgproblem3 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['tripImage3']['name'], PATHINFO_EXTENSION));
   move_uploaded_file($u_img_tmp3, "img/$newimgproblem3");


   $u_img4 = isset($_FILES['tripImage4']['name']) ? $_FILES['tripImage4']['name'] : '';
   $u_img_tmp4 = isset($_FILES['tripImage4']['tmp_name']) ? $_FILES['tripImage4']['tmp_name'] : '';
   $target_file4 = $target_dir . basename(@$_FILES["tripImage4"]["name"]);
   $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
   $uploadOk = 1;
   $newimgproblem4 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['tripImage4']['name'], PATHINFO_EXTENSION));
   move_uploaded_file($u_img_tmp4, "img/$newimgproblem4");

   $u_img5 = isset($_FILES['tripImage5']['name']) ? $_FILES['tripImage5']['name'] : '';
   $u_img_tmp5 = isset($_FILES['tripImage5']['tmp_name']) ? $_FILES['tripImage5']['tmp_name'] : '';
   $target_file5 = $target_dir . basename(@$_FILES["tripImage5"]["name"]);
   $imageFileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));
   $uploadOk = 1;
   $newimgproblem5 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['tripImage5']['name'], PATHINFO_EXTENSION));
   move_uploaded_file($u_img_tmp5, "img/$newimgproblem5");

   if (isset($_POST['send'])) {
    $insertData = "INSERT INTO photocomp (token, photp1, photp2, photp3, photp4, photp5, tokencomp) 
    VALUES ('$Token', '$newimgproblem1', '$newimgproblem2', '$newimgproblem3', '$newimgproblem4', '$newimgproblem5', '$TokenComp')";
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
    <link rel="stylesheet" href="style.css">
    <title>  إضافة صور رحلات الشركة</title>
  
</head>
<body>
    <div class="form-container">
        <h2> إضافة صور رحلات الشركة <samp class="name-copm"><?php echo $Data['name']; ?></samp></h2>
        <?php echo $Note ;?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="tripImage1">اضفط لاضافة صورة الرحلة 1</label>
            <input style="display:none;" type="file" id="tripImage1" name="tripImage1" accept="image/*" required>

            <label for="tripImage2">اضفط لاضافة صورة الرحلة 2</label>
            <input style="display:none;" type="file" id="tripImage2" name="tripImage2" accept="image/*" required>

            <label for="tripImage3">اضفط لاضافة صورة الرحلة 3</label>
            <input style="display:none;" type="file" id="tripImage3" name="tripImage3" accept="image/*" required>

            <label for="tripImage4">اضفط لاضافة صورة الرحلة 4</label>
            <input style="display:none;" type="file" id="tripImage4" name="tripImage4" accept="image/*" required>

            <label for="tripImage5">اضفط لاضافة صورة الرحلة 5</label>
            <input style="display:none;" type="file" id="tripImage5" name="tripImage5" accept="image/*" required>

            <input type="submit" name="send" value="إضافة صور">
        </form>
    </div>
</body>
</html>
