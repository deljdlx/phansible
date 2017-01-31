<?php


namespace Phansible\Debian\PlayBook;





use Phansible\Debian\Role\Essential;

class Minimal extends \Phansible\Playbook
{

    use Essential;



    public function __construct($name="minimal") {
        parent::__construct($name);
        $recipe=new \Phansible\Debian\Recipe\Minimal();
        $this->addRecipe($recipe);

    }


}

