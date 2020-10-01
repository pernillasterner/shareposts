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

  public function addPost($data)
  {
    $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');

    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}