<?php


namespace Phansible\Debian\PlayBook;


use Phansible\Debian\Role\Git;
use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\NPM;
use Phansible\Debian\Role\PostGreSQL;


class Webdev extends Minimal
{

    use NPM;
    use MariaDB;
    use PostGreSQL;
    use Git;



    public function __construct($name = "webdev")
    {
        parent::__construct($name);

        $httpRecipe = new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);

        $npmRole = $this->buildRoleNPM();
        $mariaRole = $this->buildRoleMariaDB();
        $postGreSQLRole = $this->buildRolePostGreSQL();

        $gitRole = $this->buildRoleGit();


        $httpRecipe->addRole($npmRole);
        $httpRecipe->addRole($mariaRole);
        $httpRecipe->addRole($postGreSQLRole);
        $httpRecipe->addRole($gitRole);

    }


}

