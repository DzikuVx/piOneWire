<?php

namespace piOneWire;

abstract class Device {

    /**
     * @var string
     */
    private $sDeviceId;

    /**
     * @var string
     */
    private $sPath;

    /**
     * @param string $sPath
     * @param string $sDeviceId
     */
    public function __construct($sPath, $sDeviceId) {
        $this->sPath = $sPath;
        $this->sDeviceId = $sDeviceId;
    }

    /**
     * Method gets raw content of w1_slave file
     * @return string
     */
    public function getW1Slave() {
        return file_get_contents($this->sPath . '/devices/' . $this->sDeviceId . '/w1_slave');
    }

}