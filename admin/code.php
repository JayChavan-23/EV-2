<?php
include('security.php');

if(isset($_POST['save_popularbike'])){
    $brand = $_POST['popular_brand'];
    $model = $_POST['popular_model'];
    $img = $_FILES["popular_img"]['name'];
    $topspeed = $_POST['popular_topspeed'];
    $charge = $_POST['popular_charge'];
    $range = $_POST['popular_range'];
    $price = $_POST['popular_price'];
    $link = $_POST['popular_link'];

    if(file_exists("upload/" . $_FILES["popular_img"]["name"])){
        $store = $_FILES["popular_img"]["name"];
        $_SESSION['status']= "Image already exists '.$store.'";
        header('Location:popular.php');
    }
    else{

        $query = "INSERT INTO popular_bikes (`brand`,`model`,`img`,`topspeed`,`charge`,`bikerange`,`price`,`link`) VALUES ('$brand','$model','$img','$topspeed','$charge','$range','$price','$link')";
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            move_uploaded_file($_FILES["popular_img"]["tmp_name"],"upload/".$_FILES["popular_img"]["name"]);
            $_SESSION['status'] = "Popular Bike Added";
            header('Location:popular.php');
        }
        else{
            $_SESSION['status'] = "Popular Bike Not Added";
            header('Location:popular.php');
        }
    }
}

if(isset($_POST['popular_update_btn']))
{
    $edit_id = $_POST['edit_id'];
    $edit_popular_brand = $_POST['edit_popular_brand'];
    $edit_popular_model = $_POST['edit_popular_model'];
    $edit_popular_img = $_FILES["popular_img"]['name'];
    $edit_popular_topspeed = $_POST['edit_popular_topspeed'];
    $edit_popular_charge = $_POST['edit_popular_charge'];
    $edit_popular_range = $_POST['edit_popular_range'];
    $edit_popular_price = $_POST['edit_popular_price'];
    $edit_popular_link = $_POST['edit_popular_link'];

    $popular_query = "SELECT * FROM popular_bikes WHERE id='$edit_id' ";
    $popular_query_run = mysqli_query($connection,$popular_query);
    foreach($popular_query_run as $popular_row)
    {
        if($edit_popular_img == NULL){
            //update with existing image
            $image_data = $popular_row['img'];
        }
        else{
            //Update with new imageand delete the old image
            if($img_path = "upload/".$popular_row['img']){
                unlink($img_path);
                $image_data = $edit_popular_img;
            }
            
        }
    }

    $query = "UPDATE popular_bikes SET brand='$edit_popular_brand',model='$edit_popular_model',img='$image_data',topspeed='$edit_popular_topspeed',charge='$edit_popular_charge',bikerange='$edit_popular_range',price='$edit_popular_price',link='$edit_popular_link' WHERE id='$edit_id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
        {
            if($edit_popular_img == NULL){
                $_SESSION['status'] = "Popular Bike Updated with existing image";
                header('Location:popular.php');
            }
            else{
                move_uploaded_file($_FILES["popular_img"]["tmp_name"],"upload/".$_FILES["popular_img"]["name"]);
                $_SESSION['status'] = "Popular Bike Updated";
                header('Location:popular.php');
            }
            
        }
        else{
            $_SESSION['status'] = "Popular Bike Details Not Updated";
            header('Location:popular.php');
        }
}



if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email']; 
    $password_login = $_POST['password']; 

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
   } 
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
   }
    
}


?>