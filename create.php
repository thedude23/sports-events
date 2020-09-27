<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$date = $time = $sport = $team_1 = $team_2 = "";
$date_err = $time_err = $sport_err = $team_1_err = $team_2_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate date
    $input_date = trim($_POST["date"]);
    if(empty($input_date)) {
        $date_err = "Please enter a date.";
    // } elseif(!filter_var($input_date, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $date_err = "Please enter a valid date.";
    } else {
        $date = $input_date;
    }

    // Validate time
    $input_time= trim($_POST["time"]);
    if(empty($input_time)) {
        $time_err = "Please enter a time.";
    // } elseif(!filter_var($input_team_1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $team_1_err = "Please enter a valid team.";
    } else {
        $time = $input_time;
    }

    // Validate sport
    $input_sport = trim($_POST["sport_id"]);
    if(empty($input_sport)) {
        $sport_err = "Please enter sport (sport_id).";     
    } elseif(!ctype_digit($input_sport)) {
        $sport_err = "Please enter a valid sport (sport_id).";
    } else {
        $sport = $input_sport;
    }

    // Validate team_1
    $input_team_1 = trim($_POST["team_1"]);
    if(empty($input_team_1)) {
        $team_1_err = "Please enter a team.";
    // } elseif(!filter_var($input_team_1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $team_1_err = "Please enter a valid team.";
    } else {
        $team_1 = $input_team_1;
    }

    // Validate team_2
    $input_team_2 = trim($_POST["team_2"]);
    if(empty($input_team_2)) {
        $team_2_err = "Please enter a team.";
    // } elseif(!filter_var($input_team_2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $team_2_err = "Please enter a valid team.";
    } else {
        $team_2 = $input_team_2;
    }

    
    // Check input errors before inserting in database
    if(empty($date_err) && empty($time_err) && empty($sport_err) && empty($team_1_err) && empty($team_2_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO events (date, time, sport_id, team_1, team_2) VALUES (:date, :time, :sport_id, :team_1, :team_2)";
         
        if($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":date", $param_date);
            $stmt->bindParam(":time", $param_time);
            $stmt->bindParam(":sport_id", $param_sport);
            $stmt->bindParam(":team_1", $param_team_1);
            $stmt->bindParam(":team_2", $param_team_2);
            
            // Set parameters
            $param_date = $date;
            $param_time = $time;
            $param_sport = $sport;
            $param_team_1 = $team_1;
            $param_team_2 = $team_2;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportradar Calendar</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="header__img">
            <img src="img/logo.png" alt="Logo">
        </div>
    </header>
    <!-- .header -->

    <!-- main section (create-update-form) -->
    <main class="create-update-form">
        <div class="container mt-md">
            <div class="row">
                <div class="offset-2 col-8 offset-2">
                    <h1 class="heading-1 text-center mt-lg mb-sm">Create event</h1>
                    <p class="mb-sm">Please fill this form and submit to add an event record to the database.</p>     
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date (eg. 2020-09-26)</label>
                            <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label>Time (eg. 16:30)</label>
                            <input type="text" name="time" class="form-control" value="<?php echo $time; ?>"> <!--type="time"-->
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sport_err)) ? 'has-error' : ''; ?>">
                            <label>Sport (sport_id)</label>
                            <input type="text" name="sport_id" class="form-control" value="<?php echo $sport; ?>">
                            <span class="help-block"><?php echo $sport_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($team_1_err)) ? 'has-error' : ''; ?>">
                            <label>Team 1</label>
                            <input type="text" name="team_1" class="form-control" value="<?php echo $team_1; ?>">
                            <span class="help-block"><?php echo $team_1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($team_2_err)) ? 'has-error' : ''; ?>">
                            <label>Team 2</label>
                            <input type="text" name="team_2" class="form-control" value="<?php echo $team_2; ?>">
                            <span class="help-block"><?php echo $team_2_err;?></span>
                        </div>
                        <input type="submit" class="btn btn__submit" value="Submit">
                        <a href="index.php" class="btn btn__cancel">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- .main-section (create-update-form) -->

    <!-- footer -->
    <footer class="footer">
        <p><span class="footer__span">Coding Exercise</span> | Made by Tim Koprivnik</p>
    </footer>
    <!-- .footer -->


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
