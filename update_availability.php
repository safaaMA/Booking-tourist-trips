<?php
include "Database.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');

$tripId = $_POST['trip_id'];
$availability = $_POST['availability'];

$query = "UPDATE trips SET availability = '$availability' WHERE id = $tripId";
$result = mysqli_query($connect, $query);
if ($result) {
    echo 'تم تحديث التوفرية للرحلة بنجاح.';
} else {
    echo 'حدث خطأ أثناء تحديث التوفرية للرحلة: ' . mysqli_error($connect);
}
?>
