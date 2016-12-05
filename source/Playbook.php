<?php


namespace Phansible;




class Playbook
{


	protected $name;
	protected $recipes=array();





	public function __construct() {

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
		$this->recipes[$recipe->getName()]=$recipe;
		return $recipe;
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

