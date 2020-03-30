<?php 
  require("config/database.php");

  $sql = "SELECT * FROM site_slider";
  $execute = $db->query($sql);
?>

<div class="slideshow-container">
  <div class="slideshow-inner">

  <?php while ($slideshow = $execute->fetch_assoc()) { ?>
  
  <div class="mySlides fade">

    <img  src='assets/uploadsSlideshow/<?php echo $slideshow["img"];?>' style='width: 100%;' alt="<?php echo $slideshow["caption"]; ?>"/>
    <div class="text"><?php echo $slideshow["caption"]; ?></div>
  </div>

  <?php } ?>

  </div>


  <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
  <a class="next" onclick='plusSlides(1)'>&#10095;</a>
</div>

</div>
<script type="text/javascript">
var slideIndex = 1;

var myTimer;

var slideshowContainer;

window.addEventListener("load",function() {
    showSlides(slideIndex);
    myTimer = setInterval(function(){plusSlides(1)}, 4000);
  
    //COMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    slideshowContainer = document.getElementsByClassName('slideshow-inner')[0];
  
    //UNCOMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    // slideshowContainer = document.getElementsByClassName('slideshow-container')[0];
  
    slideshowContainer.addEventListener('mouseenter', pause)
    slideshowContainer.addEventListener('mouseleave', resume)
})

// NEXT AND PREVIOUS CONTROL
function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
  
  //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
  
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
  } else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  }
}

//Controls the current slide and resets interval if needed
function currentSlide(n){
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

pause = () => {
  clearInterval(myTimer);
}

resume = () =>{
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
}
</script>
<!-- End .script -->