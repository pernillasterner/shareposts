<?php 
class Post {
  private $db;

  public function __construct()
  {
    // Initialize database
    $this->db = new Database;
  }

  public function getPosts()
  {
    // Get the posts associated with current user
    $this->db->query('SELECT *, 
                      posts.id as postID,
                      users.id as userID,
                      posts.created_at as postCreated,
                      users.created_at as userCreated
                      FROM posts
                      INNER JOIN users
                      ON posts.user_id = users.id
                      ORDER BY posts.created_at DESC
                      ');

    // Return more than one row
    $results = $this->db->resultSet();
    return $results;
  }
}