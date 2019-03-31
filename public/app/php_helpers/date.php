<?php

$time_now=mktime(date('h')+5,date('i')+30,date('s'));

// this will display: Tuesday Jul 26th, 2011, 11:10:18 AM
// to enable it just delete the "//"
//print $time_now=date('l M dS, Y, h:i:s A',$time_now);

// this will display: Tuesday Jul 26th, 2011, 11:10:18 AM
print $time_now=date('M d, Y',$time_now);

?>