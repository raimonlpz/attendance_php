<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['speciality'];
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess) {
            include 'includes/successmessage.php';
        } else {
            include 'includes/errormessage.php';
        }
    }
?>




<!-- <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php // echo $_GET['firstname'].' '. $_GET['lastname'];?></h5>
        <h5 class="card-subtitle mb-2 text-muted"><?php  //echo $_GET['speciality']; ?></h5>
        <p class="card-text">Date of Birth: <?php // echo $_GET['dob'];?></p>
        <p class="card-text">Email: <?php // echo $_GET['email'];?></p>
        <p class="card-text">Phone: <?php // echo $_GET['phone'];?></p>
    </div>
</div> -->
    <?php
        // echo $_GET['firstname'];
        // echo "<br />";
        // echo $_GET['lastname'];
        // echo "<br />";
        // echo $_GET['dob'];
        // echo "<br />";
        // echo $_GET['speciality'];
        // echo "<br />";
        // echo $_GET['email'];
        // echo "<br />";
        // echo $_GET['phone'];
    ?>
<?php 
    require_once 'includes/footer.php';
?>