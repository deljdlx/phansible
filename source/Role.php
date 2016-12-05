<?php


namespace Phansible;




class Role
{


	protected $name;
	protected $tasks=array();






	public function createTask($name) {
		$task=new Task();
		$task->setName($name);
		$this->tasks[$task->getName()]=$task;
		return $task;
	}




	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}



	public function create($filepath) {

		mkdir($filepath.'/tasks');

		foreach ($this->tasks as $task) {
			$taskFileName=$filepath.'/tasks/'.$task->getName().'.yml';
			$task->create($taskFileName);
		}


		/*
		mkdir($filepath.'/handlers');
		mkdir($filepath.'/vars');
		mkdir($filepath.'/meta');
		*/
	}

}

