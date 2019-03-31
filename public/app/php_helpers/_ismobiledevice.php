<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
echo $detect->isMobile() ? ($detect->isTablet() ? 'ismobiledevice istablet' : 'ismobiledevice isphone') : 'isdesktop nomobiledevice';