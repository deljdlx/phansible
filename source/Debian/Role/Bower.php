<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Bower
{


    public function buildRoleBower(Role $role=null) {


        if($role==null) {
            $role=new Role('bower');
        }
        else {
            $role->setName('bower');
        }


        $npmTask=$role->createTask('main', '\Phansible\Debian\Task');
        $npmTask->command('Install bower', 'npm install -g bower');
        return $role;
    }
}


