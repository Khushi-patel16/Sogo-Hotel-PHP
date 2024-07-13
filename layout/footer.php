
<?php
$usrq="SELECT * from sitesettingmaster";
$usrres=mysqli_query($connection,$usrq);
$usr=mysqli_fetch_array($usrres);

?>











<footer class="section footer-section">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-3 mb-5">
        <ul class="list-unstyled link">
          <li><a href="about.php">About Us</a></li>
          <li><a href="terms.php">Terms &amp; Conditions</a></li>
          <li><a href="privacy.php">Privacy Policy</a></li>
         <li><a href="room1.php">Rooms</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-5">
        <ul class="list-unstyled link">
          <li><a href="room1.php">The Rooms &amp; Suites</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>

        </ul>
      </div>
      <div class="col-md-3 mb-5 pr-md-5 contact-info">
        <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
        <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> <?php echo $usr["ssmAddress"];?></span></p>
        <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> <?php echo $usr["ssmPhone"];?></span></p>
        <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> <?php echo $usr["ssmEmail"];?></span></p>
      </div>
      <div class="col-md-3 mb-5">
        <p>Sign up for our newsletter</p>
        <form action="#" class="footer-newsletter">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email...">
            <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
          </div>
        </form>
      </div>
    </div>
    <div class="row pt-5">
      <p class="col-md-6 text-left">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> <?php echo $usr["ssmCpt"];?> <i class="icon-heart-o" aria-hidden="true"></i>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
        
      <p class="col-md-6 text-right social">
        <a href="#"><span class="fa fa-tripadvisor"></span></a>
        <a href="#"><span class="fa fa-facebook"></span></a>
        <a href="#"><span class="fa fa-twitter"></span></a>
        <a href="#"><span class="fa fa-linkedin"></span></a>
        <a href="#"><span class="fa fa-vimeo"></span></a>
      </p>
    </div>
  </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
    
    
<script src="js/aos.js"></script>
    
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.timepicker.min.js"></script> 
    
<script src="js/main.js"></script>

</body>
</html>
