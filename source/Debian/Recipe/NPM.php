<?php


namespace Phansible\Debian\Recipe;




class NPM extends PHP7ModApache
{

    use \Phansible\Debian\Role\NPM;

    public function __construct($name="NPM") {
        parent::__construct($name);

        $npmRole=$this->buildRoleNPM();
        $this->addRole($npmRole);
    }


}

