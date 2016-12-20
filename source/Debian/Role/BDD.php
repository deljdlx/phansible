<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class BDD extends Role
{


    public function __construct($name='BDD') {

        parent::__construct($name);

        $bddTask=$this->createTask('main', '\Phansible\Debian\Task');
        $bddTask->install('Install MariaDB', 'mariadb-server');


    }
}


