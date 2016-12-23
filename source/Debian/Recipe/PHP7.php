<?php


namespace Phansible\Debian\Recipe;




class PHP7 extends Minimal
{


    use \Phansible\Debian\Role\Traits\PHP7;

    public function __construct($name="PHP7") {
        parent::__construct($name);

        $phpRole=$this->buildRolePHP7();
        $this->addRole($phpRole);
    }


}

