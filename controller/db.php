<?php


class db{
	
	private static $writedbconnection;
	private static $readdbconnection;
	
	public static function connectwritedb(){
		if(self::$writedbconnection === null){
			self::$writedbconnection = new PDO('mysql:host=127.0.0.1;dbname=taskdb;charset=utf8', 'root', 'password', array(PDO::ATTR_TIMEOUT => 5));
			self::$writedbconnection->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$writedbconnection->setattribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		
		return self::$writedbconnection;
	}
	
	public static function connectreaddb(){
		if(self::$readdbconnection === null){
			self::$readdbconnection = new PDO('mysql:host=127.0.0.1;dbname=taskdb;charset=utf8', 'root', 'password', array(PDO::ATTR_TIMEOUT => 5));
			self::$readdbconnection->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$readdbconnection->setattribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		
		return self::$readdbconnection;
	}
	
}
