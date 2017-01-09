<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait PHP7
{


    public function getPHPExtensions() {
        return array(
            'php7.0-mysql',
            'php-curl',
            //'php-json',
            'php-sqlite3',
            //'php-memcached'
        );
    }



    public function buildRolePHP7(Role $role=null) {


        if($role==null) {
            $role=new Role('PHP7');
        }
        else {
            $role->setName('PHP7');
        }



        $rolePHP7=$role;
        $task=$rolePHP7->createTask('main', '\Phansible\Debian\Task');
        $task->createRawAction(
            'Add repo for PHP7 deb',
            '- name: Add repo for PHP7'."\n".
            '  apt_repository: repo="deb http://packages.dotdeb.org {{ ansible_distribution_release }} all" state=present',
            true
        );

        $task->createRawAction(
            'Add repo for PHP7 deb-src',
            '- name: Add repo for PHP7'."\n".
            '  apt_repository: repo="deb-src http://packages.dotdeb.org {{ ansible_distribution_release }} all" state=present',
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

        $task->install('Install PHP7', 'php7.0');
        $task->install('Install PHP7 dev', 'php7.0-dev');

        $task->install('Install PHP7 Pear', 'php-pear');



        $task->command('Update pear', 'pecl channel-update pecl.php.net', true);

        /*
        $task->createRawAction(
            'Update pear',
            '- name: Update pear'."\n".
            '  command: pecl channel-update pecl.php.net'."\n",
            true
        );
        */


        foreach ($this->getPHPExtensions() as $extension) {
            $task->install('Install PHP extension '.$extension, $extension);
        }



        $task->install('Image ImageMagic', 'imagemagick');
        $task->install('Image ImageMagic dev', 'libmagickwand-dev');
        $task->install('Install PHP7 ImageMagic', 'php7.0-imagick');



        $composerSH=realpath(__DIR__.'/../../asset/debian/php7/install-composer.sh');

        $task->createRawAction(
            'Install PHP Composer',
            '- name: Install PHP Composer'."\n".
            '  script: '.$composerSH."\n",
            true
        );

        $phingSH=realpath(__DIR__.'/../../asset/debian/php7/install-phing.sh');
        $task->script('Install PHP phing', $phingSH, true);




        /*
        $task->createRawAction(
            'Install PHP Phing',
            '- name: Install PHP Phing'."\n".
            '  script: '.$phingSH."\n",
            true
        );
        */


        //$task->command('Install composer', 'wget https://raw.githubusercontent.com/composer/getcomposer.org/1b137f8bf6db3e79a38a5bc45324414a6b1f9df2/web/installer -O - -q | php -- --quiet', false);






        //$task->install('Image PHP7 ImageMagic', 'php-imagick');


        /*
        $task->createRawAction(
            'Install PHP7 ImageMagic',
            '- name: Install PHP7 ImageMagic'."\n".
            '  command: pecl install imagick'."\n",
            true
        );
        */

        /*
        $task->createRawAction(
            'Enable PHP7 ImageMagic',
            '- name: Enable PHP7 ImageMagic'."\n".
            '  shell: " yes \"\" | pecl install imagick"'."\n",
            true
        );
        */






        //$task->install('Install PHP7', 'libapache2-mod-php7.0');
        //$task->install('Install PHP7', 'php7.0-fpm');







        //php7.0-mysql php7.0-curl php7.0-json php7.0-gd php7.0-mcrypt php7.0-msgpack php7.0-memcached php7.0-intl php7.0-sqlite3 php7.0-gmp php7.0-geoip php7.0-mbstring php7.0-xml php7.0-zip




        return $role;
    }
}


