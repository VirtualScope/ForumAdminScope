<?php
$secured = false;
$page = "home";
include('includes/header.inc.php');
?>

<h1 class="mt-5"></h1>
      <div class="jumbotron"> <!--https://getbootstrap.com/docs/4.0/examples/jumbotron/-->
        <div class="container">
          <h1 class="display-3">Welcome, Admin!</h1>
          <p>Use this site to manage your users and their comments!</p>
          <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Documentation &raquo;</a></p>-->
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
          <div class="card">
                <img class="card-img-top" src="./chairs-classroom-college-desks-289740.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">View Students</h5>
                    <p class="card-text">Need to find a user? Need to delete a user? This is your place!</p>
                    <a href="./view.php" class="btn btn-primary">Go to <b>View Students</b> Page</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
          <div class="card">
                <img class="card-img-top" src="./abc-books-chalk-chalkboard-265076.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Add Students</h5>
                    <p class="card-text">Need to add people to your class. Here is the place to be!</p>
                    <a href="./insert.php" class="btn btn-primary">Go to <b>Add Students</b> Page</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="./alphabet-class-conceptual-cube-301926.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Manage Comments</h5>
                    <p class="card-text">Need to delete someone's comment? This is for you!</p>
                    <a href="comments.php" class="btn btn-primary">Go to <b>Manage Comments</b> Page</a>
                </div>
            </div>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->
<?php
include("includes/footer.inc.php");
?>