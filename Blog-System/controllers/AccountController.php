<?php 

class AccountController extends BaseController {
	private $db;
	
	public function OnInit(){
		$this->db = new AccountModel();
	}
	
	public function register() {
		if($this->isPost){
			
			$name = $_POST['username'];
			if(strlen($name) < 3){
				$this->addErrorMessage("The username lenght should be greater than 3");
				return $this->renderView(__FUNCTION__);
			}
			
			$password = $_POST['password'];
			if(strlen($password) < 3) {
				$this->addErrorMessage("The password lenght should be greater than 3");
				return $this->renderView(__FUNCTION__);
			}
			
			$cpassword = $_POST['confirmPassword'];
			if(strlen($cpassword) < 3) {
				$this->addErrorMessage("The password lenght should be greater than 3");
				return $this->renderView(__FUNCTION__);
			}
			
			if($password != $cpassword){
				$this->addErrorMessage("The passwords don't match");
				return $this->renderView(__FUNCTION__);
			}
			
			if($this->db->register($name, $password)){
				$_SESSION['username'] = $name;
				$this->addInfoMessage("Successful register!");
				$this->redirect("posts");
			}
			else {
				$this->addErrorMessage("Username there!");
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
