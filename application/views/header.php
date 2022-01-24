<html lang="en">
<head>
    <title> <?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--<link href="<?php /*echo base_url(); */ ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"-->
    <!--type="text/css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/datatables1/datatables.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- custom css -->
    <link href="<?php echo base_url('css/style.css?q=' . time()); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>css/sb-admin-2.min.css" rel="stylesheet">


    <style>
        html, body, h1, h2, h3, h4, p, div, span, ul, li, a {
            direction: <?php echo $this->config->item('direction');?>;
        }

        .btn-default {

            border: 1px solid #c8c4c4;

        }

        form {
            width: 100%;
        }

        .sidebar {
            width: 16rem !important;
        }


        /* h1 {
            font-size: 20px;
            text-align: center;
            margin: 20px 0 20px;
        }
        h1 small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        } */
        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 0%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: #2ca8ff;
        }

        .content.ct-wizard-green .picture:hover {
            border-color: #05ae0e;
        }

        .content.ct-wizard-blue .picture:hover {
            border-color: #3472f7;
        }

        .content.ct-wizard-orange .picture:hover {
            border-color: #ff9500;
        }

        .content.ct-wizard-red .picture:hover {
            border-color: #ff3b30;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src {
            width: 100%;

        }


    </style>
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--<script src="<?php /*echo base_url(); */ ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php /*echo base_url(); */ ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables1/datatables.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>


    <script>
        var base_url = "<?php echo base_url();?>";
    </script>


    <?php
    if (($this->uri->segment(1) . '/' . $this->uri->segment(2)) != 'quiz/attempt') {
        ?>
        <!-- custom javascript -->
        <script src="<?php echo base_url('js/basic.js?q=' . time()); ?>"></script>
        <?php
    }
    ?>
    <!-- firebase messaging menifest.json -->
    <link rel="manifest" href="<?php echo base_url('js/manifest.json'); ?>">


</head>
<body id="page-top">
<?php
if ($this->session->userdata('logged_in')){
if (($this->uri->segment(1) . '/' . $this->uri->segment(2)) != 'quiz/attempt'){
$logged_in = $this->session->userdata('logged_in');
$hquery = $this->db->query(" select * from savsoftquiz_setting where setting_name='App_Name' || setting_name='App_title' order by setting_id asc ");
$hres = $hquery->result_Array();
?>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3"><?php if ($hres[0]['setting_value'] == "") { ?>
                    UAGRM Examenes
                <?php } else {
                    echo $hres[0]['setting_value'];
                } ?> </div>
        </a>
        <div style="text-align: center;"><span style="color:#ffffff;"><img style="width: 50%;"
                                                                           src="<?php echo base_url() . 'photo/default/Logo_sf.png' ?>"
                                                                           class="picture-src"
                                                                           id="" title=""/> </span>
            <div style="text-align: center;" hidden>
                <span style="color:#ffffff;"><?php echo $hres[1]['setting_value']; ?> </span>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            if (in_array('All', explode(',', $logged_in['setting'])) || true) {
                ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span><?php echo $this->lang->line('dashboard'); ?></span></a>
                </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading
            <div class="sidebar-heading">
              Interface
            </div>
      -->


            <?php
            if (in_array('List_all', explode(',', $logged_in['users']))) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                       aria-expanded="true" aria-controls="collapseUsers">
                        <i class="fas fa-fw fa-users"></i>
                        <span><?php echo $this->lang->line('users'); ?></span>
                    </a>

                    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (in_array('Add', explode(',', $logged_in['users']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('user/create'); ?>"><?php echo $this->lang->line('add_new_'); ?></a>
                            <?php } ?>
                            <?php
                            if (in_array('List', explode(',', $logged_in['users'])) || in_array('List_all', explode(',', $logged_in['users']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('user/index'); ?>"><?php echo $this->lang->line('user_list'); ?></a>
                            <?php } ?>
                            <?php
                            if (in_array('List_all', explode(',', $logged_in['appointment']))) { ?>
                                <a hidden class="nav-link collapse-item"
                                   href="<?php echo site_url('appointment/myappointment/'); ?>"><?php echo $this->lang->line('myappointment'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
            <?php
            if (in_array('List_all', explode(',', $logged_in['applicants']))) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user-graduate"></i>
                        <span><?php echo $this->lang->line('users_students'); ?></span>
                    </a>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (in_array('Add', explode(',', $logged_in['applicants']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('applicant/create'); ?>"><?php echo $this->lang->line('add_new_'); ?></a>
                            <?php } ?>
                            <?php
                            if (in_array('List', explode(',', $logged_in['applicants'])) || in_array('List_all', explode(',', $logged_in['applicants']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('applicant'); ?>"><?php echo $this->lang->line('user_list_students'); ?></a>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('user/get_users'); ?>"><?php echo $this->lang->line('reports'); ?></a>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('user/get_users_resume'); ?>"><?php echo $this->lang->line('specialty_list'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>

            <?php
            if (in_array('List', explode(',', $logged_in['questions'])) || in_array('List_all', explode(',', $logged_in['questions']))) {
                ?>

                <!-- Nav Item -  Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                       aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-university"></i>
                        <span><?php echo $this->lang->line('qbank'); ?></span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (in_array('Add', explode(',', $logged_in['questions']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('qbank/pre_new_question'); ?>"><?php echo $this->lang->line('add_new1'); ?></a>
                                <?php
                            }

                            if (in_array('List', explode(',', $logged_in['questions'])) || in_array('List_all', explode(',', $logged_in['questions']))) {
                                ?>
                                <a class="nav-link nav-link collapse-item"
                                   href="<?php echo site_url('qbank'); ?>"><?php echo $this->lang->line('question_list'); ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>

            <?php } ?>






            <?php
            if (in_array('List', explode(',', $logged_in['quiz'])) || in_array('List_all', explode(',', $logged_in['quiz']))) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuiz"
                       aria-expanded="true" aria-controls="collapseQuiz">
                        <i class="fas fa-fw fa-chalkboard-teacher"></i>
                        <span><?php echo $this->lang->line('quiz'); ?> </span>
                    </a>
                    <div id="collapseQuiz" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (in_array('Add', explode(',', $logged_in['quiz']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('quiz/add_new'); ?>"><?php echo $this->lang->line('add_new1'); ?></a>
                                <?php
                            }
                            if (in_array('List', explode(',', $logged_in['quiz'])) || in_array('List_all', explode(',', $logged_in['quiz']))) {
                                ?>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('quiz'); ?>"><?php echo $this->lang->line('quiz_list'); ?></a>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
            <?php
            if (in_array('List', explode(',', $logged_in['results'])) || in_array('List_all', explode(',', $logged_in['results']))) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResult"
                       aria-expanded="true" aria-controls="collapseResult">
                        <i class="fas fa-fw fa-folder"></i>
                        <span><?php echo $this->lang->line('result'); ?></a></span>
                    </a>
                    <div id="collapseResult" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('result'); ?>"><?php echo $this->lang->line('result_list'); ?></a>

                        </div>
                    </div>
                </li>
                <?php
            }
            ?>

            <?php
            $acp = explode(',', $logged_in['study_material']);
            if (in_array('List', $acp)) {
                ?>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudy"
                       aria-expanded="true" aria-controls="collapseStudy">
                        <i class="fas fa-fw fa-book"></i>
                        <span><?php echo $this->lang->line('study_material'); ?></span>
                    </a>
                    <div id="collapseStudy" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('study_material'); ?>"><?php echo $this->lang->line('study_material'); ?></a>
                        </div>
                    </div>
                </li>

                <?php
            }
            ?>

            <?php
            if (in_array('All', explode(',', $logged_in['setting']))) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
                       aria-expanded="true" aria-controls="collapseSetting">
                        <i class="fas fa-fw fa-cog"></i>
                        <span><?php echo $this->lang->line('setting'); ?></span>
                    </a>
                    <div id="collapseSetting" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('setting'); ?>"><?php echo $this->lang->line('setting'); ?></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('notification'); ?>"><?php echo $this->lang->line('notification'); ?></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('user/group_list'); ?>"><?php echo $this->lang->line('group_list'); ?></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('qbank/category_list'); ?>"><?php echo $this->lang->line('category_list'); ?></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('qbank/level_list'); ?>"><?php echo $this->lang->line('level_list'); ?></a>
                            <a class="nav-link collapse-item" hidden
                               href="<?php echo site_url('user/career_list'); ?>"><?php echo $this->lang->line('career_list'); ?></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('account'); ?>"><?php echo $this->lang->line('account_type'); ?></a></a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('user/custom_fields'); ?>"><?php echo $this->lang->line('custom_forms'); ?></a>
                            <div hidden>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('payment_gateway'); ?>"><?php echo $this->lang->line('payment_history'); ?></a>
                                <a class="nav-link collapse-item"
                                   href="<?php echo site_url('payment_gateway'); ?>"><?php echo $this->lang->line('advertisment'); ?></a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
            <?php
            if (!in_array('List_all', explode(',', $logged_in['quiz']))) {
                ?>
                <a hidden href="<?php echo site_url('user/switch_group'); ?>" class="btn btn-danger"
                   style="border-radius:0px;"><?php echo $this->lang->line('change_group'); ?></a>
                <?php
            }
            ?>

            <?php
            if (in_array('All', explode(',', $logged_in['setting'])) && false) {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupport"
                       aria-expanded="true" aria-controls="collapseStudy">
                        <i class="fas fa-fw fa-question-circle"></i>
                        <span>Support</span>
                    </a>
                    <div id="collapseSupport" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="nav-link collapse-item" href="https://savsoftquiz.com/support.php">Support</a>
                        </div>
                    </div>
                </li>

                <?php
            }
            ?>
            <?php
            if (in_array('All', explode(',', $logged_in['setting'])) && false) {
                ?>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLanding"
                       aria-expanded="true" aria-controls="collapseStudy">
                        <i class="fas fa-fw fa-puzzle-piece"></i>
                        <span>Landing Page</span>
                    </a>
                    <div id="collapseLanding" class="collapse" aria-labelledby="headingPages"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="nav-link collapse-item" href="<?php echo site_url('payment_gateway'); ?>">Menu</a>
                            <a class="nav-link collapse-item" href="<?php echo site_url('payment_gateway'); ?>">Pages/Post</a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('payment_gateway'); ?>">Slider</a>
                            <a class="nav-link collapse-item"
                               href="<?php echo site_url('payment_gateway'); ?>">Design</a>
                        </div>
                    </div>
                </li>


                <?php
            }
            ?>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <?php
                    $logged_in = $this->session->userdata('logged_in');
                    // check sg invitation
                    $uid = $logged_in['uid'];
                    $query = $this->db->query("select * from appointment_request 
	join savsoft_users on savsoft_users.uid=appointment_request.request_by 
	 where appointment_request.to_id='$uid' and appointment_request.appointment_status='pending' ");
                    $invitations = $query->result_array();

                    $query = $this->db->query("select * from savsoft_notification 
	  where (savsoft_notification.uid='$uid' OR savsoft_notification.uid='0') AND (savsoft_notification.viewed='0')  ");
                    $notifications = $query->result_array();

                    ?>


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter"><?php echo count($invitations) + count($notifications); ?></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                <?php echo $this->lang->line('notification'); ?>
                            </h6>
                            <?php
                            if (count($invitations) >= 1) {
                                ?>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="<?php echo site_url('appointment/myappointment/'); ?>">

                                    <div>
                                        <div class="small text-gray-500"><?php echo date('d M Y', time()); ?></div>
                                        <span class="font-weight-bold">There are <?php echo count($invitations); ?> pending appointments</span>
                                    </div>
                                </a>

                                <?php
                            }
                            foreach ($notifications as $k => $notification) {
                                ?>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="<?php echo site_url('notification'); ?>">

                                    <div>
                                        <div class="small text-gray-500"><?php echo $notification['notification_date']; ?></div>
                                        <span class="font-weight-bold"><?php echo $notification['title']; ?> </span>
                                    </div>
                                </a>

                                <?php
                            }
                            if (count($invitations) == 0 && count($notifications) == 0) {
                                ?><a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="small text-gray-500"><span
                                            class="font-weight-bold"><?php echo "No notification for you!"; ?></span>
                                </div></a><?php
                            }
                            ?>

                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">



				<?php echo $logged_in['first_name'] . ' ' . $logged_in['last_name']; ?> </span>
                            <!-- <img class="img-profile rounded-circle" src=""> -->
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">


                            <a class="dropdown-item"
                               href="<?php echo site_url('profile/'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?php echo $this->lang->line('myaccount'); ?>
                            </a>

                            <?php
                            if (in_array('List', explode(',', $logged_in['appointment'])) && !in_array('List_all', explode(',', $logged_in['appointment']))) { ?>
                                <a hidden class="dropdown-item"
                                   href="<?php echo site_url('appointment/myappointment/'); ?>"><i
                                            class="fas fa-mobile fa-sm fa-fw mr-2 text-gray-400"></i><?php echo $this->lang->line('myappointment'); ?>
                                </a>
                            <?php } ?>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('user/logout'); ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?php echo $this->lang->line('logout'); ?>
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div style="text-align: center;"><?php
                    if ($this->uri->segment(3) != 'ph'){
                    if ($this->uri->segment(2) != 'attempt' && $this->uri->segment(1) != 'install') {
                        $this->db->where("add_status", "Active");
                        $this->db->where("position", "Top");
                        $query = $this->db->get('savsoft_add');
                        if ($query->num_rows() == 1) {
                            $ad = $query->row_array();
                            if ($ad['advertisement_code'] != "") {
                                echo $ad['advertisement_code'];
                            } else if ($ad['banner'] != '') { ?><a href="<?php echo $ad['banner_link']; ?>"
                                                                   target="new_add"><img
                                        src="<?php echo base_url('upload/' . $ad['banner']); ?>" class="img-responsive">
                                </a> <?php
                            }
                        }
                    }
                    ?></div>
                <?php if ($this->session->flashdata('message_header')) {
                    echo $this->session->flashdata('message_header');
                } ?>
                <?php
                }
                ?>
<?php
}
}
?>