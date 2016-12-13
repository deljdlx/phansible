<?php


namespace Phansible;




class Task
{


	protected $name;


	protected $actions=array();






	public function createAction($name, $content) {
		$item=new Action($name, $content);
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
		foreach ($this->actions as $action) {
			$buffer.=$action->toString()."\n";
		}


		//$buffer.=$this->content;
		file_put_contents($filepath, $buffer);
	}
}

