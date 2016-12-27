<?php


namespace Phansible;




class Playbook
{


	protected $name;
	protected $recipes=array();





	public function __construct($name=null) {
        if($name) {
            $this->setName($name);
        }
	}



    public function getRecipes() {
        return $this->recipes;
    }

    /**
     * @param $name
     * @return Recipe
     * @throws Exception
     */
    public function getRecipeByName($name) {
        if(isset($this->recipes[$name])) {
            return $this->recipes[$name];
        }
        else {
            throw new Exception('No recipe with name "'.$name.'"');
        }
    }

    public function addGroupToRecipe(Group $group, $recipeName) {
        $recipe=$this->getRecipeByName($recipeName);
        $recipe->addGroup($group);
        return $this;
    }



	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}


	public function createRecipe($name) {
		$recipe=new Recipe();
		$recipe->setName($name);
		$this->addRecupe($recipe);
		return $recipe;
	}


    public function addRecipe(Recipe $recipe) {
        $this->recipes[$recipe->getName()]=$recipe;
        return $this;
    }




	public function create($filepath) {

		$playbookFile=$filepath.'/'.$this->getName().'.yml';




		$buffer='---
# '.$this->getName()."\n";

		foreach ($this->recipes as $recipe) {
			$buffer.=$recipe->toString()."\n";
		}


		file_put_contents($playbookFile, $buffer);

		return $playbookFile;




	}






}

