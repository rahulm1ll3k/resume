<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
$user_name = $_POST['intro-title'];
$user_sub = $_POST['intro-sub'];
$user_intro = $_POST['intro-details'];
$user_img = $_POST['intro-img'];
$user_email = $_POST['cont-inf-email'];
$user_phone = $_POST['cont-inf-phone'];
$user_website = $_POST['cont-inf-website'];
$user_addr = $_POST['cont-inf-addr'];
$font_color = $_POST['font-color'];
$font_size = $_POST['font-size'];
$font_family = $_POST['font-family'];
?>
<!--<!DOCTYPE html> 
<html>
    <head>
        <title>Resume Builder</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style type="text/css">
            span#remove{color: red; float: right; display: block; font-weight: bold; }
            span#add{color: green; float: right; display: block; font-weight: bold; }
            .content-det * { word-wrap: normal !important; white-space: normal !important; }
        </style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script src="http://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>
    <body>-->
<style type="text/css">
.result, .result a{ font-size: <?php echo $font_size; ?>; color: <?php echo $font_color; ?>; font-family: <?php echo $font_family; ?>}
</style>



<div class="container-fluid">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#prev">Preview</a></li>
    <li><a data-toggle="pill" href="#sae">Save and Export</a></li>
    <li><a data-toggle="pill" href="#lout">Layout</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="prev" class="tab-pane fade in active">
      <div class="container-fluid result">
        <div class="">
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-6 col-md-5">
                  <br/>
                  <img src="upload/<?php echo $user_img; ?>" class="img-responsive">
                </div>
                <div class="col-sm-6 col-md-7">
                  <h2><?php echo $user_name; ?></h2>
                  <h4><?php echo $user_sub; ?></h4>
                  <div class="content-det"><?php echo $user_intro; ?></div>
                    <!--<button class="btn btn-danger">CUSTOM BUTTON</button>-->
                  </div>						
                </div>
                <!--	////////////////////////////////////////////	-->
                <hr />
                <div class="experience">
                  <h2 class="text-danger">Experience</h2>
                  <br/>

                  <?php
                  $i = 1;
                  while ($i <= 10):
                    if (isset($_POST["row-job-title-{$i}"]) && !$_POST["row-job-title-{$i}"] == ''):
                  ?>
                    <div class="section">
                      <h4 class="pull-right" style="margin-top: 0;"><?php echo $_POST["row-form-{$i}"] . ' - ' . $_POST["row-to-{$i}"]; ?></h4>
                      <h4><?php echo $_POST["row-job-title-{$i}"]; ?></h4>
                      <h5 class="text-muted"><?php echo $_POST["row-cpmpany-name-{$i}"]; ?></h5>
                      <div class="content-det"><?php echo $_POST["row-job-desc-{$i}"]; ?></div>
                      <br/>
                    </div>
                  <?php else: ?> 

                  <?php 
                    endif;
                    $i++;
                  endwhile;
                  ?>
                </div>						
                <hr />
                <div class="education">
                  <h2 class="text-danger">Education Highlights</h2>
                  <br/>

                  <?php
                  $i = 1;
                  while ($i <= 10):
                    if (isset($_POST["row-edu-label-{$i}"]) && !$_POST["row-edu-label-{$i}"] == ''):
                  ?>

                    <div class="section">
                      <h4 class="pull-right" style="margin-top: 0;">
                      <?php echo $_POST["row-edu-pass-year-{$i}"] - $_POST["row-edu-duration-{$i}"]; ?>
                      - 
                      <?php echo $_POST["row-edu-pass-year-{$i}"]; ?>
                      </h4>
                      <h4>
                      <?php echo $_POST["row-edu-label-{$i}"]; ?>
                      In 
                      <?php echo $_POST["row-edu-type-{$i}"]; ?>
                      </h4>
                      <h5 class="text-muted"><?php echo $_POST["row-edu-ins-name-{$i}"]; ?></h5>
                      <div class="content-det"><?php echo $_POST["row-edu-achiv-{$i}"]; ?></div>
                      <br/>
                      </div>

                  <?php
                    endif;
                    $i++;
                  endwhile;
                  ?>

                </div>						
              </div>
              <div class="col-md-4">
                <div class="widget-section">
                  <h3>GET IN TOUCH</h3>
                  <ul type="none">
                    <?php
                    if (!$user_email == '' && isset($user_email)):
                    ?>
                      <li>
                        <a href="#">
                          <p>
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <?php echo $user_email; ?>
                          </p>
                        </a>
                      </li>
                    <?php 
                    endif;
                    if (!$user_phone == '' && isset($user_phone)): ?>
                      <li>
                        <p>
                          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 
                          <?php echo $user_phone; ?>
                          </p>
                      </li>
                    <?php 
                    endif;
                    if (!$user_website == '' && isset($user_website)): ?>
                      <li>
                        <a href="http://<?php echo $user_website; ?>">
                          <p>
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                            <?php echo $user_website; ?>
                          </p>
                        </a>
                      </li>
                    <?php 
                    endif;
                    if (!$user_addr == '' && isset($user_addr)): ?>
                      <li>
                        <p>
                          <span class="glyphicon glyphicon-home" aria-hidden="true"></span> 
                          <?php echo $user_addr; ?>
                        </p>
                      </li>
                    <?php 
                    endif; 
                    ?>
                  </ul>
                </div>
                <div class="widget-section">
                  <h3>TECHNICAL COMPETENCIES</h3>
                  <?php
                  $i = 1;
                  while ($i <= 10):
                    if (isset($_POST["row-skl-title-{$i}"]) && !$_POST["row-skl-title-{$i}"] == ''):
                      $rat = $_POST["row-skl-rate-{$i}"];
                    ?>

                      <div class="rating">
                        <h3><?php echo $_POST["row-skl-title-{$i}"]; ?></h3>
                        <div class="stars-cont" style="width: 125px;">
                          <p class="stars">
                            <img src="images/stars_wt_b.png">
                          </p>
                          <div class="progress" style="height: 25px;width: 125px;margin-top: -35px;z-index: -2;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rat*10 ?>%;background: gold;">
                              <span class="sr-only">70% Complete</span>
                            </div>
                          </div>
                        </div>	
                        <br/>
                        <div class="content-det"><?php echo $_POST["row-skl-desc-{$i}"]; ?></div>
                      </div>
                  <?php
                    endif;
                    $i++;
                  endwhile;
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--    </body>
      </html>-->


    </div>
    <div id="sae" class="tab-pane fade">
      <h3>Download Your Resume</h3>
      <button class="btn btn-danger">Download In Microsoft Word</button>
      <button class="btn btn-danger">Download In PDF</button>
      <button class="btn btn-danger">Download In HTML</button>
    </div>
    <div id="lout" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
