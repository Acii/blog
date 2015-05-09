<?php

class PostsModel extends BaseModel {
	
	public function getFilterdPosts($from, $size) {
		$statement = self::$db->prepare(
			"SELECT posts.id, posts.title, posts.description, posts.dataCreate, users.name FROM posts 
			INNER JOIN users ON posts.authorId = users.id
			LIMIT ?,?");
		$statement->bind_param("ii", intval($from), intval($size));
		$statement->execute();
		$result = $statement->get_result();
		
        return $result->fetch_all(MYSQLI_ASSOC);		 
	 }
	
    public function getPost($id) {
        $statementPost = self::$db->prepare(
            "SELECT posts.id, posts.title, posts.description, posts.dataCreate, users.name FROM posts 
            JOIN users ON posts.authorId = users.id WHERE posts.id = ?");
        $statementPost->bind_param("i", $id);
		$statementPost->execute();
		$resultSetPost = $statementPost->get_result();
		
        return $resultSetPost->fetch_all(MYSQLI_ASSOC);
    }
	
	public function createPost($username, $title, $description,$tags) {
		$statement = self::$db->prepare("SELECT COUNT(id) FROM posts WHERE title = ?");
		$statement->bind_param("s",$title);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		
		if($result['COUNT(id)']) {
			return FALSE;
		}
		
		$tagsId = "";
		$i = 0;
		
		foreach ($tags as $tag) {
			$tagStatement = self::$db->prepare("SELECT id FROM tags WHERE title = ?");
			$tagStatement->bind_param("s",$tag);
			$tagStatement->execute();
			$resultTag = $tagStatement->get_result()->fetch_assoc();
			
			if($resultTag != null) {
				$tagsId[$i] = $resultTag;
				$i++;
			} else {
				$createTagStatement = self::$db->prepare("INSERT INTO tags(title) VALUE(?)");
				$createTagStatement->bind_param("s", $tag);
				$createTagStatement->execute();
				
				$selectNewTagStatement = self::$db->prepare("SELECT id FROM tags WHERE title = ?");
				$selectNewTagStatement->bind_param("s",$tag);
				$selectNewTagStatement->execute();
				$tagsId[$i] = $selectNewTagStatement->get_result()->fetch_assoc();
				$i++;
			}
			
		}

		$userStatement = self::$db->prepare("SELECT id FROM users WHERE name = ?");
		$userStatement->bind_param("s", $username);
		$userStatement->execute();
		$resultUser = $userStatement->get_result()->fetch_assoc();

		$postStatement = self::$db->prepare(
            "INSERT INTO posts (title, description, authorId) VALUES(?,?,?)");
        $postStatement->bind_param("ssi", $title, $description, $resultUser['id']);
        $postStatement->execute();
		
		$newPostStatement = self::$db->prepare("SELECT id FROM posts WHERE title = ?");		
		$newPostStatement->bind_param("s", $title);
		$newPostStatement->execute();
		$resultNewPost = $newPostStatement->get_result()->fetch_assoc();
		
		foreach ($tagsId as $tagId) {
			$postsTagsStatement = self::$db->prepare(
            	"INSERT INTO poststags (postId, tagId) VALUES(?,?)");
       		 $postsTagsStatement->bind_param("ii", $resultNewPost['id'], $tagId['id']);
       		 $postsTagsStatement->execute();
		}
		
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
	 public function getTags($postId) {
	 	$statementTag = self::$db->prepare(
            "SELECT poststags.postId, tags.title FROM poststags 
            JOIN tags ON poststags.tagId = tags.id WHERE poststags.postId = ?");
		$statementTag->bind_param("i", $postId);
		$statementTag->execute();
		$resultTag = $statementTag->get_result();
		
        return $resultTag->fetch_all(MYSQLI_ASSOC);
	 }
}
