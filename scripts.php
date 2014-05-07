<script src="http://foundation.zurb.com/assets/js/modernizr.js"></script>
<script src="http://foundation.zurb.com/assets/js/templates/foundation.js"></script>
<script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
</script>
<script src="http://foundation.zurb.com/assets/js/jquery.js"></script>
<script>
$(window).load(function() {
	$(".loader").delay(1000).fadeOut("slow");
})


$(document).ready(function(){
$('body').fadeIn(1000);
});

$("#goalLoad").load("goalLoad.php");
$("#goalDelete").load("goalDelete.php");

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 700);
        return false;
      }
    }
  });
});

$('.delete').click(function() {
$('.deleteWarning').show();
$(this).hide();			      
});

$(function(){
    $(window).scroll(function() { 
        if ($(this).scrollTop() > 0) { 
            $("#user").css('background','rgba(0, 0, 0, .5)');
	    $("#user a").css('color', '#fff');  
        } 
        else {     
            $("#user").css('background', 'rgba(0,0,0,0)');
	    $("#user a").css('color', '#666666');	 
        }  
    });
});

$( document ).ready( function() {
            var $body = $('body'); 

            var setBodyScale = function() {
                var scaleSource = $body.width(),
                    scaleFactor = 0.17,                     
                    maxScale = 190,
                    minScale = 10; 

                var fontSize = scaleSource * scaleFactor; 

                if (fontSize > maxScale) fontSize = maxScale;
                if (fontSize < minScale) fontSize = minScale; 

                $('.zoom').css('font-size', fontSize + '%');
            }

            $(window).resize(function(){
                setBodyScale();
            });

            setBodyScale();
        });

$(document).ready(function(){
$('#newGoal').on('submit', function(e) {
e.preventDefault();
$.ajax({
url:'newGoal.php',
data:$(this).serialize(),
type:'POST',
success:function(data){
$("#goalLoad").load("goalLoad.php");
$("#goalDelete").load("goalDelete.php");
console.log(data);
$("#success").css('opacity', '1').fadeTo(3000,0);
$('#addGoalText').val("");
},
error:function(data){
$("#error").css('opacity', '1').fadeTo(3000,0);
}
});
});
});

$('.dropLi a').click(function(){
$('.top-bar').removeClass('expanded');
});

</script>

</body>

</html>
