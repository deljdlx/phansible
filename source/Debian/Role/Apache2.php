<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Apache2
{



    public function buildRoleApache2(Role $role=null) {


        if($role==null) {
            $role=new Role('Apache2');
        }
        else {
            $role->setName('Apache2');
        }

        $task=$role->createTask('main', '\Phansible\Debian\Task');
        $task->install('Install Apache2', 'apache2');
        return $role;
    }
}


