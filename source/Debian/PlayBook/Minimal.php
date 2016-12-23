<?php


namespace Phansible\Debian\PlayBook;




use Phansible\Debian\Role\Traits\Apache2;
use Phansible\Debian\Role\Traits\Essential;
use Phansible\Debian\Role\Traits\MariaDB;
use Phansible\Debian\Role\Traits\PHP7ModApache;

class Minimal extends \Phansible\Playbook
{

    use Essential;
    use MariaDB;
    use Apache2;
    use PHP7ModApache;



    public function __construct($name="LAMP") {
        parent::__construct($name);
        $this->buildRoleEssential();

    }


}

