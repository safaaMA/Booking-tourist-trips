<?php
    if(@$_COOKIE["userLogin"] == 1){
        echo'<meta http-equiv="refresh" content="0, url=index.php" />';
        exit();
    }
    $sccass =null;
    $error =null;
    include "Database.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');
    $a_post01 = @$_POST['email'];
    $a_post02 = @$_POST['password'];

    if(isset($_POST['get06'])){
      $GetUserInfo = "SELECT * FROM users WHERE email = '$a_post01'";
      $RunUserInfo = mysqli_query($connect, $GetUserInfo);
      if(mysqli_num_rows($RunUserInfo) > 0){
          $RowUserInfo = mysqli_fetch_array($RunUserInfo);
          $UserName = $RowUserInfo['email'];
          $UserPass = $RowUserInfo['user_password'];
          $UserToken = $RowUserInfo['user_token'];
          if($UserPass != $a_post02){
              $error = "<p class='style09'>عذراً يرجى كتابة كلمة السر بصورة صحيحة<i class='fa-solid fa-circle-exclamation'></i> </p>";
              $welcome = "";
          }else{
              setcookie('nameUser',$UserName, time() + (86400 * 365), "/");
              setcookie('userToken',$UserToken, time() + (86400 * 365), "/");
              setcookie('userLogin','1', time() + (86400 * 365), "/");
              echo'
                  <link rel="stylesheet" href="style.css" media="screen" />
              ';
              echo'<meta http-equiv="refresh" content="1, url=index.php" />';
            $sccass = '<p class="style10">تم تسجيل الدخول في حسابك <i class="fa-solid fa-circle-check"></i> </p>';
          }
        }
    
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="./Log/style.css">
</head>
<body>
    <div class="container">

        <div class="form-container">
            <?php echo $sccass ; ?>
            <?php echo $error ;?>
            <h1>تسجيل الدخول</h1>
            <form action="" method="post">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>

                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" class="submit" value="تسجيل الدخول" name="get06">

            </form>
        </div>
    </div>
</body>
</html>
