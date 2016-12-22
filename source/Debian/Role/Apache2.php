<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class Apache2 extends Role
{


	public function __construct($name='Apache2') {

		parent::__construct($name);

		$task=$this->createTask('main', '\Phansible\Debian\Task');



		$task->install('Install Apache2', 'apache2');





		//$task->install('Install Apache2 CGI', 'libapache2-mod-fastcgi');










	}
}


