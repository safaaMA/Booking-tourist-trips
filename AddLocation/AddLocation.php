<?php
    include "../Database.php"; 
    global $connect;
    mysqli_set_charset($connect, 'utf8');
    $Time = date("y-m-d h:i:s");
    $Date = date("ymdhis");
    $RNumber = rand(100, 200);
    $Token = $Date . $RNumber;
    $Note=null;
    $input01 = isset($_POST['companyName']) ? $_POST['companyName'] : '';
    $input02 = isset($_POST['companyWebsite']) ? $_POST['companyWebsite'] : '';
    $input04 = isset($_POST['detels']) ? $_POST['detels'] : '';

    $u_img2 = isset($_FILES['companyImage']['name']) ? $_FILES['companyImage']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage']['tmp_name']) ? $_FILES['companyImage']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file2 = $target_dir . basename(@$_FILES["companyImage"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem2 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem2");

    $u_img2 = isset($_FILES['companyImage1']['name']) ? $_FILES['companyImage1']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage1']['tmp_name']) ? $_FILES['companyImage1']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file21 = $target_dir . basename(@$_FILES["companyImage1"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file21, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem21 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage1']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem21");


    
    $u_img2 = isset($_FILES['companyImage2']['name']) ? $_FILES['companyImage2']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage2']['tmp_name']) ? $_FILES['companyImage2']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file22 = $target_dir . basename(@$_FILES["companyImage2"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file22, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem22 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage2']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem22");

    $u_img2 = isset($_FILES['companyImage3']['name']) ? $_FILES['companyImage3']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage3']['tmp_name']) ? $_FILES['companyImage3']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file23 = $target_dir . basename(@$_FILES["companyImage3"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file23, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem23 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage3']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem23");

    $u_img2 = isset($_FILES['companyImage4']['name']) ? $_FILES['companyImage4']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage4']['tmp_name']) ? $_FILES['companyImage4']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file2 = $target_dir . basename(@$_FILES["companyImage4"]["name"]);
    $imageFileType24 = strtolower(pathinfo(@$target_file24, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem24 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage4']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem24");

    
    
    if (isset($_POST['get05'])) {
        $insertData = "INSERT INTO `location` (token,nameLocation,location,detels,photolocation,photolocationtow,photolocationthree,photolocationfour,photolocationfife) VALUES ('$Token','$input01','$input02','$input04','$newimgproblem2','$newimgproblem21','$newimgproblem22','$newimgproblem23','$newimgproblem24')";
                if(mysqli_query($connect, $insertData)){
                    $Note = '<p class="style36">تم اضافة موقع اثري </p>';
                    echo'<meta http-equiv="refresh" content="1, url=../AllLocation.php" />';
                    exit();
                }else{
                    echo'<link rel="stylesheet" href="./AddComp.css" media="screen" />';
                    $Note = '<p class="style36">لم يتم اضافة  موقع اثري </p>';
                    echo'<meta http-equiv="refresh" content="1, url=../AllLocation.php" />';
                    exit();
                }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AddComp/AddComp.css">
    <link rel="stylesheet" href="style.css">
    <title>إضافة موقع اثري</title>
</head>
<body>
    <div class="company-form locationform">
        <h2 class="title">إضافة موقع اثري</h2>
        <?php echo $Note ;?>
        <form  action="" method="post" enctype="multipart/form-data">
            <label for="companyName">اسم الموقع</label>
            <input type="text" id="companyName" name="companyName" required>

            <label for="companyWebsite">الموقع </label>
            <input type="text" id="companyWebsite" name="companyWebsite" required>

            <label for="companyWebsite">تفاصيل الموقع </label>
            <input type="text" id="detels" name="detels" required>
<div class="form-group-image">
<div class="form-group-image1">
            <label for="companyImage" class="imageComp imagescose5">اضغط لاختيار صورة الموقع</label>
            <input   type="file" id="companyImage" name="companyImage" required>

            <label for="companyImage1" class="imageComp imagescose7">اضغط لاختيار صورة الموقع</label>
            <input   type="file" id="companyImage1" name="companyImage1" required>
</div>
<div class="form-group-image2">
            <label for="companyImage2" class="imageComp imagescose2">اضغط لاختيار صورة الموقع</label>
            <input   type="file" id="companyImage2" name="companyImage2" required>

            <label for="companyImage3" class="imageComp imagescose1">اضغط لاختيار صورة الموقع</label>
            <input   type="file" id="companyImage3" name="companyImage3" required>
            <label for="companyImage4" class="imageComp imagescose">اضغط لاختيار صورة الموقع</label>
            <input   type="file" id="companyImage4" name="companyImage4" required>
</div>
</div>
            <input type="submit" class="submit" name="get05" value="اضافة موقع اثري"/>
            </form>
    </div>

</body>
</html>
