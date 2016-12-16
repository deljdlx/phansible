<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class PHP7 extends Role
{


    public function __construct($name='PHP7') {

        parent::__construct($name);

        $rolePHP7=$this;
        $task=$rolePHP7->createTask('main', '\Phansible\Debian\Task');
        $task->createRawAction(
            'Add repo for PHP7',
            'apt_repository: repo="deb http://packages.dotdeb.org {{ ansible_distribution_release }} all" state=present',
            true
        );
        $task->createRawAction(
            'Add apt key for Debian',
            'apt_key: url=https://www.dotdeb.org/dotdeb.gpg state=present',
            true
        );
        $task->createAction('Update apt', array(
            'apt'=>'update_cache=yes'
        ), true);
        $task->install('Install PHP7', 'php7.0-fpm');
    }
}


