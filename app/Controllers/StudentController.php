<?php

namespace App\Controllers;
use App\Models\Student;
use App\Core\Request;
use App\Core\Validator;

class StudentController extends Controller
{
    public function index(){
        echo "You are in Student Controller";
        $studentModel = new Student();
        $students = $studentModel->getAll();
        // return require "../app/views/students/show.php";
        return $this->view('/students/show',[
            'students' => $students
        ]);
    }


    public function create(){
        // require "../app/views/students/create.php";
        return $this->view('/students/create');
    }

    public function store(){
        $request = new Request();
        // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // header("Location: /public/student/create");
            if($request->method() !== 'POST'){
             return $this->redirect("/public/student/create");
        
        }
        $data = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'age' => $request->post('age'),
            'gender' => $request->post('gender')
        ];
    
        $errors = Validator::validate($data, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer'],
            'gender' => ['required']
        ]);
    
        if (!empty($errors)) {
            return $this->view('students/create', [
                'errors' => $errors,
                'data' => $data
            ]);
        }

        // $name = $_POST["name"];
        // $email = $_POST["email"];
        // $age = $_POST["age"];
        // $gender = $_POST["gender"];
        // echo "<pre>";
        // print_r($_SERVER);

        // $name = $request->post("name");
        // $email = $request->post("email");
        // $age = $request->post("age");
        // $gender = $request->post("gender");
        $studentModel = new Student();
        $studentModel->add($data['name'] ,$data['email'] ,$data['age'] ,$data['gender']);
        // header("Location: /public/student/");
        $this->redirect("/public/student/");    
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
        // require "../app/views/students/edit.php";
        $this->view("/students/edit",[
            's' => $s
        ]);
    }

    public function update($id){    

        // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //     header("Location: /public/student/edit/$id");
        //     exit;
        // }
        $request = new Request();
        if($request->method() !== "POST"){
            $this->redirect("/public/student/edit/$id");
        }
        
        // $name = $_POST["name"];
        // $email = $_POST["email"];
        // $age = $_POST["age"];
        // $gender = $_POST["gender"];
        $name = $request->post("name");
        $email = $request->post("email");
        $age = $request->post("age");
        $gender = $request->post("gender");

        $studentModel = new Student();
        $studentModel->update($id,$name, $email, $age, $gender);
        // header("Location: /public/student/");
        // exit();
        $this->redirect("/public/student/");
    }

    public function delete($id){
        $studentModel = new Student();
        $studentModel->delete($id);
        // header("Location: /public/student/");
        $this->redirect('/public/student/');
    }
}