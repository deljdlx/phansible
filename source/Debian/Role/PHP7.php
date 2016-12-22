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
            '- name: Add repo for PHP7'."\n".
            '  apt_repository: repo="deb http://packages.dotdeb.org {{ ansible_distribution_release }} all" state=present',
            true
        );
        $task->createRawAction(
            'Add apt key for Debian',
	        '- name: Add apt key for Debian'."\n".
            '  apt_key: url=https://www.dotdeb.org/dotdeb.gpg state=present',
            true
        );

	    $task->updateAll();
	    $task->upgradeAll();



	    //$task->install('Install PHP7', 'libapache2-mod-php7.0');
        //$task->install('Install PHP7', 'php7.0-fpm');







	     //php7.0-mysql php7.0-curl php7.0-json php7.0-gd php7.0-mcrypt php7.0-msgpack php7.0-memcached php7.0-intl php7.0-sqlite3 php7.0-gmp php7.0-geoip php7.0-mbstring php7.0-xml php7.0-zip
    }
}


