<?php

$ot=$this->object_title;
$description = $this->description;
if (!$description) {
    $description = $ot;
}
$linked_room=$this->getProperty('linkedRoom');

$calc=(bool)$this->getProperty('calculateByVoltage');
if ($calc)
{
    $value=(float)$this->getProperty('valueVoltage');
    $minValue=(float)$this->getProperty('minVoltageValue');
    $maxValue=(float)$this->getProperty('maxVoltageValue');
    
    $capacity = $maxValue - $minValue;
    $curent = $value - $minValue;
    if ($curent > 0)
        $percent = round( $curent * 100 / $capacity,1);
    else
        $percent = 0;
    $this->setProperty('value', $percent);
}