<script>

$(document).ready(function(){
$('body').fadeIn(1000);
});

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

$(function(){
    $(window).scroll(function() { 
        if ($(this).scrollTop() > 0) { 
            $("#user").css('background','rgba(0, 0, 0, .5)');
            $("#user a").css('color', '#fff');  
            
        } 
        else {     
            $("#user").css('background', 'rgba(0,0,0,0)');
            $("#user a").css('color', 'rgba(255,255,255, .6)'); 
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
console.log(data);
$("#success").show().fadeOut(5000); 
$('#addGoalText').val("");
},
error:function(data){
$("#error").show().fadeOut(5000);
}
});

});
});

</script>

</body>

</html>
