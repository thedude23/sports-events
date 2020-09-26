<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportradar Calendar</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

    <div class="container mt-md">
        <!-- main section -->
        <main>
            <!-- heading-section -->
            <section class="heading">
                <div class="row">
                    <div class="col-12">
                        <h1 class="heading-1 text-center mt-lg">Calendar</h1>
                    </div>
                </div>
            </section>
            <!-- .heading-section -->

            <!-- .events-section -->
            <section class="events mt-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Sport</th>
                            <th scope="col">Team 1</th>
                            <th scope="col">Team 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>18.7.2019</td>
                            <td>18:30</td>
                            <td>Football</td>
                            <td>Salzburg</td>
                            <td>Sturm</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>23.10.2019</td>
                            <td>09:45</td>
                            <td>Hockey</td>
                            <td>KAC</td>
                            <td>Capitals</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <!-- .events-section -->
        </main>
        <!-- .main-section -->
    </div>

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