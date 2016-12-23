<?php


namespace Phansible\Debian\Recipe;




class PHP7ModApache extends PHP7
{


    use \Phansible\Debian\Role\Traits\PHP7ModApache;
    use \Phansible\Debian\Role\Traits\Apache2;

    public function __construct($name="PHP7ModApache") {
        parent::__construct($name);

        $phpRole=$this->buildRolePHP7ModApache();
        $this->addRole($phpRole);

        $apacheRole=$this->buildRoleApache2();
        $this->addRole($apacheRole);

    }


}

