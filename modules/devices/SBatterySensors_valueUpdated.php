<?php
if (!isset($params['NEW_VALUE'])) {
    $new_value=(float)$this->getProperty('value');
} else {
    $new_value=(float)$params['NEW_VALUE'];
}

if ($new_value >= 80)
{
    $this->setProperty('icon', 'battery-full');
    $this->setProperty('color', 'green');
}
else if ($new_value >= 60)
{
    $this->setProperty('icon', 'battery-three-quarters');
    $this->setProperty('color', 'green');
}
else if ($new_value >= 40)
{
    $this->setProperty('icon', 'battery-half');
    $this->setProperty('color', 'green');
}
else if ($new_value >= 20)
{
    $this->setProperty('icon', 'battery-quarter');
    $this->setProperty('color', 'orange');
}
else if ($new_value >= 0)
{
    $this->setProperty('icon', 'battery-empty');
    $this->setProperty('color', 'red');
}
