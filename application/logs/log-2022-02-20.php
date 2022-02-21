<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-20 19:46:37 --> Severity: Warning --> Division by zero C:\xampp\htdocs\cridai_new_dev\quiz_web\application\views\dashboard.php 198
ERROR - 2022-02-20 20:08:35 --> Query error: Unknown column 'a.user_status' in 'where clause' - Invalid query: SELECT su.id_speciality id,e.name, COUNT(*) cantidad
        FROM savsoft_users su 
        inner join specialties as e on e.id=su.id_speciality
        WHERE a.user_status = "active"
        GROUP by su.id_speciality
        ORDER by e.name ASC
ERROR - 2022-02-20 20:08:35 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\cridai_new_dev\quiz_web\application\controllers\User.php 881
