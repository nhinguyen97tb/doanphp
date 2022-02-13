<?php 
$so1 = 0 ;
$so2 = 1 ;
$tong = 0 ;
$index = 10 ;

for($i=0; $i<10;$i++) {
    $tong = $so1 + $so2 ;
    $so1 = $so2 ;
    $so2 = $tong ;
}
echo($tong);