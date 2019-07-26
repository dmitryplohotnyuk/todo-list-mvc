<?php

namespace ToDoList;

class Task implements TaskInterface
{
    private $id;
    private $username;
    private $email;
    private $content;
    private $status;
    private $isEdit;
  

    private $connection;

    public function __CONSTRUCT(Array $props)
    {
        $this->setInfo($props);
        $this->connection = Connection::getConnection();
    }

    public function insert(): void
    {
        $result = mysqli_query($this->connection, "INSERT INTO list (username, email, content) 
                                VALUES ('$this->username', '$this->email', '$this->content')
                            ");
        if (!$result) {
            throw new \Exception(mysqli_error($this->connection));
        }
    }

    public function update(): void
    {
        $result = mysqli_query($this->connection, "UPDATE list SET username = '$this->username', 
                                email = '$this->email', content = '$this->content', 
                                status = '$this->status', isEdit = '$this->isEdit' WHERE id = $this->id
                            ");
        if (!$result) {
            throw new \Exception(mysqli_error($this->connection));
        }
    }

    public function delete(): void
    {
        $result = mysqli_query($this->connection, "DELETE FROM list WHERE id = $this->id");
        if (!$result) {
            throw new \Exception(mysqli_error($this->connection));
        }
    }

    public function setInfo(Array $props): void
    {
        $this->id = $props['id'];
        $this->username = $props['username'];
        $this->email = $props['email'];
        $this->content = $props['content'];
        $this->status = $props['status'];
        $this->isEdit = $props['isEdit'];
    }

    public function getInfo(): Array
    {
       $result = ['id' => $this->id, 'username' => $this->username, 'email' => $this->email, 
                'content' => $this->content, 'status' => $this->status, 'isEdit' => $this->isEdit];
        return $result;
    }

}
