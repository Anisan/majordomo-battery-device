<?php

$old_value=(float)$params['OLD_VALUE'];
$new_value=(float)$params['NEW_VALUE'];

$conversion = (float)$this->getProperty('conversion');
if ($conversion>0) {
    $new_value = $new_value * $conversion;
}

$round = (int)$this->getProperty('round');
if ($round>0) {
    $new_value = round($new_value,$round);
}

$this->setProperty('valueVoltage',$new_value);

 