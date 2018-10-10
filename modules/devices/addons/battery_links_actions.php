<?php

if ($link_type=='sensor_pass_battery') {
   $value = (int)gg($device1['LINKED_OBJECT'].'.value');
   $minValue = (int)gg($device1['LINKED_OBJECT'].'.minValue');
   
   if ($value < $minValue) $statusLowBattery = true;
   else $statusLowBattery = false;
   sg($object.'.statusLowBattery',($statusLowBattery ? 1 : 0));
   sg($object.'.batteryLevel',$value);

   if ($this->isHomeBridgeAvailable()) {
      do {
         $device2=SQLSelectOne("SELECT * FROM devices WHERE LINKED_OBJECT LIKE '".$object."'");
         if (!$device2['ID']) {
            break;
         }
         $payload=array();
         $payload['name']=$device2['LINKED_OBJECT'];
         $payload['service_name']=$device2['TITLE'];

         switch($device2['TYPE']) {
            case 'relay':
               $load_type=gg($object.'.loadType');
               if     ($load_type=='light')  $payload['service'] = 'Lightbulb';
               elseif ($load_type=='vent')   $payload['service'] = 'Fan';
               elseif ($load_type=='switch') $payload['service'] = 'Switch';
               else                          $payload['service'] = 'Outlet';
               break;
            case 'sensor_temp':
               $payload['service']='TemperatureSensor';
               break;
            case 'sensor_humidity':
               $payload['service']='HumiditySensor';
               break;
            case 'motion':
               $payload['service']='MotionSensor';
               break;
            case 'sensor_light':
               $payload['service']='LightSensor';
               break;
            case 'openclose':
               $payload['service']='ContactSensor';
               break;
         }

         $payload['characteristic'] = 'StatusLowBattery';
         $payload['value'] = null;
         $payload['value']=($statusLowBattery ? 1 : 0);
         if (isset($payload['value'])) sg('HomeBridge.to_set',json_encode($payload));

         $payload['characteristic'] = 'BatteryLevel';
         $payload['value'] = null;
         $payload['value']=$value;
         if (isset($payload['value'])) sg('HomeBridge.to_set',json_encode($payload));
      } while(0);
   }
}