<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/db_process.php');

$query = "SELECT * FROM feedback";
$dbResult = mysqli_query($link, $query);

$arResult = [];

while ($row = mysqli_fetch_assoc($dbResult)) 
{
    $arResult[$row['id']] = $row;
}
mysqli_close($link);

?>


<?foreach($arResult as $key => $value):?>
<div>String: <?=$value['string']?></div>
<div>Result: <?=$value['result']?></div>
<?endforeach;?>

