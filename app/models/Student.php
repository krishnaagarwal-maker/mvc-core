<?php

namespace App\models;
use App\models\Models;

class Student extends Models{

    public function getAll(){
    $sql = "SELECT * FROM students";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}


    public function add($name,$email,$age,$gender){
        $sql = "INSERT INTO students(name,email,age,gender) VALUES(?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name,$email,$age,$gender]);
    }

  public function getById($id){
    $sql = "SELECT * from students WHERE id =?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    $stmt->fetch();
  }
  

  public function update($id,$name,$email,$age,$gender){
      $sql="UPDATE students SET name =?, email=?, age=?, gender=? Where student_id =?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$name,$email,$age,$gender,$id]);
    }

    public function delete($id){
        $sql = "DELETE from students where student_id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
