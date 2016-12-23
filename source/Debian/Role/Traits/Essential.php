<?php


namespace Phansible\Debian\Role\Traits;


use Phansible\Role;

Trait Essential
{


    public function buildRoleEssential(Role $role=null) {


        if($role==null) {
            $role=new Role('Essential');
        }
        else {
            $role->setName('Essential');
        }

        $task=$role->createTask('main', '\Phansible\Debian\Task');

        $task->updateAll();
        $task->upgradeAll();


        $task->createAction('Install Vim', array(
            'apt'=>array(
                'name'=>'vim',
                'state'=>'latest'
            )
        ));

        $task->install('Build essential', 'build-essential');
        $task->install('Install pkg-config', 'pkg-config');


        $task->install('Install wget', 'wget');
        $task->install('Install git', 'git');

        return $role;
    }
}


