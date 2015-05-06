<?php 

class AccountController extends BaseController {
	private $db;
	
	public function OnInit(){
		$this->db = new AccountModel();
	}
	
	public function register() {
		if($this->isPost){
			$name = $_POST['username'];
			if(strlen($name) < 3 || $name == null ){
				$this->addErrorMessage("Username is invalid!");
				$this->redirect("account", 'register');
			}
			$password = $_POST['password'];
			if($this->db->register($name, $password)){
				$_SESSION['username'] = $name;
				$this->addInfoMessage("Successful register!");
				$this->redirect("posts");
			}
			else {
				$this->addErrorMessage("Register failed!");
			}
		}
		$this->renderView(__FUNCTION__);
	}
	
	public function login() {
		if($this->isPost){
			$name = $_POST['username'];
			$password = $_POST['password'];
			
			if($this->db->login($name, $password)){
				$_SESSION['username'] = $name;
				$this->addInfoMessage("Successful login!");
				$this->redirect("posts");
			}
			else {
				$this->addErrorMessage("Login failed!");
			}
		}
		$this->renderView(__FUNCTION__);
	}
	
	public function logout() {
		$this->authorize();
		unset($_SESSION['username']);
		$this->addInfoMessage("Successful logout!");
		$this->redirectToUrl('/');
	}
}
