<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

class PHP7ModApache extends PHP7
{


    public function __construct($name='PHP7ModApache') {

        parent::__construct($name);

		$task=$this->getTask('main');
	    $task->install('Install PHP7', 'libapache2-mod-php7.0');




        //$task->install('Install PHP7', 'php7.0-fpm');







	     //php7.0-mysql php7.0-curl php7.0-json php7.0-gd php7.0-mcrypt php7.0-msgpack php7.0-memcached php7.0-intl php7.0-sqlite3 php7.0-gmp php7.0-geoip php7.0-mbstring php7.0-xml php7.0-zip
    }
}


