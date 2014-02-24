<?php

namespace piOneWire;

class piOneWire {

    /**
     * @var string
     */
    static private $W1_FOLDER = "/sys/bus/w1";

    /**
     * @var piOneWire
     */
    static private $instance;

    private function __construct() {

    }

    /**
     * @return piOneWire
     */
    static public function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $W1_FOLDER
     */
    public static function setW1Folder($W1_FOLDER) {
        self::$W1_FOLDER = $W1_FOLDER;
    }

    /**
     * @param string $sType
     * @param string $sId
     * @return mixed
     */
    public function create($sType, $sId) {
        require_once dirname ( __FILE__ ) . '/src/Device.php';
        require_once dirname ( __FILE__ ) . '/src/' . $sType . '.php';

        $sClassName = '\piOneWire\\' . $sType;

        return new $sClassName(self::$W1_FOLDER, $sId);
    }


}