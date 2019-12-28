<!DOCTYPE html> 
<head>
    <title>Resume Builder</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Noto+Sans|Open+Sans|Open+Sans+Condensed:300|PT+Sans|PT+Serif|Playfair+Display|Raleway|Roboto|Roboto+Condensed|Titillium+Web" rel="stylesheet">
    <style type="text/css">
        span.remove{color: red; float: right; display: block; font-weight: bold; }
        span#add{color: green; float: right; display: block; font-weight: bold; }
        div#image-preview { height: 100px; background-size: auto 100% !important; background-repeat: no-repeat; }
        div#myModal{width: 100%;}
        div#customize { border: 1px solid; padding: 5px 10px; width: 400px; position: fixed; z-index: 999999; overflow: hidden; background: white; right: 0; top: 100px; }
        div#customize h1{ margin: 5px 0; transition: .5s;}
        div.sideftog { right: -345px !important; }
        div.colorpicker {z-index: 999999 !important;}
        div.colorpickerclass { height: 40px; width: 40px; background: black; }
        .part { display: block; overflow: hidden; margin: 15px 0; }
        .section-color * { float: left; }
        .section-color h4 { margin-top: 10px; margin-left: 15px; }
        .part select { border: 1px solid;  }
        .form-horizontal .form-group { margin-right: 0; margin-left: 0; }
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({selector: 'textarea'});
      $(document).ready(function () {
        tinymce.init({selector: 'textarea'});
      });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div id="myModal" class="modal bs-example-modal-lg fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Resume Preview</h4>
                    </div>
                    <div class="modal-body">
                        <div id="myresult"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="process.php" id="myForm">
            <div id="customize" class="sideftog" title="Customize">
                <h1>
                    <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                    Customize
                </h1>
                <div class="customize-toggle">
                  <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#basicinfo">Basic Info</a></li>
                  </ul>
                  
                  <div class="tab-content">
                    <div id="basicinfo" class="tab-pane fade in active">
                        <div class="section-color part">
                          <div id="colorSelector" class="colorpickerclass"></div>
                          <input type="text" style="display:none;" name="font-color" value="#000">
                          <h4>Chose Your Color Of Chose  </h4>                            
                        </div>
                        <div class="section-fsize part">
                            <h4>Chose Font Size</h4>
                            <select class="btn btn-block" name="font-size">
                                <option>10px</option>
                                <option>12px</option>
                                <option selected>14px</option>
                                <option>16px</option>
                                <option>18px</option>
                                <option>20px</option>
                                <option>22px</option>
                                <option>24px</option>
                                <option>26px</option>
                                <option>28px</option>
                                <option>30px</option>
                            </select>
                        </div>
                        <div class="section-family part">
                            <h4>Chose Font Family</h4>
                            <select name="font-family" class="btn btn-block">
                                <option>Lato</option>
                                <option>Montserrat</option>
                                <option>Noto Sans</option>
                                <option>Open Sans</option>
                                <option>Open Sans Condensed</option>
                                <option>PT Sans</option>
                                <option>PT Serif</option>
                                <option>Playfair Display</option>
                                <option selected>Roboto</option>
                                <option>Roboto Condensed</option>
                                <option>Raleway</option>
                                <option>Titillium Web</option>
                            </select>
                        </div>
                        <div class="part">
                            <button type="submit" class="btn btn-default pull-right" id="process">Preview</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="container">
                <h2>User Basic Information</h2>
                <div class="form-group">
                    <label for="intro-title" class="col-sm-2 control-label">Your Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="intro-title" name="intro-title" placeholder="Your Name" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro-sub" class="col-sm-2 control-label">Subtitle Text</label>
                    <div class="col-sm-10">
                        <input type="text" name="intro-sub" class="form-control" id="intro-sub" placeholder="Subtitle Text" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image-upload" class="col-sm-2 control-label">Your Image</label>
                    <div class="col-sm-10">
                        <div class="col-sm-4">
                            <div id="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input name="userImage" type="file" class="inputFile" id="inputFile"/>
                                <input type="hidden" name="intro-img" id="filename" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div id="targetLayer"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro-details" class="col-sm-2 control-label">Some Introduction Text</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="intro-details" id="intro-details"></textarea>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2>Get in Touch</h2>
                <div class="form-group">
                    <label for="cont-inf-email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="cont-inf-email" class="form-control" id="cont-inf-email" placeholder="Your Email" required="required" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="cont-inf-phone" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="cont-inf-phone" class="form-control" id="cont-inf-phone" placeholder="Your Phone Number" required="required" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="cont-inf-website" class="col-sm-2 control-label">Website Url</label>
                    <div class="col-sm-10">
                        <input type="text" name="cont-inf-website" class="form-control" id="cont-inf-website" placeholder="Your Personal/Company Website URL" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="cont-inf-addr" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="cont-inf-addr" class="form-control" id="cont-inf-addr" placeholder="Your Address" />
                    </div>
                </div>

            </div>
            <hr/>
            <div class="container section-second">
                <h2>Experience Section</h2>
                <div class="form-group">
                    <label for="row-job-title-1" class="col-sm-2 control-label">Experience Description</label>
                    <div class="col-sm-10">
                        <div class="form-group exp-append">
                            <p id="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add a New Field</p>
                            <!-- panel 1 start -->
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                <span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span>
                                    <span class="sort">Description 1
                                </span>
                                <span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="row-job-title-1" class="col-sm-2 control-label">Job Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="row-job-title-1" class="form-control row-job-title" id="row-job-title-1" placeholder="Job Title" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="row-cpmpany-name-1" class="col-sm-2 control-label">Company Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="row-cpmpany-name-1" class="form-control" id="row-cpmpany-name-1" placeholder="Company Name" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="row-form-1" class="col-sm-2 control-label">Job Duration</label>
                                        <div class="col-sm-10">
                                            <br/>
                                            <div class="form-group">
                                                <label for="row-form-1" class="col-sm-2 control-label">From</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="row-form-1" class="datepicker form-control" id="row-form-1" placeholder="Month - Year">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="row-to-1" class="col-sm-2 control-label">To</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="row-to-1" class="datepicker jd-to form-control" id="row-to-1" placeholder="Month - Year">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="running" name="row-run-1" value="1">
                                                            Is Your Job Running .
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="row-job-desc-1" class="col-sm-2 control-label">Job Responsibilities</label>
                                        <div class="col-sm-10">
                                            <textarea name="row-job-desc-1" class="form-control" id="row-job-desc-1" ></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- panel 1 end -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2>Education Section</h2>
                <div class="form-group">
                    <label for="row-edu-label-1" class="col-sm-2 control-label">Education Descriptions</label>
                    <div class="col-sm-10 edu-append">
                        <p id="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add a New Field</p>
                        <!-- panel 1 start -->
                        <div class="panel panel-success">
                            <div class="panel-heading">Education <span class="sort">Description 1</span>
                                <span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="row-edu-label-1" class="col-sm-2 control-label">Lavel of education</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-label-1" class="form-control row-edu-label" id="row-edu-label-1" placeholder="Lavel of education">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-ins-name-1" class="col-sm-2 control-label">Instute Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-ins-name-1" class="form-control" id="row-edu-ins-name-1" placeholder="Instute Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-type-1" class="col-sm-2 control-label">Concentration / Major / Group </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-type-1" class="form-control" id="row-edu-type-1" placeholder="Concentration / Major / Group ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-result-1" class="col-sm-2 control-label">Result </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-result-1" class="form-control" id="row-edu-result-1" placeholder="Result ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-marks-1" class="col-sm-2 control-label">Marks Obtained</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-marks-1" class="form-control" id="row-edu-marks-1" placeholder="Marks Obtained">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-pass-year-1" class="col-sm-2 control-label">Year of Passing</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-pass-year-1" class="form-control" id="row-edu-pass-year-1" placeholder="Year of Passing">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-duration-1" class="col-sm-2 control-label">Duration</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-duration-1" class="form-control" id="row-edu-duration-1" placeholder="Duration">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-edu-achiv-1" class="col-sm-2 control-label">Achievement </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="row-edu-achiv-1" class="form-control" id="row-edu-achiv-1" placeholder="Achievement ">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- panel 1 end -->
                    </div>
                </div>
            </div>
            <div class="container skill-section">
                <h2>Skills Section</h2>
                <div class="form-group">
                    <label for="row-skl-1" class="col-sm-2 control-label">Skills</label>
                    <div class="col-sm-10 skill-append">
                        <p id="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add a New Field</p>
                        <!-- panel 1 start -->
                        <div class="panel panel-success">
                            <div class="panel-heading">Skill <span class="sort">Description 1</span>
                                <span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="row-skl-title-1" class="col-sm-2 control-label">Skill Title</label>
                                    <div class="col-sm-10 input-group">
                                        <input type="text" name="row-skl-title-1" class="form-control row-skl-title" id="row-skl-title-1" placeholder="Skill Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-skl-rate-1" class="col-sm-2 control-label">Skill Rating</label>
                                    <div class="radioset">
                                        <input type="radio" value="1" id="radio1" name="row-skl-rate-1"><label for="radio1">.5</label>
                                        <input type="radio" value="2" id="radio2" name="row-skl-rate-1"><label for="radio2">1</label>
                                        <input type="radio" value="3" id="radio3" name="row-skl-rate-1"><label for="radio3">1.5</label>
                                        <input type="radio" value="4" id="radio4" name="row-skl-rate-1"><label for="radio4">2</label>
                                        <input type="radio" value="5" id="radio5" name="row-skl-rate-1"><label for="radio5">2.5</label>
                                        <input type="radio" value="6" id="radio6" name="row-skl-rate-1"><label for="radio6">3</label>
                                        <input type="radio" value="7" id="radio7" name="row-skl-rate-1"><label for="radio7">3.5</label>
                                        <input type="radio" value="8" id="radio8" name="row-skl-rate-1" checked="checked"><label for="radio8">4</label>
                                        <input type="radio" value="9" id="radio9" name="row-skl-rate-1"><label for="radio9">4.5</label>
                                        <input type="radio" value="10" id="radio10" name="row-skl-rate-1"><label for="radio10">5</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="row-skl-desc-1" class="col-sm-2 control-label">Skill Review</label>
                                    <div class="col-sm-10 input-group">
                                        <textarea name="row-skl-desc-1" class="form-control" id="row-skl-desc-1" placeholder="Skill Title"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- panel 1 end -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default pull-right" id="process">Process & Download</button>

                                                <!--<button type="submit" class="btn btn-default pull-right">Process & Download</button>-->
                    </div>
                </div>
            </div>


        </form>

    </div>


<script type="text/javascript">
        $('.customize-toggle').slideUp();
        $(document).ready(function(){

            $('#colorSelector').ColorPicker({
                color: '#0000ff',
                onShow: function (colpkr) {
                    $(colpkr).fadeIn(500);
                    return false;
                },
                onHide: function (colpkr) {
                    $(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function (hsb, hex, rgb) {
                    $('#colorSelector').css('backgroundColor', '#' + hex);
                    $('input[name="font-color"]').attr('value','#'+hex);
                }
            });

          $('#customize > h1 .glyphicon').click(function(){
            $('div#customize').toggleClass('sideftog',1000);
//            $('div#customize').animate({right: '-450px'});
            $('.customize-toggle').slideToggle();
          });
            $("button").click(function(){
                $("#div1").remove();
            });
            $(".panel").on('click','.panel-heading',function(){
                $(this).next().slideToggle();
            });
            $(".mce-notification-warning").hide();
//            $(".panel-heading").on('click','.remove', function(){
//                $(this).closest(".panel").remove();
//            });
            
            $(".edu-append").delegate('.remove','click', function(){
            
                $(this).closest(".panel").remove();
            });
            $(".skill-section").delegate('.remove','click', function(){
             
                $(this).closest(".panel").remove();
            });
            $(".exp-append").delegate('.remove','click', function(){
            
                $(this).closest(".panel").remove();
            });  
        
        
        
            $(".edu-append").delegate('.panel-heading','click', function(){
             // alert('hi');          
              $(this).next(".panel-body").collapse('toggle');
                if($('.edu-append > div.panel').length === 0){
                    $('.edu-append p#add').show();
                }else{
                    $('.edu-append p#add').hide();
                }
            });
            $(".skill-section").delegate('.panel-heading','click', function(){
            //  alert('hi');
              $(this).next(".panel-body").collapse('toggle');
                if($('.skill-append > div.panel').length === 0){
                    $('.skill-append p#add').show();
                }else{
                    $('.skill-append p#add').hide();
                }
            });
    
            $(".exp-append").delegate('.panel-heading','click', function(){
            //  alert('hi');
                $(this).next(".panel-body").collapse('toggle');
                if($('.exp-append > div.panel').length === 0){
                    $('.exp-append p#add').show();
                }else{
                    $('.exp-append p#add').hide();
                }
            });            

            
            $('.edu-append p#add').hide();
            $('.skill-append p#add').hide();
            $('.exp-append p#add').hide();
            
//            $(".panel span#add").click(function(){
//                $(this).closest(".panel").clone(true).appendTo(this.closest(".col-sm-10 .form-group"));
                  //alert($(".section-second .col-sm-10 > .form-group > .panel:last-child").index()+1);
//                  var $id = $(".section-second .form-group .panel:last-child .panel-body > .form-group > .col-sm-10 input[type='text']").attr('name');
//                  var $lastValur = $id.substr($id.length - 1);
//                  alert($lastValur);
//            });

            $(".exp-append").on('click','#add', function(){
              var $id = $(".exp-append .panel:last-child input.row-job-title").attr('name');
              if($('.exp-append > div.panel').length === 0){
                var  $plen = 0;
              }else{
                var  $plen = parseInt($id.substr($id.length - 1));
              }
              var $lastValur = $plen+1;
                $('.exp-append p#add').hide();

                var highest = -Infinity;
                $("input[type='text']").each(function() {
                    highest = Math.max(highest, parseFloat(this.value));
                });
                console.log(highest);

                $(this).closest(".exp-append").append('<!-- panel '+$lastValur+' start -->'+
                      '<div class="panel panel-success">'+
                          '<div class="panel-heading">Description '+$lastValur+
                            '<span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                            '<span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                        '</div>'+
                          '<div class="panel-body">'+
                              '<div class="form-group">'+
                                '<label for="row-job-title-'+$lastValur+'" class="col-sm-2 control-label row-job-title">Job Title</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-job-title-'+$lastValur+'" class="form-control row-job-title" id="row-job-title-'+$lastValur+'" placeholder="Job Title">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-cpmpany-name-'+$lastValur+'" class="col-sm-2 control-label">Company Name</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-cpmpany-name-'+$lastValur+'" class="form-control" id="row-cpmpany-name-'+$lastValur+'" placeholder="Company Name">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-form-'+$lastValur+'" class="col-sm-2 control-label">Job Duration</label>'+
                                '<div class="col-sm-10">'+
                                  '<br/>'+
                                  '<div class="form-group">'+
                                    '<label for="row-form-'+$lastValur+'" class="col-sm-2 control-label">From</label>'+
                                    '<div class="col-sm-10">'+
                                      '<input type="text" name="row-form-'+$lastValur+'" class="datepicker form-control" id="row-form-'+$lastValur+'" placeholder="Month - Year">'+
                                    '</div>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="row-to-'+$lastValur+'" class="col-sm-2 control-label">To</label>'+
                                    '<div class="col-sm-10">'+
                                      '<input type="text" name="row-to-'+$lastValur+'" class="datepicker form-control jd-to" id="row-to-'+$lastValur+'" placeholder="Month - Year">'+
                                      '<div class="checkbox">'+
                                        '<label>'+
                                          '<input class="running" type="checkbox" name="row-run-'+$lastValur+'" value="1">'+
                                          'Is Your Job Running .'+
                                        '</label>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-job-desc-'+$lastValur+'" class="col-sm-2 control-label">Job Responsibilities</label>'+
                                '<div class="col-sm-10">'+
                                    '<textarea name="row-job-desc-'+$lastValur+'" class="form-control" id="row-job-desc-'+$lastValur+'" ></textarea>'+
                                '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>'+
                        '<!-- panel '+$lastValur+' end -->');
                
//                    $( ".radioset" ).buttonset();
    $('.datepicker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        yearRange: '1950:2020',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }

    });
    tinymce.init({selector: 'textarea'});
//                  alert($lastValur);
            });
            $(".edu-append").on('click','#add', function(){
                  var $id = $(".edu-append .panel:last-child input.row-edu-label").attr('name');
                  if($('.edu-append > div.panel').length === 0){
                        var  $plen = 0;
                  }else{
                      var  $plen = parseInt($id.substr($id.length - 1));
                  }
                  var $lastValur = $plen+1;
                $('.edu-append p#add').hide();


                $(this).closest(".edu-append").append('<!-- panel '+$lastValur+' start -->'+
                        '<div class="panel panel-success">'+
                          '<div class="panel-heading">Education Description '+$lastValur+
                            '<span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                            '<span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                        '</div>'+
                          '<div class="panel-body">'+
                              '<div class="form-group">'+
                                '<label for="row-edu-label-'+$lastValur+'" class="col-sm-2 control-label">Lavel of education</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-label-'+$lastValur+'" class="form-control row-edu-label" id="row-edu-label-'+$lastValur+'" placeholder="Lavel of education">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-ins-name-'+$lastValur+'" class="col-sm-2 control-label">Instute Name</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-ins-name-'+$lastValur+'" class="form-control" id="row-edu-ins-name-'+$lastValur+'" placeholder="Instute Name">'+
                               '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-type-'+$lastValur+'" class="col-sm-2 control-label">Concentration / Major / Group </label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-type-'+$lastValur+'" class="form-control" id="row-edu-type-'+$lastValur+'"  placeholder="Concentration / Major / Group ">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-result-'+$lastValur+'" class="col-sm-2 control-label">Result </label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-result-'+$lastValur+'" class="form-control" id="row-edu-result-'+$lastValur+'" placeholder="Result ">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-marks-'+$lastValur+'" class="col-sm-2 control-label">Marks Obtained</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-marks-'+$lastValur+'" class="form-control" id="row-edu-marks-'+$lastValur+'" placeholder="Marks Obtained">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-pass-year-'+$lastValur+'" class="col-sm-2 control-label">Year of Passing</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-pass-year-'+$lastValur+'" class="form-control" id="row-edu-pass-year-'+$lastValur+'" placeholder="Year of Passing">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-duration-'+$lastValur+'" class="col-sm-2 control-label">Duration</label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-duration-'+$lastValur+'" class="form-control" id="row-edu-duration-'+$lastValur+'" placeholder="Duration">'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group">'+
                                '<label for="row-edu-achiv-'+$lastValur+'" class="col-sm-2 control-label">Achievement </label>'+
                                '<div class="col-sm-10">'+
                                  '<input type="text" name="row-edu-achiv-'+$lastValur+'" class="form-control" id="row-edu-achiv-'+$lastValur+'" placeholder="Achievement ">'+
                                '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>'+
                        '<!-- panel '+$lastValur+' end -->');
                tinymce.init({selector: 'textarea'});
//                    $( ".radioset" ).buttonset();
    $('.datepicker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        yearRange: '1950:2020',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
//                  alert($lastValur);
            });
          $(".skill-append").on('click','#add', function(){
            var $id = $(".skill-append .panel:last-child input.row-skl-title").attr('name');
              if($('.skill-append > div.panel').length === 0){
                    var  $plen = 0;
              }else{
                  var  $plen = parseInt($id.substr($id.length - 1));
              }
              var $lastValur = $plen+1;
                $('.skill-append p#add').hide();

              $(this).closest(".skill-append").append('<!-- panel 1 start -->'+
                      '<div class="panel panel-success">'+
                        '<div class="panel-heading">Skill Description '+$lastValur+
                          '<span class="remove glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                          '<span id="add" class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                      '</div>'+
                        '<div class="panel-body">'+

                            '<div class="form-group">'+
                              '<label for="row-skl-title-'+$lastValur+'" class="col-sm-2 control-label">Skill Title</label>'+
                              '<div class="col-sm-10 input-group">'+
                                '<input type="text" name="row-skl-title-'+$lastValur+'" class="form-control row-skl-title" id="row-skl-title-'+$lastValur+'" placeholder="Skill Title">'+
                              '</div>'+
                            '</div>'+

                            '<div class="form-group">'+
                              '<label for="row-skl-rate-'+$lastValur+'" class="col-sm-2 control-label">Skill Rateing</label>'+
                              '<div class="radioset">'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-1"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-1" >0.5</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-2"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-2" >1.0</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-3"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-3" >1.5</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-4"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-4" >2.0</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-5"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-5" >2.5</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-6"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-6" >3.0</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-7"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-7" >3.5</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-8"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-8" >4.0</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-9"  name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-9" >4.5</label>'+
            '<input type="radio" id="row-skl-rate-'+$lastValur+'-10" name="row-skl-rate-'+$lastValur+'"><label for="row-skl-rate-'+$lastValur+'-10">5.0</label>'+
        '</div>'+

                            '</div>'+

                            '<div class="form-group">'+
                              '<label for="row-skl-desc-'+$lastValur+'" class="col-sm-2 control-label">Skill Review</label>'+
                              '<div class="col-sm-10 input-group">'+
                                  '<textarea name="row-skl-desc-'+$lastValur+'" class="form-control" id="row-skl-desc-'+$lastValur+'" placeholder="Skill Title"></textarea>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                      '</div>'+
                      '<!-- panel 1 end -->');
              tinymce.init({selector: 'textarea'});
                  $( ".radioset" ).buttonset();
    $('.datepicker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        yearRange: '1950:2020',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
//                alert($lastValur);
          });
        $("#myForm").submit(function(e) {
            var url = "process.php"; 
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#myForm").serialize(),
                   success: function(data)
                   {
                      $('#myModal').modal('show');
                      $("#myresult").html(data);
                   }
                 });
            e.preventDefault(); 
        });
      });
    </script>

<script type="text/javascript">
$(document).ready(function (e) {
    $('.checkbox').on('click','.running',function(){
        $(this).closest('.col-sm-10 #input#row-to-1').attr('value', 'yo');
    });
    $('.checkbox').on('change','.running',function(){
        if($(this).is(":checked")){
            $(this).closest('.col-sm-10').find('.jd-to').val('Running');
        }else{
            $(this).closest('.col-sm-10').find('.jd-to').val('');
        }
    });

    $('input[required="required"]').on('focusout',function(){
        if ( $(this).val() === '' ){
            $(this).css('border-color','red');
            $(this).attr('placeholder','please input the required field.');
        }else{
            $(this).css('border-color','#ccc');
        }
    });
  $('#inputFile').change(function() {
  var filename = $('#inputFile').val().split('\\').pop();
          $('#filename').val(filename);
          var file_data = $("#inputFile").prop("files")[0];
          var form_data = new FormData();
          form_data.append("userImage", file_data);
          $.ajax({
          url: "upload.php",
                  type: "POST",
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(data)
                  {
                  $("#targetLayer").html(data);
                  },
                  error: function()
                  {
                  }
          });
  });
    $( ".radioset" ).buttonset();
    $('.datepicker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        yearRange: '1950:2020',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
 });







</script>  

</body>
