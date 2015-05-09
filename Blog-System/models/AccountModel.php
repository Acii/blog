<?php

class AccountModel extends BaseModel {
	
	public function register($username, $password) {
		$statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE name = ?");
		$statement->bind_param("s",$username);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		
		if($result['COUNT(id)']) {
			return FALSE;
		}
		
		$hash_password = password_hash($password, PASSWORD_BCRYPT);
		
		$registerStatement = self::$db->prepare('INSERT INTO users (name, passHash) VALUES (?, ?)');
		$registerStatement->bind_param("ss",$username,$hash_password);
		$registerStatement->execute();
		
		return TRUE;
	}
	
	public function login($username, $password) {
		$statement = self::$db->prepare("SELECT id, name, passHash FROM users WHERE name = ?");
		$statement->bind_param("s",$username);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		
		if(password_verify($password, $result['passHash'])){
			return TRUE;
		}
		
		return FALSE;
	}
		
}
