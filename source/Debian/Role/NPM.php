<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait NPM
{


    public function buildRoleNPM(Role $role=null) {


        if($role==null) {
            $role=new Role('NPM');
        }
        else {
            $role->setName('NPM');
        }

        $npmSH=realpath(__DIR__.'/../../asset/debian/install-npm.sh');

        $npmTask=$role->createTask('main', '\Phansible\Debian\Task');
        $npmTask->script('Install npm', $npmSH);
        return $role;
    }
}


