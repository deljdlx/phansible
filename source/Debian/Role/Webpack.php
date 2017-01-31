<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Webpack
{


    public function buildRoleWebpack(Role $role=null) {


        if($role==null) {
            $role=new Role('webpack');
        }
        else {
            $role->setName('webpack');
        }


        $npmTask=$role->createTask('main', '\Phansible\Debian\Task');
        $npmTask->command('Install webpack', 'npm install -g webpack --save-dev');
        return $role;
    }
}


