<?php

$this->device_types['sensor_battery'] = array(
    'TITLE'=>"Battery",
    'PARENT_CLASS'=>'SSensors',
    'CLASS'=>'SBatterySensors',
    'PROPERTIES'=>array(
        'valueVoltage'=>array('DESCRIPTION'=>'Voltage Sensor Value','ONCHANGE'=>'valueVoltageUpdated','KEEP_HISTORY'=>365,'DATA_KEY'=>1),
        'minVoltageValue'=>array('DESCRIPTION'=>LANG_DEVICES_MIN_VALUE.' (voltage)','_CONFIG_TYPE'=>'num'),
        'maxVoltageValue'=>array('DESCRIPTION'=>LANG_DEVICES_MAX_VALUE.' (voltage)','_CONFIG_TYPE'=>'num'),
        'calculateByVoltage'=>array('DESCRIPTION'=>'Calucate percent by voltage','_CONFIG_TYPE'=>'yesno'),
        'calculateMethod'=>array('DESCRIPTION'=>'Calucate percent method','_CONFIG_TYPE'=>'select','_CONFIG_OPTIONS'=>'linear=Linear,symmetric=Symmetric sigmoidal approximation,asymmetric=Asymmetric sigmoidal approximation'),
        'valueWorkVoltage'=>array('DESCRIPTION'=>'Work Value Voltage','ONCHANGE'=>'valueWorkVoltageUpdated','KEEP_HISTORY'=>0),
        'conversion'=>array('DESCRIPTION'=>'Conversion coefficient (work-to-data)','_CONFIG_TYPE'=>'text'), 
        'round'=>array('DESCRIPTION'=>'Value round after conversion','_CONFIG_TYPE'=>'num','KEEP_HISTORY'=>0),
    ),
    'METHODS'=>array(
        'valueVoltageUpdated'=>array('DESCRIPTION'=>'Value Voltage Updated'),
        'valueUpdated'=>array('DESCRIPTION'=>'Value Updated','CALL_PARENT'=>1), 
        'valueWorkVoltageUpdated'=>array('DESCRIPTION'=>'Work Value updated event'), 
    ));


@include_once(ROOT.'languages/SBatterySensors_'.SETTINGS_SITE_LANGUAGE.'.php');
@include_once(ROOT.'languages/SBatterySensors_default'.'.php');

