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
    $voltage=(float)$this->getProperty('valueVoltage');
    $minVoltage=(float)$this->getProperty('minVoltageValue');
    $maxVoltage=(float)$this->getProperty('maxVoltageValue');
    $limit = $voltage - $minValue;
    if ($limit > 0)
    {
        $method=$this->getProperty('calculateMethod');
        if ($method == 'symmetric')
            //Symmetric sigmoidal approximation
            $result = 105 - (105 / (1 + pow(1.724 * ($voltage - $minVoltage)/($maxVoltage - $minVoltage), 5.5)));
        else if ($method == 'asymmetric')
            //Asymmetric sigmoidal approximation
            $result = 101 - (101 / pow(1 + pow(1.33 * ($voltage - $minVoltage)/($maxVoltage - $minVoltage) ,4.5), 3));
        else
            //Linear mapping
            $result = ($voltage - $minVoltage) * 100 / ($maxVoltage - $minVoltage);
    
    if ($result > 100)
        $result = 100;
    else
        $result = round($result,1);
}
    else
        $result = 0;
    $this->setProperty('value', $result);
}