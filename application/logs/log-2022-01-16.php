<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-16 17:03:51 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:06:22 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:29:49 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:29:53 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:33:32 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:36:52 --> Severity: Warning --> Division by zero C:\xampp\htdocs\quiz_web\application\views\dashboard.php 217
ERROR - 2022-01-16 17:37:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 60
ERROR - 2022-01-16 17:37:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 74
ERROR - 2022-01-16 17:37:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 94
ERROR - 2022-01-16 17:37:03 --> Severity: Warning --> Missing argument 1 for User::get_expiry2(), called in C:\xampp\htdocs\quiz_web\system\core\CodeIgniter.php on line 532 and defined C:\xampp\htdocs\quiz_web\application\controllers\User.php 637
ERROR - 2022-01-16 17:37:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 60
ERROR - 2022-01-16 17:37:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 74
ERROR - 2022-01-16 17:37:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\new_user2.php 94
ERROR - 2022-01-16 17:37:10 --> Severity: Warning --> Missing argument 1 for User::get_expiry2(), called in C:\xampp\htdocs\quiz_web\system\core\CodeIgniter.php on line 532 and defined C:\xampp\htdocs\quiz_web\application\controllers\User.php 637
ERROR - 2022-01-16 18:04:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 573
ERROR - 2022-01-16 18:27:45 --> Severity: Compile Error --> Cannot redeclare User::index() C:\xampp\htdocs\quiz_web\application\controllers\User.php 46
ERROR - 2022-01-16 18:36:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:39:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:39:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:40:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:40:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:41:04 --> Query error: Not unique table/alias: 'account_type' - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` ON `savsoft_users`.`su`=`account_type`.`account_id`
JOIN `account_type` ON `savsoft_users`.`su`!=2
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:41:04 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 374
ERROR - 2022-01-16 18:41:13 --> Query error: Not unique table/alias: 'account_type' - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` ON `savsoft_users`.`su`=`account_type`.`account_id`
JOIN `account_type` ON `savsoft_users`.`su` !=2
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:41:13 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 374
ERROR - 2022-01-16 18:41:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:41:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:42:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:42:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:46:54 --> Query error: Not unique table/alias: 'account_type' - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` ON `savsoft_users`.`su`=`account_type`.`account_id`
JOIN `account_type` ON `savsoft_users`.`su`!=1
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:46:54 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 349
ERROR - 2022-01-16 18:47:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1)
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30' at line 4 - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` USING (1)
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:47:33 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 349
ERROR - 2022-01-16 18:47:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1)
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30' at line 4 - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` USING (1)
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:47:37 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 349
ERROR - 2022-01-16 18:48:58 --> Query error: Not unique table/alias: 'account_type' - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` ON `savsoft_users`.`su`!=1
JOIN `account_type` ON `savsoft_users`.`su`=`account_type`.`account_id`
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 18:48:58 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 350
ERROR - 2022-01-16 18:51:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:55:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:55:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:55:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 18:55:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 144
ERROR - 2022-01-16 18:55:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 219
ERROR - 2022-01-16 19:02:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:05:45 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:10:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 537
ERROR - 2022-01-16 19:10:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:12:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:12:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:19:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:20:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:22:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:23:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 144
ERROR - 2022-01-16 19:23:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 219
ERROR - 2022-01-16 19:23:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:23:45 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 19:23:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:24:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 144
ERROR - 2022-01-16 19:24:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 219
ERROR - 2022-01-16 19:24:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:25:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 144
ERROR - 2022-01-16 19:25:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 219
ERROR - 2022-01-16 19:26:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:26:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:26:49 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 19:26:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:29:11 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 19:29:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:32:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:32:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:32:18 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:36:33 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:36:52 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:37:54 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:38:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 866
ERROR - 2022-01-16 19:38:01 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:38:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:38:14 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:38:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:39:05 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:39:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:39:17 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:39:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:39:20 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:39:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:39:23 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:39:55 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:39:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:40:00 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:40:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:40:09 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:40:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 19:40:21 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 19:40:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:05:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:07:05 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:13:36 --> Query error: Unknown column 'savsoft_group' in 'where clause' - Invalid query: SELECT *
FROM `savsoft_users`
WHERE `savsoft_group` = 'savsoft_users.su!= 1'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 22:13:36 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 351
ERROR - 2022-01-16 22:15:21 --> Query error: Unknown column 'savsoft_users' in 'where clause' - Invalid query: SELECT *
FROM `savsoft_users`
WHERE `savsoft_users` = 'savsoft_users.su!= 1'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 22:15:21 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 353
ERROR - 2022-01-16 22:17:21 --> Query error: Unknown column 'savsoft_users' in 'where clause' - Invalid query: SELECT *
FROM `savsoft_users`
WHERE `savsoft_users` = 'savsoft_users.su!= 1'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 22:17:21 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 353
ERROR - 2022-01-16 22:20:27 --> Query error: Unknown column 'savsoft_users' in 'where clause' - Invalid query: SELECT *
FROM `savsoft_users`
WHERE `savsoft_users` = 'savsoft_users.su!= 1'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 22:20:27 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 353
ERROR - 2022-01-16 22:23:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:23:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:26:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 116
ERROR - 2022-01-16 22:34:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 122
ERROR - 2022-01-16 22:34:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 122
ERROR - 2022-01-16 22:36:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 122
ERROR - 2022-01-16 22:36:32 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 22:36:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:36:51 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 22:36:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:39:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:40:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:40:19 --> Severity: Compile Warning --> Unterminated comment starting line 146 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 146
ERROR - 2022-01-16 22:40:43 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:41:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:41:05 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:41:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:41:11 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:41:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:41:26 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:41:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:42:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 606
ERROR - 2022-01-16 22:42:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:42:24 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:43:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 871
ERROR - 2022-01-16 22:43:17 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:43:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:43:22 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:43:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:44:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:44:21 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:44:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:46:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:46:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:46:56 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:46:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:47:00 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:47:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:48:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:49:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:49:09 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:50:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:52:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:52:56 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:53:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:53:03 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:53:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:53:10 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:53:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 22:53:18 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 22:53:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\user_list2.php 120
ERROR - 2022-01-16 23:17:14 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:20:30 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:35:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''Active'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30' at line 6 - Invalid query: SELECT *
FROM `savsoft_users`
JOIN `savsoft_group` ON `savsoft_users`.`gid`=`savsoft_group`.`gid`
JOIN `account_type` ON `savsoft_users`.`su`=`account_type`.`account_id`
WHERE `savsoft_users`.`su` != 1
AND `savsoft_users`.`user_status` = `=` 'Active'
ORDER BY `savsoft_users`.`uid` DESC
 LIMIT 30
ERROR - 2022-01-16 23:35:00 --> Severity: error --> Exception: Call to a member function result_array() on boolean C:\xampp\htdocs\quiz_web\application\models\User_model.php 357
ERROR - 2022-01-16 23:36:12 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:38:06 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:38:30 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:38:32 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:38:59 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:41:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 608
ERROR - 2022-01-16 23:41:47 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:42:36 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:42:52 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:43:53 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:46:07 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:46:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 873
ERROR - 2022-01-16 23:46:25 --> Severity: Compile Warning --> Unterminated comment starting line 141 C:\xampp\htdocs\quiz_web\application\views\edit_user_admin.php 141
ERROR - 2022-01-16 23:49:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 546
ERROR - 2022-01-16 23:49:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 144
ERROR - 2022-01-16 23:49:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\views\profile.php 219
ERROR - 2022-01-16 23:49:19 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 23:49:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 816
ERROR - 2022-01-16 23:49:29 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 23:49:39 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 23:49:45 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\quiz_web\application\models\User_model.php 816
ERROR - 2022-01-16 23:49:45 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 23:49:53 --> Severity: Compile Warning --> Unterminated comment starting line 190 C:\xampp\htdocs\quiz_web\application\views\edit_user.php 190
ERROR - 2022-01-16 23:52:36 --> Could not find the language line "edit_group"
