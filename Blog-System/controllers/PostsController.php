<?php

class PostsController extends BaseController {
	private $db;
	
    public function onInit() {
        $this->title = "Posts";
		$this->db = new PostsModel();
    }

    public function index() {
    	 $this->posts = $this->db->getAll();
    }
	
	public function newPost() {
		$this->authorize();
		$this->title = "New Post";
		if ($this->isPost) {
			$username = $_SESSION['username'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$tags = $_POST['tags'];
			$resultTags = preg_split("/[\s,]+/", $tags);					
			if($title != null && $description != null) {
				if($this->db->createPost($username, $title, $description,$resultTags)) {
					$this->addInfoMessage("Successful create new post!");
					//$this->redirect("posts");
				}
			}
			else {
				$this->addErrorMessage("Title and Description are required");
			}
		}
	}
	
	public function post($id){
		$postId = intval($id);	
		$this->title = "Post";
		if($postId > 0) {
			$this->posts = $this->db->getPost($postId);
			
			$this->comments = $this->db->getComment($postId);
		}
		else {
			$this->redirect('posts');
		}	
	}
	
	public function addComment($id){
		$postId = intval($id);
		if($postId > 0){
			if($this->isPost) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$comment = $_POST['content'];
				if($email != null){
					if($this->db->addComment($postId, $name, $email, $comment)){
						$this->addInfoMessage("Successful create new comment!");
						$this->redirectToPost($postId);
					}
				}
				if($this->db->addComment($postId, $name, $email = null, $comment)){
					$this->addInfoMessage("Successful create new comment!");
					$this->redirectToPost($postId);
				}		
			}
		}
	 }
}
