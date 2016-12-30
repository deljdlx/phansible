<?php


namespace Phansible\Debian\Recipe;




class Samba extends Minimal
{


    use \Phansible\Debian\Role\Samba;

    public function __construct($name="Apache2") {
        parent::__construct($name);

        $apacheRole=$this->buildRoleSamba();
        $this->addRole($apacheRole);
    }


}

