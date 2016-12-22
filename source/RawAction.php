<?php


namespace Phansible;

class RawAction extends Action
{



    public function toString() {
    	/*
        $buffer='- name: '.$this->getName()."\n";
        $content = trim($this->content);
        $content=preg_replace('`^`m', '  ', $content);
        $buffer.=$content;
		*/
    	$buffer=$this->content;
        return $buffer;
    }
}
