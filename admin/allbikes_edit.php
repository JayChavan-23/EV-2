<?php

    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Bike Edit</h6>

        </div>
    </div>
    <div class="card-body">
        <?php
            if(isset($_POST['allbike_edit_data_btn'])){
                $id = $_POST['allbike_edit_id'];
                $query = "SELECT * FROM allbikes WHERE id='$id'";
                $query_run=mysqli_query($connection,$query);

                foreach($query_run as $row)
                {
        ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_allbike_id" value="<?php echo $row['id'] ?>">

            <div class="form-group">
                <label> Brand Name </label>
                <input type="name" name="edit_allbike_brand" value="<?php echo $row['allbikebrand'] ?>"
                    class="form-control">
            </div>
            <div class="form-group">
                <label> Model Name </label>
                <input type="name" name="edit_allbike_model" value="<?php echo $row['allbikemodel'] ?>"
                    class="form-control">
            </div>
            <div class="form-group">
                <label> Upload Bike Image </label>
                <input type="file" name="allbike_img" id="allbike_img" values="<?php echo $row['allbikeimg'] ?>"
                    class="form-control">
            </div>

            <div class="form-group">
                <label> Price </label>
                <input type="text" name="edit_allbike_price" value="<?php echo $row['allbikeprice'] ?>"
                    class="form-control">
            </div>

            <a href="allbikes.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="allbike_update_btn" class="btn btn-primary">Update</button>
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