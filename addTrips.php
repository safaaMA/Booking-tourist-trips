<?php

   include "./Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $Note=null;
   $Time = date("y-m-d h:i:s");
   $Date = date("ymdhis");
   $RNumber = rand(100, 200);
   $Token = $Date . $RNumber;

   
   $Name = @$_POST['name'];
   $details = @$_POST['details'];
   $datefrom = @$_POST['dateFrom'];
   $dateto = @$_POST['dateTo'];

   $TokenComp = $_GET['T'];


   if (isset($_POST['send'])) {
    $insertData = "INSERT INTO trips (token, nameTrips, detilsTrips,fromTrips, toTrips, companyToken) 
    VALUES ('$Token', '$Name', '$details', '$datefrom', '$dateto','$TokenComp')";
    if(mysqli_query($connect, $insertData)){
                $Note = '<p class="style36">تم اضافة الرحلة </p>';
                echo '<meta http-equiv="refresh" content="1; url=./DetailsComp.php?D=D&T=' . $TokenComp . '" />';
                exit();
            }else{
                $Note = '<p class="style36">لم يتم اضافة  الرحلة </p>';
                echo '<meta http-equiv="refresh" content="1; url=./DetailsComp.php?D=D&T=' . $TokenComp . '" />';
                exit();
            }
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة رحلة</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap');
        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: right;
            margin: 20px;
            background-color: #f5f5f5;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        input[type="text"],
        textarea,
        input[type="date"] {
            width: calc(105% - 22px);
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            outline: none;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 16px 0;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s;
            outline: none;
            font-family: 'Cairo', sans-serif;

        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-size: 18px;
            color: #555;
            font-weight: bold;
        }
        .row {
            display: flex;
            align-items: baseline;
        }
        h7 {
            font-size: 21px;
             margin: 0px 0px 0px 42px;
        }
    </style>
</head>
<body>

<h2>إضافة رحلة جديدة</h2>

<form action="" method="post">
    <label for="flight_name">اسم الرحلة</label>
    <input type="text" id="flight_name" name="name" required>

    <label for="details">التفاصيل</label>
    <textarea id="details" name="details" rows="4" required></textarea>

    <label for="date">تاريخ الرحلة</label>
    <div class="row">
    <h7>من</h7>
    <input type="date" id="date" name="dateFrom" required>
    </div>
    <div class="row">
    <h7>الى</h7>
    <input type="date" id="date" name="dateTo" required>
    </div>


    <input type="submit" name="send" value="اضافة">
</form>

</body>
</html>
