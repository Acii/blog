<?php

class HomeController extends BaseController {
	private $db;
	
	public function onInit() {
		$this->db = new HomeModel();
    }
	
	public function index() {
		
		$this->posts = $this->db->getHomePosts();
		
		 $this->renderView();
	}

}