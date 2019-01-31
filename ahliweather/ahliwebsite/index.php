<?php
  require "header.php";
?>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <!--<?php
             //if (isset($_SESSION['userid'])) {
             //  echo "<p>You are logged in!</p>";
             //} else {
              // echo "<p>You are logged out!</p>";
             //}
            ?>  -->
          </div>
        </div>
      </div>
      <?php require "disclaimer.php"; ?>
      <div class="container">
          <div class="row" style="padding-top: 50px">
              <div class="col" >
                  <button type="button" class="btn btn-primary btn-lg float-right" >Show Data</button>
              </div>
              <div class="col" >
                  <button type="button" class="btn btn-secondary btn-lg">Download</button>
              </div>
          </div>
      </div>
    </main>

<?php
  require "footer.php";
?>
