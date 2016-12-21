<?php


namespace Phansible;




class Role
{


	protected $name;
	protected $tasks=array();



    public function __construct($name) {
        $this->setName($name);
    }



    public function getTask($taskName) {
    	if(isset($this->tasks[$taskName])) {
    		return $this->tasks[$taskName];
	    }
	    else {
	    	throw new Exception('No task with name "'.$taskName.'" in role "'.$this->getName().'"');
	    }
    }


	public function createTask($name, $taskCast=null) {

		if($taskCast) {
			if(class_exists($taskCast)) {
				$task=new $taskCast();
			}
			else {
				throw new Exception('Class "'.$taskCast.'"" does not exist');
			}
		}
		else {
			$task=new Task();
		}


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


		if(!is_dir($filepath.'/tasks')) {
			mkdir($filepath.'/tasks');
		}


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

