<?php


namespace Phansible;




class Group
{


	protected $name;
	protected $machines=array();



	public function addMachineByIP($ip) {

		$machine=new Machine();
		$machine->setIP($ip);

		$this->machines[]=$machine;
		return $machine;
	}




	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}


	public function toString() {
		$buffer='['.$this->getName().']'."\n";

		foreach ($this->machines as $machine) {
			$buffer.=$machine->toString()."\n";
		}


		return $buffer;
	}



}

