<?php


namespace Phansible\Debian\PlayBook;





use Phansible\Debian\Role\Essential;

class Minimal extends \Phansible\Playbook
{

    use Essential;



    public function __construct($name="LAMP") {
        parent::__construct($name);
        $this->buildRoleEssential();

    }


}

