<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class Apache2 extends Role
{


    use Traits\Apache2;

	public function __construct($name='Apache2') {
		parent::__construct($name);
        $this->buildRoleApache2($this);
	}
}


