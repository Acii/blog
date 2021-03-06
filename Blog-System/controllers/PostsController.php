<?php

class PostsController extends BaseController {
	private $db;
	
    public function onInit() {
        $this->title = "Posts";
		$this->db = new PostsModel();
    }

    public function index($page=0, $pageSize=10) {
		$from = $page * $pageSize;
		$this->page = $page;
		$this->pageSize = $pageSize;
    	$this->posts = $this->db->getFilterdPosts(intval($from), intval($pageSize));		 
		 
		 $this->renderView();
    }
	
	public function newPost() {
		$this->authorize();
		$this->title = "New Post";
		
		if ($this->isPost) {
			$username = $_SESSION['username'];
			
			$title = $_POST['title'];
			if(strlen($title) < 5){
				$this->addErrorMessage("The title lenght should be greater than 5");
				return $this->renderView(__FUNCTION__);
			}
			
			$description = $_POST['description'];
			if(strlen($description) < 20){
				$this->addErrorMessage("The description lenght should be greater than 20");
				return $this->renderView(__FUNCTION__);
			}
			
			$tags = $_POST['tags'];
			$resultTags = preg_split("/[\s,]+/", $tags);					
			if($title != null && $description != null) {
				if($this->db->createPost($username, $title, $description,$resultTags)) {
					$this->addInfoMessage("Successful create new post!");
					$this->redirect("posts");
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
			$this->tags = $this->db->getTags($postId);
		}
		else {
			$this->redirect('posts');
		}	
	}
	
	public function addComment($id){
		$postId = intval($id);
		if($postId > 0){
			if($this->isPost) {
				if($_SESSION['username']){
					$name = $_SESSION['username'];
				}
				else {
					$name = $_POST['name'];
				}
				
				if(strlen($name) < 3){
					$this->addErrorMessage("The name lenght should be greater than 3");
					return $this->redirectToPost($id);
				}
				$email = $_POST['email'];
				
				$comment = $_POST['content'];
				if(strlen($comment) < 20){
					$this->addErrorMessage("The comment lenght should be greater than 20");
					return $this->redirectToPost($id);
				}
				
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
