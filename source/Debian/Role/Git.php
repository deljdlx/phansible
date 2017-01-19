<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Git
{


    public function buildRoleGit(Role $role=null) {


        if($role==null) {
            $role=new Role('Git');
        }
        else {
            $role->setName('Git');
        }


        $bddTask=$role->createTask('main', '\Phansible\Debian\Task');
        $bddTask->install('Install git', 'git');
        return $role;
    }
}


