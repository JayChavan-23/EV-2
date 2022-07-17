<?php

    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Popular Bike Edit</h6>

        </div>
    </div>
    <div class="card-body">
        <?php
            if(isset($_POST['edit_data_btn'])){
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM popular_bikes WHERE id='$id'";
                $query_run=mysqli_query($connection,$query);

                foreach($query_run as $row)
                {
        ?>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                 <div class="form-group">
                     <label> Brand Name </label>
                     <input type="name" name="edit_popular_brand" value="<?php echo $row['brand'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Model Name </label>
                     <input type="name" name="edit_popular_model" value="<?php echo $row['model'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Upload Bike Image </label>
                     <input type="file" name="popular_img" id="popular_img" values="<?php echo $row['img'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Top Speed </label>
                     <input type="text" name="edit_popular_topspeed" value="<?php echo $row['topspeed'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Charge Time </label>
                     <input type="text" name="edit_popular_charge" value="<?php echo $row['charge'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Range </label>
                     <input type="text" name="edit_popular_range" value="<?php echo $row['bikerange'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> Price </label>
                     <input type="text" name="edit_popular_price" value="<?php echo $row['price'] ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label> link </label>
                     <input type="text" name="edit_popular_link" value="<?php echo $row['link'] ?>" class="form-control">
                 </div>
                 <a href="popular.php" class="btn btn-danger">Cancel</a>
                 <button type="submit" name="popular_update_btn" class="btn btn-primary">Update</button>
        </form>
        <?php

                }
            }
        ?>
        
    </div>
</div>

<?php
include('includes/scripts.php');

?>