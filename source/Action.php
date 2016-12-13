<?php


namespace Phansible;


use Symfony\Component\Yaml\Yaml;

class Action
{


	protected $name;
	protected $content='';


	public function __construct($name=null, $content=null) {
		if($name) {
			$this->setName($name);
		}
		if($content) {
			$this->setContent($content);
		}
	}






	public function setContent($content) {
		$this->content=$content;
		return $this;
	}

	public function getContent() {
		return $this->content;
	}




	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}



	public function toString() {
		$buffer='- name: '.$this->getName()."\n";

		$content = Yaml::dump($this->content);

		$content=preg_replace('`^`m', '  ', $content);
		$buffer.=$content;
		return $buffer;
	}
}

