<?php


namespace Phansible;




class Task
{


	protected $name;


	protected $blocks=array();






	public function createBlock($name, $content) {
		$item=new TaskBlock($name, $content);
		$this->task[]=$item;
		return $item;
	}




	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}



	public function create($filepath) {
		$buffer='---'."\n";
		foreach ($this->task as $block) {
			$buffer.=$block->toString()."\n";
		}


		//$buffer.=$this->content;
		file_put_contents($filepath, $buffer);
	}
}

