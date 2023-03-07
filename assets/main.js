/* 3D Image Viewer (Pannellum https://pannellum.org/) - Start */
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": '<?php echo $link ?>',
    "autoLoad": true,
    // "title": '<?php echo $store_title ?>'
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

