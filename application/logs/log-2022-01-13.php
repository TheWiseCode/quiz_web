<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-13 01:57:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 110
ERROR - 2022-01-13 01:57:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 199
ERROR - 2022-01-13 02:16:16 --> Severity: error --> Exception: syntax error, unexpected 'isValid' (T_STRING), expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 806
ERROR - 2022-01-13 02:16:25 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW) C:\xampp\htdocs\quiz_web\application\controllers\User.php 653
ERROR - 2022-01-13 02:16:43 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW) C:\xampp\htdocs\quiz_web\application\controllers\User.php 653
ERROR - 2022-01-13 02:17:16 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW) C:\xampp\htdocs\quiz_web\application\controllers\User.php 653
ERROR - 2022-01-13 02:17:31 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 817
ERROR - 2022-01-13 02:17:41 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 811
ERROR - 2022-01-13 02:17:48 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 801
ERROR - 2022-01-13 02:18:30 --> Severity: error --> Exception: syntax error, unexpected 'isValid' (T_STRING), expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 803
ERROR - 2022-01-13 02:18:45 --> Severity: error --> Exception: syntax error, unexpected 'isValid' (T_STRING), expecting function (T_FUNCTION) C:\xampp\htdocs\quiz_web\application\models\User_model.php 803
ERROR - 2022-01-13 02:27:32 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 452
ERROR - 2022-01-13 08:24:28 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL), expecting end of file C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 2
ERROR - 2022-01-13 08:24:45 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL), expecting end of file C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 2
ERROR - 2022-01-13 08:25:09 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL), expecting end of file C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 2
ERROR - 2022-01-13 08:25:25 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL), expecting end of file C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 2
ERROR - 2022-01-13 08:25:51 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL), expecting end of file C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 2
ERROR - 2022-01-13 08:26:34 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 08:27:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 452
ERROR - 2022-01-13 08:32:11 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:32:11 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 27
ERROR - 2022-01-13 08:33:00 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:33:01 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 27
ERROR - 2022-01-13 08:33:11 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:33:11 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:33:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:34:18 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:34:18 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:34:18 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:34:34 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:34:34 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:34:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:34:38 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:34:38 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:34:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:34:58 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:34:58 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:34:58 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:35:07 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:35:07 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:35:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:36:03 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:36:03 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:36:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:36:42 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:36:42 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:36:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:37:01 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:37:01 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:37:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:37:48 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:37:48 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:37:48 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:38:26 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:38:26 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 27
ERROR - 2022-01-13 08:38:29 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:38:29 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:38:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:38:49 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:38:49 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:38:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:38:53 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:38:53 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:38:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:39:01 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 08:39:04 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:39:04 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:39:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:39:17 --> Could not find the language line "hello"
ERROR - 2022-01-13 08:39:17 --> Could not find the language line "user_id"
ERROR - 2022-01-13 08:39:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 08:39:43 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:39:45 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 27
ERROR - 2022-01-13 08:40:39 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:45:18 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:45:18 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 24
ERROR - 2022-01-13 08:45:20 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:45:21 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 24
ERROR - 2022-01-13 08:45:24 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 08:45:27 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:45:27 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Appointment_model.php 24
ERROR - 2022-01-13 08:45:41 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 08:45:54 --> Query error: Unknown column 'B.first_name' in 'field list' - Invalid query: 
		select A.*, B.first_name as requested_by_name, B.skype_id as requested_by_skype
		, C.first_name as appointed_to_name, C.skype_id as appointed_to_skype
		 from appointment_request as A
		JOIN savsoft_users as B on B.uid=A.request_by
		JOIN savsoft_users as C on C.uid=A.to_id
		 order by A.appointment_timing DESC
		limit 0,30
		
ERROR - 2022-01-13 08:49:02 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 08:49:31 --> Query error: Unknown column 'name' in 'field list' - Invalid query: INSERT INTO `savsoft_users` (`email`, `password`, `ci`, `exp`, `name`, `last_name`, `cod_student`, `first_opt_univ_degree`, `second_opt_univ_degree`, `contact_no`, `gid`, `subscription_expired`, `su`) VALUES ('admin@gmail.net', '48b88b33720f58a1197b96e456dae0de', '12231', 'daw', 'wad', '1231', 'wa213', 'wd12', '213', '21321', '1', 1957372200, '1')
ERROR - 2022-01-13 08:52:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\models\User_model.php 452
ERROR - 2022-01-13 03:23:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 03:23:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 07:30:12 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 07:30:34 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 07:31:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 141
ERROR - 2022-01-13 07:31:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 219
ERROR - 2022-01-13 07:31:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 141
ERROR - 2022-01-13 07:31:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 219
ERROR - 2022-01-13 07:33:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 141
ERROR - 2022-01-13 07:33:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\savsoftquiz_v5\application\views\profile.php 216
ERROR - 2022-01-13 07:34:18 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 15:12:47 --> Severity: error --> Exception: Too few arguments to function Quiz::edit_quiz(), 0 passed in C:\xampp\htdocs\savsoftquiz_v5\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\savsoftquiz_v5\application\controllers\Quiz.php 103
ERROR - 2022-01-13 15:12:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
GROUP BY `savsoft_result`.`uid`' at line 5 - Invalid query: SELECT `savsoft_result`.`uid`
FROM `savsoft_result`
WHERE `savsoft_result`.`quid` IS NULL
AND `savsoft_result`.`uid` IS NOT NULL
AND `savsoft_result`.`score_obtained` < `IS` `NULL`
GROUP BY `savsoft_result`.`uid`
ERROR - 2022-01-13 15:12:54 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Result_model.php 161
ERROR - 2022-01-13 15:13:03 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:13:03 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:13:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 15:40:02 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 15:40:02 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:40:02 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:40:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 15:40:51 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 15:42:54 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 15:43:09 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:43:09 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:43:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 15:44:25 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 15:44:25 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:44:25 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:44:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 15:44:46 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 15:44:46 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:44:46 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:44:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 15:51:59 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 15:52:02 --> Could not find the language line "hello"
ERROR - 2022-01-13 15:52:02 --> Could not find the language line "user_id"
ERROR - 2022-01-13 15:52:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:00:52 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 16:00:53 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:00:53 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:00:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:03:25 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 16:03:34 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:03:34 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:03:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:03:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'where qid='451'' at line 1 - Invalid query: update savsoft_qbank set    where qid='451'  
ERROR - 2022-01-13 16:03:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'where qid='457'' at line 1 - Invalid query: update savsoft_qbank set    where qid='457'  
ERROR - 2022-01-13 16:04:03 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:04:03 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:04:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:06:31 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 16:06:38 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:06:38 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:06:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:08:10 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 16:08:10 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:08:10 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:08:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:12:18 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 16:12:19 --> Could not find the language line "hello"
ERROR - 2022-01-13 16:12:19 --> Could not find the language line "user_id"
ERROR - 2022-01-13 16:12:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 16:48:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') order by FIELD(savsoft_options.qid,)' at line 1 - Invalid query: select * from savsoft_options where qid in () order by FIELD(savsoft_options.qid,)
ERROR - 2022-01-13 16:48:10 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 327
ERROR - 2022-01-13 16:49:16 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 752
ERROR - 2022-01-13 16:49:16 --> Query error: Unknown column 'NAN' in 'field list' - Invalid query: UPDATE `savsoft_result` SET `total_time` = 0, `end_time` = 1642106956, `score_obtained` = 0, `percentage_obtained` = NAN, `manual_valuation` = 0, `result_status` = 'pass'
WHERE `rid` = 57
ERROR - 2022-01-13 16:49:18 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 16:49:18 --> Severity: error --> Exception: Too few arguments to function Quiz::quiz_detail(), 0 passed in C:\xampp\htdocs\savsoftquiz_v5\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\savsoftquiz_v5\application\controllers\Quiz.php 411
ERROR - 2022-01-13 20:53:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 20:53:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 16:53:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:02 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 23:54:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 23:54:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:54:21 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 23:59:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 23:59:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\helpers\xlsimport\SpreadsheetReader_XLS.php 133
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 19:59:35 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:23 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:34 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:00:36 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:29 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Larga"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Respuesta Corta"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Coincidir Respuestas"
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:40 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:41 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:41 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:41 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:01:41 --> Could not find the language line "Opción Multiple Respuesta Multiple "
ERROR - 2022-01-13 20:08:25 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 161
ERROR - 2022-01-13 20:08:39 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:08:44 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:08:51 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:08:58 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:09:05 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:09:23 --> Severity: Warning --> implode(): Invalid arguments passed C:\xampp\htdocs\savsoftquiz_v5\application\models\Quiz_model.php 200
ERROR - 2022-01-13 20:11:19 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 20:11:20 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:11:20 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:11:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:14:06 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 20:14:06 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:14:06 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:14:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:14:22 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 20:21:57 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 20:22:00 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:22:00 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:22:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:23:14 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:23:14 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:23:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:23:34 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:23:34 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:23:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:25:22 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 20:28:29 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 20:28:30 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:28:30 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:28:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:28:57 --> Severity: Warning --> Division by zero C:\xampp\htdocs\savsoftquiz_v5\application\views\dashboard.php 217
ERROR - 2022-01-13 20:29:53 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\savsoftquiz_v5\system\libraries\Email.php 1896
ERROR - 2022-01-13 20:29:54 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:29:54 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:29:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
ERROR - 2022-01-13 20:30:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'where qid='163'' at line 1 - Invalid query: update savsoft_qbank set    where qid='163'  
ERROR - 2022-01-13 20:30:20 --> Could not find the language line "hello"
ERROR - 2022-01-13 20:30:20 --> Could not find the language line "user_id"
ERROR - 2022-01-13 20:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\savsoftquiz_v5\application\views\view_result.php 357
