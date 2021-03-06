<?php


namespace Phansible\Debian\Role;


use Phansible\Role;

Trait PHP7ModApache
{

    use PHP7;

    public function buildRolePHP7ModApache(Role $role = null)
    {


        if ($role == null) {
            $role = new Role('PHP7ModApache');
        } else {
            $role->setName('PHP7ModApache');
        }

        $this->buildRolePHP7($role);


        $task = $role->getTask('main');
        $task->install('Install PHP7', 'libapache2-mod-php7.0');


        $task->createRawAction(
            'Restart Apache',
            '- service:' . "\n" .
            '    name: apache2' . "\n" .
            '    state: restarted' . "\n",
            true
        );

        $this->installPHPInfo($role);

        return $role;

    }


    public function installPHPInfo($role, $taskName = 'main')
    {

        $task = $role->getTask($taskName);

        $task->copy(
            realpath(__DIR__ . '/../asset/php7/phpinfo.php'),
            '/var/www/html/phpinfo.php'
        );
    }


}

