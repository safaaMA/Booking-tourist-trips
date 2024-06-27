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

    $u_img2 = isset($_FILES['companyImage']['name']) ? $_FILES['companyImage']['name'] : '';
    $u_img_tmp2 = isset($_FILES['companyImage']['tmp_name']) ? $_FILES['companyImage']['tmp_name'] : '';

    $target_dir = "img/";
    $target_file2 = $target_dir . basename(@$_FILES["companyImage"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem2 = uniqid('image -', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($u_img_tmp2,"img/$newimgproblem2");

    
    
    if (isset($_POST['get05'])) {
        $insertData = "INSERT INTO company(token,name,location ,mainPhoto) VALUES ('$Token','$input01','$input02','$newimgproblem2' )";
                if(mysqli_query($connect, $insertData)){
                    $Note = '<p class="style36">تم اضافة الشركة </p>';
                    echo'<meta http-equiv="refresh" content="1, url=../All-Comp.php" />';
                    exit();
                }else{
                    echo'<link rel="stylesheet" href="./AddComp.css" media="screen" />';
                    $Note = '<p class="style36">لم يتم اضافة  الشركة </p>';
                    echo'<meta http-equiv="refresh" content="1, url=../All-Comp.php" />';
                    exit();
                }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./AddComp.css">
    <link rel="stylesheet" href="style.css">
    <title>إضافة شركة</title>
</head>
<body>
    <div class="company-form">
        <h2 class="title">إضافة شركة</h2>
        <?php echo $Note ;?>
        <form  action="" method="post" enctype="multipart/form-data">
            <label for="companyName">اسم الشركة</label>
            <input type="text" id="companyName" name="companyName" required>

            <label for="companyWebsite">موقع الشركة</label>
            <input type="text" id="companyWebsite" name="companyWebsite" required>

            <label for="companyImage" class="imageComp">اضغط لاختيار صورة الشركة</label>
            <input style="display: none;" type="file" id="companyImage" name="companyImage" required>

            <input type="submit" class="submit" name="get05" value="اضافة شركة"/>
            </form>
    </div>

</body>
</html>
