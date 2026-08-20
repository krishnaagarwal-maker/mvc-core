<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

    <h3>Students List</h3>
    <table border="2">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>age</td>
            <td>gender</td>
        </tr>
        
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['student_id']?> </td>
                <td><?php echo $student['name']?> </td>
                <td><?php echo $student['email']?> </td>
                <td><?php echo $student['age']?> </td>
                <td><?php echo $student['gender']?> </td>
                <td><a href="/public/student/edit/<?php echo $student["student_id"]?>">Edit</a></td>
                <td><a href="/public/student/delete/<?php echo $student["student_id"] ?>">Delete</a></td>
            </tr>
 
            
            <?php endforeach; ?>
        </table> 
        <a href="/public/student/create">Add new Student</a>   

</body>
</html>