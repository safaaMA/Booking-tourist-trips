<?php
   include "Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');
   $Time = date("y-m-d h:i:s");
   $Date = date("ymdhis");
   $RNumber = rand(100, 200);
   $Token = $Date . $RNumber;
   $TokenComp = $_GET['T'];

    $datatrips = "SELECT * FROM trips WHERE nameTrips = '$TokenComp'";
    $startdatatrips = mysqli_query($connect, $datatrips);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>تفاصيل الرحلة</title>
</head>


<style>
  .checkbox-wrapper-35 .switch {
    display: none;
  }

  .checkbox-wrapper-35 .switch + label {
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    color: #78768d;
    cursor: pointer;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 21px;
    line-height: 30px;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .checkbox-wrapper-35 .switch + label::before,
  .checkbox-wrapper-35 .switch + label::after {
    content: '';
    display: block;
  }

  .checkbox-wrapper-35 .switch + label::before {
    background-color: #05012c;
    border-radius: 500px;
    height: 15px;
    margin-right: 8px;
    -webkit-transition: background-color 0.125s ease-out;
    transition: background-color 0.125s ease-out;
    width: 25px;
  }

  .checkbox-wrapper-35 .switch + label::after {
    background-color: #fff;
    border-radius: 13px;
    box-shadow: 0 3px 1px 0 rgba(37, 34, 71, 0.05), 0 2px 2px 0 rgba(37, 34, 71, 0.1), 0 3px 3px 0 rgba(37, 34, 71, 0.05);
    height: 13px;
    left: 1px;
    position: absolute;
    top: 11px;
    -webkit-transition: -webkit-transform 0.125s ease-out;
    transition: -webkit-transform 0.125s ease-out;
    transition: transform 0.125s ease-out;
    transition: transform 0.125s ease-out, -webkit-transform 0.125s ease-out;
    width: 13px;
  }

  .checkbox-wrapper-35 .switch + label .switch-x-text {
    display: block;
    margin-right: .3em;
  }

  .checkbox-wrapper-35 .switch + label .switch-x-toggletext {
    display: block;
    font-weight: bold;
    height: 35px;
    overflow: hidden;
    position: relative;
    width: 200px;
}
  .checkbox-wrapper-35 .switch + label .switch-x-unchecked,
  .checkbox-wrapper-35 .switch + label .switch-x-checked {
    left: 0;
    position: absolute;
    top: 0;
    -webkit-transition: opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
    transition: opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
    transition: transform 0.125s ease-out, opacity 0.125s ease-out;
    transition: transform 0.125s ease-out, opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
  }

  .checkbox-wrapper-35 .switch + label .switch-x-unchecked {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }

  .checkbox-wrapper-35 .switch + label .switch-x-checked {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  .checkbox-wrapper-35 .switch + label .switch-x-hiddenlabel {
    position: absolute;
    visibility: hidden;
  }

  .checkbox-wrapper-35 .switch:checked + label::before {
    background-color: #ffb500;
  }

  .checkbox-wrapper-35 .switch:checked + label::after {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }

  .checkbox-wrapper-35 .switch:checked + label .switch-x-unchecked {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  .checkbox-wrapper-35 .switch:checked + label .switch-x-checked {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
</style>

<body>
<?php
    include "Database.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');
    $CookiesUser = @$_COOKIE["userToken"];
    $GetUserInfo = "SELECT * FROM users WHERE user_token='$CookiesUser'";
    $RunUserInfo = mysqli_query($connect, $GetUserInfo);
    $RowUserInfo = mysqli_fetch_array($RunUserInfo);
    $UserType = @$RowUserInfo['user_admin'];

    while($GOdatatrips = mysqli_fetch_array($startdatatrips)){
        // توليد معرف فريد لكل checkbox
        $trip_id = $GOdatatrips['id']; 

        echo '
        <div class="titleTrip">
            <p>' . $GOdatatrips['nameTrips'] . '</p>
        </div>
        <div class="proTrip">
            <p>' . $GOdatatrips['detilsTrips'] . '</p>
            <div class="form-group-to">
                <div class="from">من تاريخ <span class="spanto">' . $GOdatatrips['fromTrips'] . '</span></div>
                <div class="to">الى تاريخ <span class="spanto">' . $GOdatatrips['toTrips'] . '</span></div>
            </div>';

        // تأكد من أن المستخدم مسجل الدخول قبل عرض مربع الاختيار
        if($CookiesUser !== null){
            echo '
            <div class="checkbox-wrapper-35">
                <input class="switch" type="checkbox" id="switch_' . $trip_id . '" name="switch_' . $trip_id . '" value="private">
                <label for="switch_' . $trip_id . '">
                    <span class="switch-x-toggletext">
                        <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel">Unchecked: </span>غير متوفرة</span>
                        <span class="switch-x-checked"><span class="switch-x-hiddenlabel">Checked: </span>متوفرة</span>
                    </span>
                </label>
            </div>';
        }

        echo '</div>'; // إغلاق div class="proTrip"
    }
?>

<script>
    var switches = document.querySelectorAll('.switch');

    // إضافة حدث استماع لتغيير حالة الـ checkbox
    switches.forEach(function(switchElement) {
        switchElement.addEventListener('change', function() {
            var tripId = this.id.split('_')[1]; 
            var isChecked = this.checked ? 'متوفرة' : 'غير متوفرة'; 
            updateAvailability(tripId, isChecked); 
            localStorage.setItem('switch_' + tripId, isChecked);

        });
        
        var tripId = switchElement.id.split('_')[1];
        var storedAvailability = localStorage.getItem('switch_' + tripId);
        if (storedAvailability) {
            switchElement.checked = storedAvailability === 'متوفرة';
        }
    });

    function updateAvailability(tripId, availability) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_availability.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send('trip_id=' + tripId + '&availability=' + availability);
    }
</script>

</body>
</html>