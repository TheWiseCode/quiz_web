<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-31 00:43:03 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 00:43:05 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 00:59:33 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::query() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 160
ERROR - 2022-01-31 01:00:40 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::query() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 160
ERROR - 2022-01-31 01:01:22 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::query() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 160
ERROR - 2022-01-31 01:13:08 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 167
ERROR - 2022-01-31 01:13:25 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 167
ERROR - 2022-01-31 01:14:06 --> Severity: error --> Exception: syntax error, unexpected '$result_nota' (T_VARIABLE) C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 01:14:14 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 171
ERROR - 2022-01-31 01:14:23 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 188
ERROR - 2022-01-31 01:14:25 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 188
ERROR - 2022-01-31 01:15:18 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 01:16:50 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 01:17:12 --> Severity: error --> Exception: syntax error, unexpected ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 168
ERROR - 2022-01-31 01:17:18 --> Query error: Unknown column 'Historia' in 'where clause' - Invalid query: select  sq.quiz_name , sr.score_obtained 
                from savsoft_result sr
                inner join savsoft_quiz sq on sq.quid = sr.quid 
                where categories =Historia  and uid =196
ERROR - 2022-01-31 01:17:18 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\controllers\Result.php 169
ERROR - 2022-01-31 01:42:07 --> Severity: error --> Exception: syntax error, unexpected '$cont_f' (T_VARIABLE) C:\xampp\htdocs\quiz_web\application\controllers\Result.php 185
ERROR - 2022-01-31 02:02:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:02:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:04:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:04:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:05:06 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:05:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:05:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 265
ERROR - 2022-01-31 02:07:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:07:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:08:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:08:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:08:34 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:08:34 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\controllers\Result.php 266
ERROR - 2022-01-31 02:23:56 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\controllers\Result.php 287
ERROR - 2022-01-31 09:10:54 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 193
ERROR - 2022-01-31 10:02:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'b.gid=2
         group by b.uid 
        order by b.last_name' at line 6 - Invalid query: 
        select a.rid ,a.quid ,c.group_name,b.*
        from savsoft_result as a
        inner join savsoft_users as b
        inner join savsoft_group as c 
   
        where a.uid = b.uid and c.gid =b.gidand b.gid=2
         group by b.uid 
        order by b.last_name 
        
ERROR - 2022-01-31 10:02:04 --> Severity: error --> Exception: Call to a member function result_Array() on boolean C:\xampp\htdocs\quiz_web\application\controllers\Result.php 158
ERROR - 2022-01-31 10:13:48 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 199
ERROR - 2022-01-31 10:13:48 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 200
ERROR - 2022-01-31 10:13:48 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 199
ERROR - 2022-01-31 10:13:48 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 200
ERROR - 2022-01-31 10:23:13 --> Severity: error --> Exception: syntax error, unexpected '"', expecting ',' or ')' C:\xampp\htdocs\quiz_web\application\controllers\Result.php 188
ERROR - 2022-01-31 10:23:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sq.quid=0' at line 4 - Invalid query: select  sq.quiz_name , sr.score_obtained 
                    from savsoft_result sr
                    inner join savsoft_quiz sq on sq.quid = sr.quid 
                    where categories ='Historia'  and uid =196and sq.quid=0
ERROR - 2022-01-31 10:23:24 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\controllers\Result.php 190
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:40 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 196
ERROR - 2022-01-31 10:23:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\controllers\Result.php 197
ERROR - 2022-01-31 10:27:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sq.quid=9' at line 4 - Invalid query: select  sq.quiz_name , sr.score_obtained 
                    from savsoft_result sr
                    inner join savsoft_quiz sq on sq.quid = sr.quid 
                    where categories ='Ingles'  and uid =196and sq.quid=9
ERROR - 2022-01-31 10:27:01 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\controllers\Result.php 201
