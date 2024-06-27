<?php
    include "../Database.php"; 
    global $connect;
    mysqli_set_charset($connect, 'utf8');
    $Note=null;
    $TokenComp = $_GET['T'];
  
    $input01 = @$_POST['companyName'];
    $input02 = @$_POST['companylocation'];


    $GetProInfo = "SELECT * FROM company WHERE token = '$TokenComp'";
    $RunProInfo = mysqli_query($connect, $GetProInfo);
    $RowProInfo = mysqli_fetch_array($RunProInfo);

$u_img_tmp2 = @$_FILES['companyImage']['tmp_name'];
$target_dir = "../AddComp/img/";
$newimgproblem2 = uniqid('hx-', true) . '.' . strtolower(pathinfo(@$_FILES['companyImage']['name'], PATHINFO_EXTENSION));

if (move_uploaded_file($u_img_tmp2, $target_dir . $newimgproblem2)) {
    


    // $u_img2 = @$_FILES['companyImage']['name'];
    // $u_img_tmp2 = @$_FILES['companyImage']['tmp_name'];
    // $target_dir = "img/";
    // $target_file2 = $target_dir . basename(@$_FILES["companyImage"]["name"]);
    // $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    // $uploadOk = 1;
    // $newimgproblem2 = uniqid('hx-', true) 
    // . '.' . strtolower(pathinfo(@$_FILES['companyImage']['name'], PATHINFO_EXTENSION));



 
 if (isset($_POST['editCompany'])) {
    $updateInfo = "UPDATE `company` SET
    name = '$input01',
    location = '$input02',
    mainPhoto = '$newimgproblem2'

    WHERE token = '$TokenComp'";
  if(mysqli_query($connect, $updateInfo)){
              $Note = '<p class="style36">تم التحديث </p>';
              echo '<meta http-equiv="refresh" content="1; url=../All-Comp.php?D=D&T=' . $TokenComp . '" />';
              exit();
          }else{
              $Note = '<p class="style36">لم يتم التحديث</p>';
              echo '<meta http-equiv="refresh" content="1; url=../All-Comp.php?D=D&T=' . $TokenComp . '" />';
              exit();
          }
  }
} else {
    // فشل في نقل الصورة
    // يمكنك إدراج رسالة خطأ أو التعامل مع الخطأ بطريقة أخرى
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AddComp/AddComp.css">
    <link rel="stylesheet" href="../AddComp/style.css">
    <link rel="stylesheet" href="../style.css">

    <title>تعديل شركة</title>
</head>
<body>

    <div class="company-form">
        <h2 class="title">تعديل شركة</h2>
        <?php echo $Note; ?>
        <form action="" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="companyId" value="<?php echo $companyData['id']; ?>">
            <label for="companyName">اسم الشركة</label>
            <input type="text" id="companyName" name="companyName" value="<?php echo $RowProInfo['name']; ?>" required>

            <label for="companyWebsite">موقع الشركة</label>
            <input type="text" id="companyWebsite" name="companylocation" value="<?php echo $RowProInfo['location']; ?>" required>
            
            <label for="companyImage" class="imageComp">اضغط لاختيار صورة الشركة</label>
            <input style="display: none;" type="file" id="companyImage" name="companyImage" required>

            <input type="submit" class="submit" name="editCompany" value="حفظ التغييرات"/>
        </form>
    </div>
</body>
</html>
