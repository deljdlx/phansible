<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class MariaDB extends Role
{


    use Traits\MariaDB;

    public function __construct($name='MariaDB') {

        parent::__construct($name);
        $this->buildRoleMariaDB($this);

        /*
        $bddTask=$this->createTask('main', '\Phansible\Debian\Task');
        $bddTask->install('Install MariaDB', 'mariadb-server');
        */
    }
}


