<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait MariaDB
{


    public function buildRoleMariaDB(Role $role=null) {


        if($role==null) {
            $role=new Role('MariaDB');
        }
        else {
            $role->setName('MariaDB');
        }


        $bddTask=$role->createTask('main', '\Phansible\Debian\Task');
        $bddTask->install('Install MariaDB', 'mariadb-server');
        return $role;
    }
}


