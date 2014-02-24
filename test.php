<?php

require_once 'piOneWire.php';

$oFactory = \piOneWire\piOneWire::getInstance();
$oFactory->setW1Folder(dirname ( __FILE__ ) . '/testData');

/**
 * @var \piOneWire\DS18B20
 */
$oDevice = $oFactory->create('DS18B20', '123');
$sW1Slave = $oDevice->getW1Slave();

echo $oDevice->getTemperature();