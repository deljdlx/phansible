<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class PHP7 extends Role
{


    use \Phansible\Debian\Role\Traits\PHP7;

    public function __construct($name='PHP7') {

        parent::__construct($name);
        $this->buildRolePHP7($this);

    }
}


