<?php

class PostsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM posts ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    // public function createAuthor($name) {
        // if ($name == '') {
            // return false;
        // }
        // $statement = self::$db->prepare(
            // "INSERT INTO authors VALUES(NULL, ?)");
        // $statement->bind_param("s", $name);
        // $statement->execute();
        // return $statement->affected_rows > 0;
    // }
// 
    public function getPost($id) {
        $statementPost = self::$db->prepare(
            "SELECT * FROM posts WHERE id = ?");
        $statementPost->bind_param("i", $id);
		$statementPost->execute();
		$resultSetPost = $statementPost->get_result();
		$statementComments = self::$db->prepare(
            "SELECT * FROM comments WHERE postId = ?");
        $statementComments->bind_param("i", $id);
		$statementComments->execute();
		$resultSetComments = $statementComments->get_result();
		$result['post'] = $resultSetPost->fetch_all();
		$result['comments'] = $resultSetComments->fetch_all();
		//var_dump($result);
		
        return $result;
    }
}
