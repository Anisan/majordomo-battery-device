<?php

$this->device_types['sensor_battery'] = array(
    'TITLE'=>"Battery",
    'PARENT_CLASS'=>'SSensors',
    'CLASS'=>'SBatterySensors',
    'PROPERTIES'=>array(
        'valueVoltage'=>array('DESCRIPTION'=>'Voltage Sensor Value','ONCHANGE'=>'valueUpdated','KEEP_HISTORY'=>365,'DATA_KEY'=>1),
        'minVoltageValue'=>array('DESCRIPTION'=>LANG_DEVICES_MIN_VALUE.' (voltage)','_CONFIG_TYPE'=>'num'),
        'maxVoltageValue'=>array('DESCRIPTION'=>LANG_DEVICES_MAX_VALUE.' (voltage)','_CONFIG_TYPE'=>'num'),
        'calculateByVoltage'=>array('DESCRIPTION'=>'Calucate percent by voltage','_CONFIG_TYPE'=>'yesno')
    ),
    'METHODS'=>array(
        'valueUpdated'=>array('DESCRIPTION'=>'Value Updated','CALL_PARENT'=>1),
    ));



