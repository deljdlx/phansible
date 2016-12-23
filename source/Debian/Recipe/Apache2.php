<?php


namespace Phansible\Debian\Recipe;




class Apache2 extends Minimal
{


    use \Phansible\Debian\Role\Traits\Apache2;

    public function __construct($name="Apache2") {
        parent::__construct($name);

        $apacheRole=$this->buildRoleApache2();
        $this->addRole($apacheRole);
    }


}

