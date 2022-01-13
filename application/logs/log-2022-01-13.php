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
