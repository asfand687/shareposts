<?php
  class Post{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPosts($limit='', $start=''){
      $this->db->query('SELECT *,
                      posts.id as postId,
                      users.id as userId,
                      posts.created_at as postCreated,
                      users.created_at as userCreated
                       FROM posts
                       INNER JOIN users
                       ON posts.user_id = users.id
                       ORDER BY posts.created_at DESC
                       LIMIT :start, :limit');
      $this->db->bind(':start', $start);
      $this->db->bind(':limit', $limit);

      $results = $this->db->resultSet();

      return $results;
    }

    public function addPost($data){
      $this->db->query('INSERT INTO posts (user_id, title, body) VALUES(:user_id, :title, :body)');
      // Bind values
      $this->db->bind(':user_id', $data['user_id']);            
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePost($data){
      $this->db->query('UPDATE posts SET `title`= :title, `body`= :body WHERE `id`= :id');
      // Bind values
      $this->db->bind(':id', $data['id']);            
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE `id` = :id');
      // Bind Values
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      
      return $row;
    }

    public function deletePost($id){
      $this->db->query('DELETE FROM posts WHERE `id` = :id');
      // Bind Values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAllRows(){
      $this->db->query('SELECT * from users');
      $this->db->execute();
      return $this->db->rowCount();
    }
  }