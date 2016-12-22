<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class Essential extends Role
{


    public function __construct($name='Essential') {

        parent::__construct($name);

        $roleDefaultRequirement=$this;
        $task=$roleDefaultRequirement->createTask('main', '\Phansible\Debian\Task');

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






    }
}


