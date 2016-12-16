<?php


namespace Phansible;




class Task
{


	protected $name;


	protected $actions=array();






	public function createAction($name, $content, $become=false) {
		$item=new Action($name, $content, $become);
		$this->actions[]=$item;
		return $item;
	}

    public function createRawAction($name, $content, $become=false) {
        $item=new RawAction($name, $content, $become);
        $this->actions[]=$item;
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

