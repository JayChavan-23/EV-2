<?php

    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="modal fade" id="popularBikes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="form-group">
                <label> Brand Name </label>
                <input type="name" name="popular_brand" class="form-control" placeholder="Enter Brand name" required>
            </div>
            <div class="form-group">
                <label> Model Name </label>
                <input type="name" name="popular_model" class="form-control" placeholder="Enter Model name" required>
            </div>
            <div class="form-group">
                <label> Upload Bike Image </label>
                <input type="file" name="popular_img" id="bikeimage" class="form-control" required>
            </div>
            <div class="form-group">
                <label> Top Speed </label>
                <input type="text" name="popular_topspeed" class="form-control" placeholder="Enter Top speed" required>
            </div>
            <div class="form-group">
                <label> Charge Time </label>
                <input type="text" name="popular_charge" class="form-control" placeholder="Enter Charge time" required>
            </div>
            <div class="form-group">
                <label> Range </label>
                <input type="text" name="popular_range" class="form-control" placeholder="Enter Bike range" required>
            </div>
            <div class="form-group">
                <label> Price </label>
                <input type="text" name="popular_price" class="form-control" placeholder="Enter Bike price" required>
            </div>
            <div class="form-group">
                <label> link </label>
                <input type="text" name="popular_link" class="form-control" placeholder="Enter info link" required>
            </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_popularbike" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Popular Bikes
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popularBikes">
                    Add
                </button>
            </h6>
        </div>
        <div class="card-body">
        <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!='')
                {
                    echo '<h2> '.$_SESSION['status'].' </h2>';
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['status']) && $_SESSION['status']!='')
                {
                    echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
                    unset($_SESSION['status']);
                }
        ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Image</th>
                            <th>Top Speed</th>
                            <th>Charge Time</th>
                            <th>Range</th>
                            <th>Price</th>
                            <th>link</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<?php 
include('includes/scripts.php');
?>