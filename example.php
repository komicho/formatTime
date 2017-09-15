<?php 

include 'src/formatTime.php';

use komicho\formatTime as ktf;

$time = new ktf([
    'lang' => 'ar'
]);

echo 'The difference between the recorded time and the present time: ' . $time -> between(1505466647) . '<br/>';

echo 'The difference between two times: ' . $time -> between(1505466647, 1505466721) . '<br/>';

echo 'Display timed text: ' . $time -> date_time(1505466647);