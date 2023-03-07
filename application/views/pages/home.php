<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" />
        
        <!-- Bootstrap Css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- Pannellum Css Link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
        
        
        <!-- FontAwesome Link - Start -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FontAwesome Link - End -->

        <!-- Custom Css Link -->
        <link href="http://localhost/360/assets/style.css" rel="stylesheet">
    </head>

    <body>
        <?php

            $link =  $query->link_360;
            $store_title = $query->storename;
            $userid = $query->userid;
            $logo_link1 = 'visualez.com/users/'.$userid.'/logo.png';
            $logo_link2 = 'visualez.com/users/'.$userid.'/logo.jpg';

            $bottom_bar = json_decode($query->tile_data);

            $supported_image1 = array('png');
            $supported_image2 = array('jpg');
            
            $checkValue = 0;
            $ext1 = strtolower(pathinfo($logo_link1, PATHINFO_EXTENSION));
            $ext2 = strtolower(pathinfo($logo_link2, PATHINFO_EXTENSION));
            
            if (in_array($ext1, $supported_image1)){
                $checkValue = 1;
            }elseif(in_array($ext2, $supported_image2)){
                $checkValue = 2;
            }

            $unique_tiles = $query->unique_tiles;
            $unique_tiles_link = 'https://www.visualez.com/uploadtile/tiles/combined/'. $unique_tiles;
            //echo $unique_tiles_link;

            //echo count(array_keys((array)$bottom_bar));
            //echo count($bottom_bar->planes);
            //print_r(isset($bottom_bar->planes[0]->tilename));
            //$Name_array = explode("_", $bottom_bar_name, 5);
            //print_r($Name_array);
            
        ?>
        <div class="tiles_link">
            <?php
                $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if($checkValue == 1){ ?>
                <img class="design-image" src="https://<?php echo $logo_link1 ?>" alt="logos" title="Logo">
                <?php }elseif($checkValue == 2){ ?>
                <img class="design-image" src="https://<?php echo $logo_link2 ?>" alt="logos" title="Logo">
                <?php } ?>
            <img width="300px" height="auto" src="<?php (isset($unique_tiles_link)) ? print_r($unique_tiles_link) : ''; ?>" alt="">
        </div>
        <div class='design'>
            <div>
                <?php
                $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if($checkValue == 1){ ?>
                <img class="design-image" src="https://<?php echo $logo_link1 ?>" alt="logos" title="Logo">
                <?php }elseif($checkValue == 2){ ?>
                <img class="design-image" src="https://<?php echo $logo_link2 ?>" alt="logos" title="Logo">
                <?php } ?>
                
            </div>
            <div class="dropdown">
                <span title="Share" style="color:white;"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                <span title="Info" style="color:white;" id="show-hidden-info"><i class="fa-solid fa-info"></i></span>
                <ul class="dropdown-menu" onclick="event.stopPropagation()" aria-labelledby="dropdownMenuButton1" style="transform: translate(-28px, 18px);">
                    <li title="Facebook"><a class="dropdown-item" target="_blank" href="http://www.facebook.com/sharer.php?u=<?=$site_url?>"><i style="color: #3b5998;" class="fa-brands fa-square-facebook"></i></a></li>
                    <li title="Twitter"><a class="dropdown-item" target="_blank" href="https://twitter.com/share?url=<?=$site_url?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons"><i style="color: #00acee;" class="fa-brands fa-square-twitter"></i></i></a></li>
                    <li title="LinkedIn"><a class="dropdown-item" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$site_url?>"><i style="color: #0072b1;" class="fa-brands fa-linkedin"></i></a></li>
                    <li title="Copy to Clipboard" style="cursor: pointer;" onclick="copy('<?php echo $site_url?>','#copy_button_1')" id="copy_button_1" class="copy-button"  class="dropdown-item" ><i style="color: #5A5A5A;" class="fa-solid fa-copy"></i></li>
                </ul>
            </div>
        </div>
        <div class="footer" style="display: none;">
            <?php 
            $bar_check = 0;
            for ($x = 0; $x < count($bottom_bar->planes)-1; $x++) {
                $bottom_bar_name = $bottom_bar->planes[$x]->tilename;
                if($bottom_bar_name){
                    $bar_check++;
                    $Name_array = explode("_", $bottom_bar_name[0], 5);
                    $items[$bar_check] = $Name_array;
                }
            } 
            ?>
            <div class="inner-footer">
                <ul class="list p-0">
                    <li><?php (isset($items[1][0])) ? print_r(ucwords($items[1][0])) : 'Bottochino Crema'; ?></li>
                    <li><?php (isset($items[1][1])) ? print_r($items[1][1]) : '0'; ?>x<?php (isset($items[1][2])) ? print_r($items[1][2]) : '0'; ?></li>
                    <li><?php (isset($items[1][3])) ? print_r($items[1][3]) : 'Hi Glossy'; ?></li>
                </ul>
            </div>
            <div class="vr p-0"></div>
            <?php
            $check2 = 1;
            for($a = 2; $a <= count($items); $a++){
                $flag = true;
                for($b = 1; $b < $a; $b++){
                    if($items[$a][0] == $items[$b][0]){
                        $flag = false;
                    }
                }
                if($flag){
                    $check2++;
            ?>
            <div class="inner-footer">
                <ul class="list p-0">
                    <li><?php (isset($items[$a][0])) ? print_r(ucwords($items[$a][0])) : 'Bottochino Crema'; ?></li>
                    <li><?php (isset($items[$a][1])) ? print_r($items[$a][1]) : '0'; ?>x<?php (isset($items[$a][2])) ? print_r($items[$a][2]) : '0'; ?></li>
                    <li><?php (isset($items[$a][3])) ? print_r($items[$a][3]) : 'Hi Glossy'; ?></li>
                </ul>
            </div>
            <?php
                if($check2 != 4){ ?>
                <div class="vr p-0"></div>
                <?php }
                }
                if($check2 == 4){
                    break;
                } 
            }
            ?>

            <div class="footer-btn">
               <!-- <button>Powered By <b>Visualze</b></button> -->
            </div>
        </div>
        
        <!-- Pannellum base div -->
        <div id="panorama" style="position: relative;"></div>

        <!-- Bootstrap Js Link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- Query Js Link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Pannellum JS Link -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

        <script>
		var x = screen.width;
    		var y = screen.height;
    		console.log("width " + x + " height " + y);
    		var fov = 0;
    		if (x > y) {
      		fov = 90
    		} else {
      		fov = 50
    		}
            /* 3D Image Viewer (Pannellum https://pannellum.org/) - Start */
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": '<?php echo $link ?>',
                "autoLoad": true,
		"autoRotate": -20,
      		"hfov": fov,
      		"minHfov": 30,
      		"maxHfov": 100,
      		"pitch":-5,
                "preview": "https://www.visualez.com/360/assets/images/Loading Screen Windows.jpg"
            });
            /* 3D Image Viewer (Pannellum https://pannellum.org/) - End */



            /* Change the Loading Bar Text - Start */
            let txt = document.getElementsByTagName("p")[0].innerHTML = "Loading up an amazing 3D View...";
            /* Change the Loading Bar Text - End */



            /* Show and Hide the Bottom Bar - Start */
            $(document).ready(function() {
                $("#fooT").hide();
                $('#show-hidden-info').click(function() {
                    $('.footer').slideToggle("slow");
                });
            });
            /* Show and Hide the Bottom Bar - End */



            /* Show Tooltip on click the Copy to Clipboard - Start */
            function copy(text, target) {
            setTimeout(function() {
            $('#copied_tip').remove();
            }, 800);
            $(target).append("<div class='tip' id='copied_tip'>Copied!</div>");
            var input = document.createElement('input');
            input.setAttribute('value', text);
            document.body.appendChild(input);
            input.select();
            var result = document.execCommand('copy');
            document.body.removeChild(input)
            return result;
            }
            /* Show Tooltip on click the Copy to Clipboard - End */


            /* Disable Right-Click Menu - Start*/
            $(function() {
                $(this).bind("contextmenu", function(e) {
                    e.preventDefault();
                });
            });
            /* Disable Right-Click Menu - End*/

        </script>
        
    </body>
</html>