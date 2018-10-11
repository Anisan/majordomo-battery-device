<?php

$dictionary=array(
   'DEVICES_LINK_SENSOR_PASS_BATTERY' => 'Sensor data pass from battery',
   'DEVICES_LINK_SENSOR_PASS_BATTERY_DESCRIPTION' => 'Pass sensor\'s value to another device and to HomeKit',
);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>
