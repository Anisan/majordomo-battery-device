<?php

$dictionary=array(
   'DEVICES_LINK_SENSOR_PASS_BATTERY' => 'Пересылка данных о батарейки',
   'DEVICES_LINK_SENSOR_PASS_BATTERY_DESCRIPTION' => 'Выставляет свойства в связанном объекте и посылает данные в HomeKit',
);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>
