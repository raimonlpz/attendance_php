<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    if (!isset($_GET['id'])) {
       
        include 'includes/errormessage.php';
        header('Location: viewrecords.php');

    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
?>
<!--
    First Name
    Last Name
    Date of Birth (Use datePicker)
    Speciality (Database Admin, Software Developer, Web Admin)
    Email Address
    Contact Number
-->
    <h1 class="text-center">Edit Record</h1>
    <form method="post" action="editpost.php" style="width: 55%; margin-bottom: 5%; margin-left: 50%; transform: translateX(-50%);">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" placeholder="Your Name" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label" >Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Your Lastname" name="lastname" value="<?php echo $attendee['lastname'] ?>">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofbirth'] ?>">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Expertise Selection" id="speciality" name="speciality">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name'] ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $attendee['emailaddress'] ?>"> 
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" value="<?php echo $attendee['contactnumber'] ?>">
            <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg" name="submit">Save Changes</button>
        </div>
       
    </form>

<?php } ?>
<?php
    require_once 'includes/footer.php';
?>