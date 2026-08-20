 <form action="/public/student/update/<?php echo $s['student_id'] ?>" method="post">
        name <input type="text" name="name" value = <?php echo $s['name']; ?> ><br><br>
        email <input type="email" name="email" value = <?php echo $s['email'];?> ><br><br>
        Age <input type="number" name="age" value = <?php echo $s['age']; ?> ><br><br>
        Gender <input type="gender" name="gender" value = <?php echo $s['gender'];?> ><br><br>
        <button type="submit">update</button>
    </form>

