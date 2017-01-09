<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait Virtualbox
{



    public function buildRoleVirtualbox(Role $role=null) {


        if($role==null) {
            $role=new Role('Virtualbox');
        }
        else {
            $role->setName('Virtualbox');
        }

        $task=$role->createTask('main', '\Phansible\Debian\Task');


        $task->createRawAction(
            'Add repo for virtualbox',
            '- name: Add repo for virtualbox'."\n".
            '  apt_repository: repo="deb http://download.virtualbox.org/virtualbox/debian jessie contrib" state=present',
            true
        );


        $task->createRawAction(
            'Add apt key for virtualbox',
            '- name: Add apt key for virtualbox'."\n".
            '  apt_key: url=https://www.virtualbox.org/download/oracle_vbox_2016.asc state=present',
            true
        );
        $task->createRawAction(
            'Add apt key for virtualbox',
            '- name: Add apt key for virtualbox'."\n".
            '  apt_key: url=https://www.virtualbox.org/download/oracle_vbox.asc state=present',
            true
        );



        $task->updateAll();
        $task->upgradeAll();

        $task->install('Install virtualbox 5.1', 'virtualbox-5.1');

        //sudo apt-get install virtualbox-5.1



        //$task->command('Install virtualbox', "apt-get install linux-headers-$(uname -r|sed 's,[^-]*-[^-]*-,,') virtualbox", true);
        //$task->install('Install virtualbox', 'virtualbox');

        return $role;
    }
}


