<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class Essential extends Role
{


    use \Phansible\Debian\Role\Traits\Essential;

    public function __construct($name='Essential') {
        parent::__construct($name);
        $this->buildRoleEssential($this);
    }
}


