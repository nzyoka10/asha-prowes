<?php
require_once("../includes/initialize.php"); 
 if (!isset($_SESSION['ClientID'])){
  redirect(web_root."index.php");
 }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'notification' :
		$content    = 'notification.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	case 'changepassword' :
		$content    = 'changepassword.php';		
		break;
	default :
		$content    = 'profile.php';		
} 
?>
  
<?php
  $sql = "SELECT count(*) as num FROM `tblrequest` WHERE `Status`='Confirmed' AND `Viewed`=0";
  $mydb->setQuery($sql);
  $notify_num = $mydb->loadSingleResult();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo web_root;?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,500"> 
    <link rel="stylesheet" href="<?php echo web_root;?>css/style.css"> 
    <link rel="stylesheet" href="<?php echo web_root;?>font-awesome/css/material-design-iconic-font.min.css"> 
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <header class="section page-header">

        <style type="text/css">

          .top-nav { 
              width: 100%;  
              background-color: #434547;
              float: left; 
              z-index: 99999999;
          }
      
          .top-nav ul{ 
            padding-right: 50px;   
          }

          .top-nav ul li   { 
            padding: 0px 10px;  
            display: inline;
          } 

          .clear-fix {
            clear: both;
          } 
         .top-nav .notif{ 
            border-radius: 4px;
            background-color: #DD5044;
            padding: 2px 4px; 
            color: #fff;
          }
          
        </style> 
          <nav class="menu">
            <div class="top-nav">
              <ul class="pull-right">
                <?php if (!isset($_SESSION['ClientID'])) { ?> 
                <li><a href="<?php echo web_root;?>index.php?q=spregister">Register as Service Provider</a></li>
                <li><a href="<?php echo web_root;?>index.php?q=cregister">Register as Client</a></li>
                <li><a href="<?php echo web_root;?>index.php?q=login">Login</a></li>
                <?php }else{ ?> 
                  <li><a href="<?php echo web_root;?>">Home</a></li>
                  <li><a title="Notification" href="<?php echo web_root;?>client/index.php?view=notification"><i class="fa fa-bell"></i> <span class="notif"><?php echo $notify_num->num; ?></span></a></li>
                  <li><a href="<?php echo web_root;?>client/">Profile</a></li>
                  <li><a href="<?php echo web_root;?>logout.php">Logout</a></li>
                <?php }?>
              </ul>
            </div>
          </nav>
          <div class="clear-fix"></div>
 
      </header>
 
     <div style="min-height: 200px"> 
     <?php  require_once $content ;?>
   </div>


      <!--Contacts-->
      <section class="section section-lg bg-gray-700">
        <div class="container">
          <div class="row row-30">
            <div class="col-lg-4">
              <div class="row row-30">
                <div class="col-sm-6 col-lg-12 wow fadeInRight">
                  <article class="info-classic align-items-center">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-map-marker"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="#">4578 Marmora Road,Glasgow D04 89GR</a></div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 col-lg-12 wow fadeInRight" data-wow-delay=".05s">
                  <article class="info-classic align-items-center">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-envelope"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="mailto:#">info@demolink.org</a></div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row row-30">
                <div class="col-sm-6 col-lg-12 wow fadeInRight" data-wow-delay=".1s">
                  <article class="info-classic align-items-center info-classic-2">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-phone"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="tel:#">800-2345-6789</a></div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 col-lg-12 wow fadeInRight">
                  <article class="info-classic align-items-center info-classic-2">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-fax"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="tel:#">800-2345-6790</a></div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row row-30">
                <div class="col-sm-6 col-lg-12 wow fadeInRight" data-wow-delay=".05s">
                  <article class="info-classic align-items-center">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-facebook"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="#">Follow on Facebook</a></div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 col-lg-12 wow fadeInRight" data-wow-delay=".1s">
                  <article class="info-classic align-items-center">
                    <div class="unit unit-spacing-md align-items-center flex-column flex-md-row text-center text-md-left">
                      <div class="unit-left">
                        <div class="info-classic-icon fa-twitter"></div>
                      </div>
                      <div class="unit-body"><a class="info-classic-link" href="#">Follow on Twitter</a></div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="section footer-classic">
        <div class="container">
          <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Mustafa</span><span>.&nbsp;</span></p>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="<?php echo web_root;?>js/core.min.js"></script>
    <script src="<?php echo web_root;?>js/script.js"></script>
  </body>
</html>

 <script type="text/javascript"> 
    function initialize() { 
      var input = document.getElementById('ServiceAddress');
      var searchBox = new google.maps.places.SearchBox(input); 
    } 
    $(document).ready(function() {
        initialize();
    });
 
  </script>   
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>
  <script type="text/javascript">

  $("#ServiceAddress").on("keyup",function(){ 
      var geocoder = new google.maps.Geocoder();
      var address = $(this).val();
      if (address=='' ) {
          $("#lat").val('');
          $("#lng").val('');
      }else{
         geocoder.geocode( { 'address': address}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
              var latitude = results[0].geometry.location.lat();
              var longitude = results[0].geometry.location.lng();

              $("#lat").val(latitude);
              $("#lng").val(longitude);

              // alert(latitude);
              // alert(longitude)
            } 
          }); 
      } 
  });


</script>

 <?php    
// SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`
// , `lat`, `lng`, `Services`, `spUsername`, `spPassword`, `Status`, `PicLoc` FROM `tblserviceprovider` WHERE 1
      $mydb->setQuery("SELECT * FROM  `tblserviceprovider`");
      $cur = $mydb->loadResultList();

      foreach ($cur as $result) {
       $lat = $result->lat;
       $lng = $result->lng; 

        $data[] =array( $result->ServiceName,$result->ServiceAddress,$result->lat,$result->lng,"index.php?q=item&services=".$result->ServiceID);
 
     }   
  ?>
 

<script>
        /**
         * Create new map
         */
        var infowindow;
        var map;
        var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
        var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
        var marker;  
        var locations = <?php echo json_encode($data) ?>;  
        var i ; 

        // for current location
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();

          LatLng = {lat:<?php echo $lat;?>, lng:<?php echo $lng;?>}; 
       
        // LatLng = {lat:7.649989930233852, lng:126.01883687540885}; 
        map = new google.maps.Map(document.getElementById('map'), {zoom: 9, center: LatLng});   

         var input = document.getElementById('map-title'); 
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      /**
         * loop through (Mysql) dynamic locations to add markers to map.
         */ 


        var i ; 
        for (i = 0; i < locations.length; i++) {
                  var title = locations[i][0];
                  var address = locations[i][1];
                  var url = locations[i][4];

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                map: map,
                icon :  red_icon,
                html:  "<div><h4>" + title + "</h4><p>" + address + "<br></div><a href='" + url + "'>View Offers</a></p><p><button  id='btnDirection' class='fa fa-road' >View Route</button></p></div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();  
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);

 
                     // $('#btnDirection').bind('click', function() {          
                     //    alert("hello direction") 
                     //  }); 

                     $('body').on('click', '#btnDirection', function() {
                           if ("geolocation" in navigator){
                              navigator.geolocation.getCurrentPosition(function(position){

                                  var currentLatitude = position.coords.latitude;
                                  var currentLongitude = position.coords.longitude;
                                  LatLng ={lat:currentLatitude,lng:currentLongitude}
                                  directionsDisplay = new google.maps.DirectionsRenderer(); 
                                  map = new google.maps.Map(document.getElementById('map'), {zoom: 10, center: LatLng});  
                   
                                  for (i = 0; i < locations.length; i++) { 
                                      var  start = new google.maps.LatLng(currentLatitude, currentLongitude); 
                                      var end = new google.maps.LatLng(locations[i][2], locations[i][3]);


                                      calcRoute(start,end)

                                  } 


                              });
                            }
                    });
 

                  

                }
            })(marker, i));
        } 




    function calcRoute(start,end) { 
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                // alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
    }
 

 
    </script>
<script type="text/javascript">
  $(document).ready(function(){
    $('ul.tabs li').click(function(){
      var tab_id = $(this).attr('data-tab');

      $('ul.tabs li').removeClass('current');
      $('.tab-content').removeClass('current');

      $(this).addClass('current');
      $("#"+tab_id).addClass('current');
    });
  });
</script> 