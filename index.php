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

    <!-- main section (events) -->
    <main class="events">
        <div class="container mt-md">
            <!-- heading-section -->
            <section class="heading">
                <div class="row align-items-end">
                    <div class="col-4">
                        <a href="create.php" class="btn btn__submit">Add Event</a>
                    </div>
                    <div class="col-8">
                        <h1 class="heading-1 mt-lg">Sport Events Calendar</h1>
                    </div>
                </div>
            </section>
            <!-- .heading-section -->
            
            <!-- events section -->
            <section class="events mt-lg">
                <div class="row">
                    <div class="col-12">
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Attempt select query execution
                        $sql = "SELECT * FROM events";

                        if ($result = $pdo->query($sql)) {
                            if ($result->rowCount() > 0) {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm xtable-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Sport</th>
                                        <th scope="col">Team 1</th>
                                        <th scope="col">Team 2</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row = $result->fetch()) {
                                ?>
                                    <tr>
                                        <!-- <td><?php //echo $row['id']?></td> -->
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['time']?></td>
                                        <td><?php 
                                            if ($row['sport_id'] == 1) { 
                                                echo 'Football'; 
                                            } elseif ($row['sport_id'] == 2)  { 
                                                echo "Hockey";
                                            } else {
                                                echo "";
                                            } 
                                            ?>
                                        </td>
                                        <td><?php echo $row['team_1']?></td>
                                        <td><?php echo $row['team_2']?></td>
                                        <td>
                                            <?php echo "<a href='update.php?id=". $row['id'] ."' title='Update Record'><ion-icon name='create-outline'></ion-icon></a>";
                                                echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record'><ion-icon name='trash-outline'></ion-icon></a>";
                                            ?>
                                        </td>
                                    </tr>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php 
                        // Free result set
                        unset($result);
                        
                            } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                        }

                        
                        // Close connection
                        unset($pdo);
                        ?>
                    </div>
                </div>
            </section>
            <!-- .events-section -->
        </div>
    </main>
    <!-- .main-section (events) -->

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