<div class="showcase-wrapper">
  <a class="show-prev" onclick="PSlides(-1)">&#10094;</a>
  <a class="show-next" onclick="PSlides(1)">&#10095;</a>

  <?php 
    require("config/database.php");
    $sql = "SELECT * FROM book";
    $execute = $db->query($sql);

    while ($book = $execute->fetch_assoc()) {
  ?>

  <div class="showcase-inner slides">
    <div class="book-cover">
      <img src="assets/uploads/<?php echo $book["cover_img"]; ?>">
    </div>

    <div class="current-detail">
      <h3><?php echo $book["name"]; ?></h3>
      <div class="sinop">
        <?php echo $book["sinop"]; ?>    
      </div>
    </div>
  </div>

  <?php
    }
  ?>
</div>
<script type="text/javascript">
var sIndex = 1;
SSlides(sIndex);

// Next/previous controls
function PSlides(n) {
  SSlides(sIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  SSlides(sIndex = n);
}

function SSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides");
  if (n > slides.length) {sIndex = 1}
  if (n < 1) {sIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[sIndex-1].style.display = "flex";
} 
</script>