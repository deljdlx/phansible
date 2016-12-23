<?php


namespace Phansible\Debian\Recipe;




use Phansible\Debian\Role\Traits\Apache2;
use Phansible\Debian\Role\Traits\Essential;
use Phansible\Debian\Role\Traits\MariaDB;
use Phansible\Debian\Role\Traits\PHP7ModApache;
use Phansible\Recipe;

class Minimal extends Recipe
{

    use Essential;


    public function __construct($name="Minimal") {
        parent::__construct($name);
        $essentialRole=$this->buildRoleEssential();
        $this->addRole($essentialRole);
    }


}

