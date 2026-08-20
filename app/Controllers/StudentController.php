<?php

namespace App\Controllers;
use App\models\Student;


class StudentController extends Controller
{
    public function index(){
        echo "You are in Student Controller";
        $studentModel = new Student();
        $students = $studentModel->getAll();
        // return require "../app/views/students/show.php";
        return $this->view('/students/show');
    }


    public function create(){
        require "../app/views/students/create.php";
    }

    public function store(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /public/student/create");
            exit;
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        // echo "<pre>";
        // print_r($_SERVER);
        $studentModel = new Student();
        $studentModel->add($name,$email,$age,$gender);
        header("Location: /public/student/");
    }

    public function edit($id){
        $studentModel = new Student();
        $students = $studentModel->getAll();
        foreach($students as $student){
            if($student["student_id"] == $id){
                $s = $student;
                break;
            }
        }
        require "../app/views/students/edit.php";
    }

    public function update($id){

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /public/student/edit/$id");
            exit;
        }
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];

        $studentModel = new Student();
        $studentModel->update($id,$name, $email, $age, $gender);
        header("Location: /public/student/");
        exit();
    }

    public function delete($id){
        $studentModel = new Student();
        $studentModel->delete($id);
        header("Location: /public/student/");
        // $this->redirect('/public/student/');
    }
}