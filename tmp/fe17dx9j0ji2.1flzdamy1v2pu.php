<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Basic Table</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <?php echo $this->render('header.html',$this->mime,get_defined_vars()); ?>    
      <?php echo $this->render('nav.html',$this->mime,get_defined_vars()); ?>  
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              My Drafts
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th class="hidden-phone"><i class="fa fa-bullhorn"></i> League</th>
                                  <th><i class="fa fa-bookmark"></i> Team</th>
                                  <th><i class="fa fa-clock-o"></i> Expires</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Type</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <!--tr>
                                  <td class="hidden-phone"><a href="#">16 Team Enhanced NFL</a></td>
                                  <td>16 Team 2</td>
                                  <td>2015/03/15 12:00</td>
                                  <td class="hidden-phone">16EE</td>
                                  <td><span class="label label-success label-mini" onClick="javascript:(alert('Its your pick, click the plus sign to add a player.'))">Your Pick</span></td>
                                  <td>
                                      <button class="btn btn-primary btn-xs" onClick="javascript:(alert('Its your pick, this button will let you pick a player.'))"><i class="fa fa-plus"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-users" onClick="javascript:(alert('List the remining picks remaining in the draft'))"></i></button>
                                  </td>
                              </tr>
                              
                              <tr>
                                  <td class="hidden-phone"><a href="#">12 Team Enhanced NFL</a></td>
                                  <td>12 Team 1</td>
                                  <td>2015/03/15 12:00</td>
                                  <td class="hidden-phone">12EE</td>
                                  <td><span class="label label-warning label-mini">Team 7</span></td>
                                  <td>
                                      <button class="btn btn-primary btn-xs" onClick="javascript:(alert('Its not your pick, but this button will let you look at players'))"><i class="fa fa-plus"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-users" onClick="javascript:(alert('List the remining picks remaining in the draft'))"></i></button>
                                  </td>
                              </tr--> 
                              <?php foreach (($teams?:array()) as $team): ?>
                              <tr>
                                  <td class="hidden-phone"><a href="#"><?php echo trim($team['league_name']); ?></a></td>
                                  <td><?php echo trim($team['team_name']); ?></td>
                                  <td>NA</td>
                                  <td class="hidden-phone">12SS</td>
                                  <td><span class="label label-info label-mini" onClick="javascript:(alert('This league does not have an active draft'))">NA</span></td>
                                  <td>
                                      <button class="btn btn-disabled btn-xs" onClick="javascript:(alert('This league does not have an active draft'))"><i class="fa fa-plus"></i></button>
                                      <button class="btn btn-disabled btn-xs"><i class="fa fa-users" onClick="javascript:(alert('This league does not have an active draft'))"></i></button>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <?php echo $this->render('whos_online.html',$this->mime,get_defined_vars()); ?>
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; EFSports, Inc.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  </body>
</html>
