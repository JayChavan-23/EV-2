<?php

    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="modal fade" id="allbikes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="name" name="allbikes_brand" class="form-control" placeholder="Enter Brand name"
                            required>
                    </div>
                    <div class="form-group">
                        <label> Model Name </label>
                        <input type="name" name="allbikes_model" class="form-control" placeholder="Enter Model name"
                            required>
                    </div>
                    <div class="form-group">
                        <label> Upload Bike Image </label>
                        <input type="file" name="allbikes_img" id="allbikesimage" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Price </label>
                        <input type="text" name="allbikes_price" class="form-control" placeholder="Enter Bike price"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_allbikes" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Store Bikes
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#allbikes">
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
                <?php
                    $query = "SELECT * FROM allbikes";
                    $query_run=mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        
                        ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['allbikebrand'] ?></td>
                            <td><?php echo $row['allbikemodel'] ?></td>
                            <td><?php echo '<img src="upload/'.$row['allbikeimg'].'" width="100px;" height="100px;" alt="Bike Image">'?>
                            </td>
                            <td><?php echo $row['allbikeprice'] ?></td>
                            <td>
                                <form action="allbikes_edit.php" method="POST">
                                    <input type="hidden" name="allbike_edit_id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" name="allbike_edit_data_btn"
                                        class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="allbikes_delete_id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" name="allbikes_delete_btn"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php

                            }
                        ?>

                    </tbody>
                </table>
                <?php
                    }
                    else{
                        echo "No Record Found";
                    }
                ?>

            </div>
        </div>
    </div>
</div>


<?php 
include('includes/scripts.php');
?>