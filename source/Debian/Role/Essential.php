<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class Essential extends Role
{


    public function __construct($name='Essential') {

        parent::__construct($name);

        $roleDefaultRequirement=$this;
        $task=$roleDefaultRequirement->createTask('main', '\Phansible\Debian\Task');

        $task->createAction('Install Vim', array(
            'apt'=>array(
                'name'=>'vim',
                'state'=>'latest'
            )
        ));

        $task->install('Install wget', 'wget');
        $task->install('Install git', 'git');
        $task->upgradeAll();
    }
}


