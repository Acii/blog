<?php 
class HomeModel extends BaseModel {

	public function getHomePosts() {
		$statement = self::$db->prepare(
			"SELECT posts.id, posts.title, posts.description, posts.dataCreate, users.name FROM posts 
			INNER JOIN users ON posts.authorId = users.id
			ORDER BY posts.dataCreate DESC
			LIMIT 5");
		$statement->execute();
		$result = $statement->get_result();
		
        return $result->fetch_all(MYSQLI_ASSOC);		 
	 }
}