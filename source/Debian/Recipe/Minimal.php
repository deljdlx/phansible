<?php


namespace Phansible\Debian\Recipe;



use Phansible\Debian\Role\Essential;
use Phansible\Recipe;

class Minimal extends Recipe
{

    use Essential;


    public function __construct($name="minimal") {
        parent::__construct($name);
        $essentialRole=$this->buildRoleEssential();
        $this->addRole($essentialRole);
    }


}

