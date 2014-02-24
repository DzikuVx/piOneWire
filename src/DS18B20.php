<?php
namespace piOneWire;

/**
 * Class DS18B20
 * @package piOneWire
 * @author Pawel Spychalski<pspychalski@gmail.com>
 */
class DS18B20 extends Device {

    protected function convert($sRaw) {
        preg_match("/t=(.+)/", preg_split("/\n/", $sRaw)[1], $matches);
        return $matches[1] / 1000;
    }

    public function getTemperature() {
        return $this->convert($this->getW1Slave());
    }

} 