  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey w3-centered">
    <h4></h4>
    <p class="w3-center">Powered by NACOSS Software Directorate Yusuf Maitama Sule University, Kano</p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Accordion 
function myAccFunc(arg) {
    var x = document.getElementById(arg);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
