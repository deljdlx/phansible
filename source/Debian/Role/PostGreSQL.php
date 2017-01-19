<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait PostGreSQL
{


    public function buildRolePostGreSQL(Role $role=null) {


        if($role==null) {
            $role=new Role('PostGreSQL');
        }
        else {
            $role->setName('PostGreSQL');
        }


        $bddTask=$role->createTask('main', '\Phansible\Debian\Task');
        $bddTask->install('Install PostGreSQL', 'postgresql-9.4');
        $bddTask->install('Install PostGreSQL', 'postgresql-client-9.4');
        return $role;
    }
}


