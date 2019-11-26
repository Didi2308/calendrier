<?php

$date = strtotime('25-12-2019');
$date_inscription = strtotime(date('d-m-Y'));

$dfr1 = strftime('%A %d %B %Y', $date);
$dfr2 = strftime('%A %d %B %Y', $date_inscription);

if($date < $date_inscription){
    echo 'Le ' .$dfr1. ' est avant le ' .$dfr2;
}elseif($date == $date_inscription){
    echo 'Les deux dates sont les mêmes';
}else{
    echo 'Le ' .$dfr2. ' est avant le ' .$dfr1;
}
