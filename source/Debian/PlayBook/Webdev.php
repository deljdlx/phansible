<?php


namespace Phansible\Debian\PlayBook;






use Phansible\Debian\Role\NPM;

class Webdev extends LAMP
{

    use NPM;



    public function __construct($name="webdev") {
        parent::__construct($name);



        $HTTPRecipe=$this->getRecipeByName('HTTP');


        $npmRole=$this->buildRoleNPM();
        $HTTPRecipe->addRole($npmRole);


    }


}

