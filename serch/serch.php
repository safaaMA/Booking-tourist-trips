<?php

include "../Database.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$Copm = "SELECT * FROM company ";
$startCopm = mysqli_query($connect, $Copm);

// استعلام SQL لاسترجاع الرحلات
$tripQuery = "SELECT * FROM trips WHERE availability = 'متوفرة'";
$startTrip = mysqli_query($connect, $tripQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
    <title>صفحــة البحــث</title>
</head>
<body>
<div class="booking"><a href="https://wsend.co/9647722470444">احجز الان <i class="fa-brands fa-whatsapp"></i></a></div>

    <header>
        <h1>ابحث عما يناسبك</h1>
        <div class="search-container">
            <input type="text" id="search" placeholder="بحث...">
            <button onclick="search()">بحــث</button>
        </div>
    </header>

    <section id="trips"> <!-- تم تغيير هوية القسم إلى "trips" -->
        <h2>الرحلات</h2>
        <?php
while($tripData = mysqli_fetch_array($startTrip)){
    $companyQuery = "SELECT company.name, company.location FROM company INNER JOIN trips ON company.token = trips.companyToken WHERE trips.token = '" . $tripData['token'] . "'";
    $companyResult = mysqli_query($connect, $companyQuery);
    $companyData = mysqli_fetch_array($companyResult);
    
    echo'
    <div class="trip search-item"> <!-- تم تغيير الفئة إلى "trip" -->
        <div class="Tname"> <span class="tripss">رحــلات</span> ' . $tripData['nameTrips'] . '</div> 
        <div class="availability">' . $tripData['availability'] . '</div> 
        <div classs="THos">من تاريخ ' . $tripData['fromTrips'] . ' الى تاريخ ' . $tripData['toTrips'] . '</div> 
        <div class="compName">اسم الشركة: ' . $companyData['name'] . '</div> 
        <div class="compLoc">موقع الشركة: ' . $companyData['location'] . '</div>
        <a class="toCOmp" href="../DetailsComp.php?D=D&T=' . $tripData['companyToken'] . '" class="visit-button">زيارة الشركة</a> 
    </div>';
}
?>

    </section>

    <section id="hotels">
        <h2>الشركـــات</h2>
        <?php

while($Datacompany = mysqli_fetch_array($startCopm)){
    echo'
    <div class="company search-item">
    <div>' . $Datacompany['name'] . '
    <span class="company-location">(' . $Datacompany['location'] . ')</span></div>
    <a href="../DetailsComp.php?D=D&T=' . $Datacompany['token'] . '" class="visit-button">زيارة الشركة</a>
    </div>';
}
?>
    </section>
    <script src="script.js"></script>
</body>
</html>
