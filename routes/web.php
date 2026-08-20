<?php
return [
    '/public/student/create' => ['StudentController', 'create'],
    '/public/hello/' =>['HelloController','index'],
    '/public/student/'=>['StudentController', 'index'],
    '/public/student/store' =>['StudentController' , 'store'],
    '/public/student/edit/{id}' =>['StudentController', 'edit'],
    '/public/student/update/{id}' => ['StudentController', 'update'],
    '/public/student/delete/{id}'=>['StudentController', 'delete']
];

?>