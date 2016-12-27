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


    public function copy($source, $destination, $owner='root', $group='root', $mode='0644', $become=false) {
        $this->createRawAction(
            'Copying file "'.$source.'" to "'.$destination,
            '- copy:'."\n".
            '    src: '.$source.''."\n".
            '    dest: '.$destination.''."\n".
            '    owner: '.$owner."\n".
            '    group: '.$group."\n".
            '    mode: '.$mode.''."\n",
            $become
        );
    }


    public function command($name, $command, $become=false) {
        return $this->createRawAction(
            $name,
            '- name: '.$name."\n".
            '  command: '.$command.''."\n",
            $become
        );
    }


    public function script($name, $scriptPath, $become=false) {
        return $this->createRawAction(
            $name,
            '- name: '.$name."\n".
            '  script: '.$scriptPath."\n",
            true
        );
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

