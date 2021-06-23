<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a  class="simple-text logo-normal">
          Estudiante
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="<?= $inscripcion ?>">
            <a href="<?php echo base_url('inscripcion'); ?>">
              <i class="nc-icon nc-bank"></i>
              <p>Inscripcion</p>
            </a>
          </li>
          <li class="<?= $notas ?>">
            <a href="<?php echo base_url('notas'); ?>">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Ver notas</p>
            </a>
          </li>
          <li class="<?= $preinscripcion ?>">
            <a href="<?php echo base_url('preinscripcion'); ?>">
              <i class="nc-icon nc-bookmark-2"></i>
              <p>Pre-inscripcion</p>
            </a>
          </li>
          <li class="<?= $horassociales ?>">
            <a href="<?php echo base_url('horassociales'); ?>">
              <i class="nc-icon nc-paper"></i>
              <p>Horas sociales</p>
            </a>
          </li>
          <li class="<?= $pensum ?>">
            <a href="<?php echo base_url('pensum'); ?>">
              <i class="nc-icon nc-hat-3"></i>
              <p>Pensum</p>
            </a>
          </li>
          <li class="<?= $micuenta ?>">
            <a href="<?php echo base_url('micuenta'); ?>">
              <i class="nc-icon nc-circle-10"></i>
              <p>Mi cuenta</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" >