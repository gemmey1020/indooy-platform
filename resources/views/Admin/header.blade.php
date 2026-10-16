<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       Data entry Dashboard
    </title>
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

  <link rel="icon" href="{{ url('/') }}/resources/views/site/style/img/logo.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
  <link href="{{ url('/') }}/resources/views/Admin/style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ url('/') }}/resources/views/Admin/style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ url('/') }}/resources/views/Admin/style/css/sb-admin.css" rel="stylesheet">
  <link href="{{ url('/') }}/resources/views/Admin/style/css/dropzone.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" type="text/css"/>



</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}/Admin_Dashboard">
    Indooy</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/') }}/Admin_Dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>




        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Category">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
           <i class="fas fa-archive"></i>
            <span class="nav-link-text">Activites </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/Add_activity">
                <i class="fas fa-plus-circle"></i>
              Add Activity</a>
            </li>
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/all_in_one">
                <i class="fas fa-plus-circle"></i>
              Add All In One</a>
            </li>
            <?php
            /*
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/Modify_location">
              <i class="fas fa-map-marker"></i>
            Modify location</a>
            </li>
            */
            ?>
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_activites">
              <i class="fas fa-briefcase"></i>
            All Activites</a>
            </li>

          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Related-Category">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Related-Category" data-parent="#exampleAccordion">
           <i class="fas fa-code-branch"></i>
            <span class="nav-link-text">RelatedCategory </span>
          </a>
          <ul class="sidenav-second-level collapse" id="Related-Category">
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/RelatedActivity">
               <i class="fas fa-plus-circle"></i>
               Related-category</a>
            </li>
            <?php

            ?>
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_RelatedActivites">
              <i class="fas fa-briefcase"></i>
            All Related-categories</a>
            </li>

          </ul>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="review-requests">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Review" data-parent="#exampleAccordion">
           <i class="fas fa-archive"></i>
            <span class="nav-link-text">Requests for landing page </span>
          </a>
          <ul class="sidenav-second-level collapse" id="Review">
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_Requests/add">
               <i class="fas fa-edit"></i>
                add requests</a>
            </li>

            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_Requests/edit">
              <i class="fas fa-edit"></i>
             edit requests</a>
            </li>
            <!--<li>-->
            <!--  <a href="{{ url('/') }}/Admin_Dashboard/Aall_Delete_Requests">-->
            <!-- <i class="fas fa-user-times"></i>-->
            <!-- delete requests</a>-->
            <!--</li>-->

          </ul>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Review-website">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Review-website" data-parent="#exampleAccordion">
            <i class="fas fa-archive"></i>
            <span class="nav-link-text">Requests for full website</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Review-website">


            <li>

              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#topReview-website"> <i class="fas fa-edit"></i>
              full website data</a>
              <ul class="sidenav-third-level collapse" id="topReview-website">
               <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_Requests/addx">
               <i class="fas fa-edit"></i>
                add requests</a>
            </li>

            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_Requests/editx">
              <i class="fas fa-edit"></i>
             edit requests</a>
            </li>

              </ul>
            </li>
                        <li>

              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#downReview-website"> <i class="fa fa-cogs"></i>
              branches/products</a>
              <ul class="sidenav-third-level collapse" id="downReview-website">

                <li>

                  <a href="{{ url('/') }}/Admin_Dashboard/Review-website/down/Add">
                 <i class="fa fa-pencil-square-o"></i>
                edit branches </a>
                </li>
                <li>

                  <a href="{{ url('/') }}/Admin_Dashboard/All_Review-website_down">
                  <i class="fa fa-pencil-square-o"></i>
                edit products</a>
                </li>


              </ul>
            </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="edit-landing">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#editLanding" data-parent="#exampleAccordion">
           <i class="fas fa-code-branch"></i>
            <span class="nav-link-text">All landing page </span>
          </a>
          <ul class="sidenav-second-level collapse" id="editLanding">
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/edit_all_landing">
              <i class="fas fa-edit"></i>
                edit landing page </a>
            </li>



          </ul>
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="edit-website">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#editWebsite" data-parent="#exampleAccordion">
           <i class="fas fa-code-branch"></i>
            <span class="nav-link-text">All websites </span>
          </a>
          <ul class="sidenav-second-level collapse" id="editWebsite">
            <li>
              <a href="{{ url('/') }}/Admin_Dashboard/All_websites">
              <i class="fas fa-edit"></i>
                edit websites </a>
            </li>



          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>
          Logout </a>
        </li>
      </ul>
    </div>
  </nav>