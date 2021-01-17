<?php
    $title = 'Home';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>
<!--
    First Name
    Last Name
    Date of Birth (Use datePicker)
    Speciality (Database Admin, Software Developer, Web Admin)
    Email Address
    Contact Number
-->
    <h1 class="text-center">Registration for IT Conference</h1>
    <form method="post" action="success.php" style="width: 55%; margin-bottom: 5%; margin-left: 50%; transform: translateX(-50%);">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" placeholder="Your Name" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" placeholder="Your Lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input required type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select required class="form-select" aria-label="Expertise Selection" id="speciality" name="speciality">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name'] ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark btn-lg" name="submit">Submit</button>
        </div>
       
    </form>
<?php
    require_once 'includes/footer.php';
?>