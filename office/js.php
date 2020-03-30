<script>
  $(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });

  /* Nav Toogle */
    function openNav(){
      document.getElementById("Overlay").style.display = "block";
      document.getElementById("menu-button").style.display = "none";
      document.getElementById("close-button").style.display = "block";
    }

    function closeNav(){
      document.getElementById("Overlay").style.display = "none";
      document.getElementById("menu-button").style.display = "block";
      document.getElementById("close-button").style.display = "none";
    }
  /* End Nav Toggle */

  /* Add Admin */ 
    function add_admin_open(a){
      document.getElementById("Add_admin").style.height = "auto";
      document.getElementById("close_add_admin").style.display = "block";
      document.getElementById("label_add_admin").style.display = "block";
      a.style.display = "none";
    } 

    function add_admin_close(a){
      document.getElementById("Add_admin").style.height = "50px";
      document.getElementById("open_add_admin").style.display = "block";
      document.getElementById("label_add_admin").style.display = "none";
      a.style.display = "none";
    } 
  /* End Add Admin */

  /* Add member */ 
    function add_member_open(a){
      document.getElementById("Add_member").style.height = "auto";
      document.getElementById("close_add_member").style.display = "block";
      document.getElementById("label_add_member").style.display = "block";
      a.style.display = "none";
    } 

    function add_member_close(a){
      document.getElementById("Add_member").style.height = "50px";
      document.getElementById("open_add_member").style.display = "block";
      document.getElementById("label_add_member").style.display = "none";
      a.style.display = "none";
    } 
  /* End Add member */  

  /* Delete Confirm */
  var deleteLinks = document.querySelectorAll('.delete');

  for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
          window.location.href = this.getAttribute('href');
        }
    });
  }
  /* Delete Confirm End */

</script>
