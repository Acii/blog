<?php

class PostsModel extends BaseModel {
    public function getAll() {
		$statement = self::$db->query(
			"SELECT posts.id, posts.title, posts.description, posts.dataCreate, users.name FROM posts JOIN users ON posts.authorId = users.id ORDER BY posts.id");
		$result = $statement->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
	
    public function getPost($id) {
        $statementPost = self::$db->prepare(
            "SELECT posts.id, posts.title, posts.description, posts.dataCreate, users.name FROM posts JOIN users ON posts.authorId = users.id WHERE posts.id = ?");
        $statementPost->bind_param("i", $id);
		$statementPost->execute();
		$resultSetPost = $statementPost->get_result();
        return $resultSetPost->fetch_all(MYSQLI_ASSOC);
    }
	
	public function createPost($username, $title, $description) {
		$statement = self::$db->prepare("SELECT COUNT(id) FROM posts WHERE title = ?");
		$statement->bind_param("s",$title);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		if($result['COUNT(id)']) {
			return FALSE;
		}
		$userStatement = self::$db->prepare("SELECT id FROM users WHERE name = ?");
		$userStatement->bind_param("s", $username);
		$userStatement->execute();
		$resultUser = $userStatement->get_result()->fetch_assoc();
		var_dump($resultUser['id']);
		
		$postStatement = self::$db->prepare(
            "INSERT INTO posts (title, description, authorId) VALUES(?,?,?)");
        $postStatement->bind_param("ssi", $title, $description, $resultUser['id']);
        $postStatement->execute();
		return TRUE;
	}
	
	 public function getComment($id) {
	 	$statementComments = self::$db->prepare(
            "SELECT * FROM comments WHERE postId = ?");
        $statementComments->bind_param("i", $id);
		$statementComments->execute();
		$resultSetComments = $statementComments->get_result();
		
		return $resultSetComments->fetch_all(MYSQLI_ASSOC);
	 }
	 
	 public function addComment($postId, $name, $email, $comment ){
	 	if($postId == '' || $name == '' || $comment == ''){
	 		return FALSE;
	 	}
		$statement = self::$db->prepare(
            "INSERT INTO comments VALUES(NULL, ?,?,?,?)");
        $statement->bind_param("sssi", $name, $email, $comment, $postId);
        $statement->execute();
        return $statement->affected_rows > 0;
	 }
	 
}
