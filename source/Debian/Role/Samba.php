<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Samba
{



    public function buildRoleSamba(Role $role=null) {


        if($role==null) {
            $role=new Role('Samba');
        }
        else {
            $role->setName('Samba');
        }

        $task=$role->createTask('main', '\Phansible\Debian\Task');
        $task->install('Install Samba', 'samba');
        $task->install('Install Samba', 'samba-common');
        $task->install('Install Samba', 'samba-common-bin');

        return $role;
    }
}


