<?php

class Taskexception extends Exception {}

class task{
	
	
	public function __construct($id, $title, $description, $deadline, $completed){
		$this->setid($id);
		$this->settitle($title);
		$this->setdescription($description);
		$this->setdeadline($deadline);
		$this->setcompleted($completed);
	}
	
	private $_id;
	private $_title;
	private $_description;
	private $_deadline;
	private $_completed;
	
	public function getid(){
		return $this->_id;
	}
	public function gettitle(){
		return $this->_title;
	}
	
	public function getdescription(){
		return $this->_description;
	}
	
	public function getdeadline(){
		return $this->_deadline;
	}
	
	public function getcompleted(){
		return $this->_completed;
	}
	
	
	
	public function setid($id){
		if(($id !== null) && (!is_numeric($id) || $id <= 0 || $id > 9223372836854775807 || $this->_id !== null)){
			throw new Taskexception("Task id error");
		}
		$this->_id = $id;
	}
	
	public function settitle($title){
		if(strlen($title) < 0 || strlen($title) > 255){
			throw new Taskexception("Task title error");
		}
		$this->_title = $title;
	}
	
	public function setdescription($description){
		if((strlen($description) !== null) && (strlen($description) > 16777215)){
			throw new Taskexception("Task description error");
		}
		$this->_description = $description;
	}
	
	public function setdeadline($deadline){
		if(($deadline !== null) && date_format(date_create_from_format('d/m/Y H:i', $deadline), 'd/m/Y H:i') != $deadline){
			throw new Taskexception("Task deadline error");
		}
		$this->_deadline = $deadline;
	}
	
	public function setcompleted($completed){
		if(strtoupper($completed) !== 'Y' && strtoupper($completed) !== 'N'){
			throw new Taskexception("completed must be Y or N");
		}
		$this->_completed = $completed;
	}
	
	
      public function returntaskarray(){
    	 $task = array();
		 $task['id'] = $this->getid();
		 $task['title'] = $this->gettitle();
		 $task['description'] = $this->getdescription();
		 $task['deadline'] = $this->getdeadline();
		 $task['completed'] = $this->getcompleted();
		 
		  return $task;
	    }
		 
}
	
	
	
	
	