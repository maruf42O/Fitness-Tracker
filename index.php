<?php

require_once 'C:\xampp\htdocs\FitnessTracker\app\config\config.php';
require_once 'C:\xampp\htdocs\FitnessTracker\app\config\Database.php';

// Autoloader(load classes automatically)
spl_autoload_register(function ($class) {
    require_once 'app/' . $class . '.php';
});

//application initialization
$database = new Database();

//include 'C:\xampp\htdocs\FitnessTracker\app\views\components\carousel.html';
include 'C:\xampp\htdocs\FitnessTracker\app\views\components\header.html';
include 'C:\xampp\htdocs\FitnessTracker\app\views\components\sign_in_header.html';
include 'C:\xampp\htdocs\FitnessTracker\app\views\components\footer.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Tracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function includeHTML() {
            var z, i, elmnt, file, xhttp;
            z = document.getElementsByTagName("*");
            for (i = 0; i < z.length; i++) {
                elmnt = z[i];           
                file = elmnt.getAttribute("w3-include-html");
                if (file) {                  
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                elmnt.innerHTML = this.responseText;
                            }
                            if (this.status == 404) {
                                elmnt.innerHTML = "Page not found.";
                            }                         
                            elmnt.removeAttribute("w3-include-html");
                            includeHTML();
                        }
                    };
                    xhttp.open("GET", file, true);
                    xhttp.send();
                    return;
                }
            }
        }
    </script>
</head>

<body>
    <!--<div w3-include-html="C:\xampp\htdocs\FitnessTracker\app\views\components\header.html"></div>-->

    <!--<div w3-include-html="C:\xampp\htdocs\FitnessTracker\app\views\components\carousel.html"></div>-->
   
    <div class="container" style="padding-top: 30px">
        <h3 class="text-center">What We Offer</h3>
        <!--card group-->
        <div class="row g-4 row-cols-3" style="padding-top: 30px">
            <!--first card start-->
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-cesar-galeao-3289711.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Body Building</h5>
                        <p class="card-text" style="display: contents">
                            Body Building with professional coaches
                        </p>
                    </div>
                </div>
            </div>
            <!--first card end-->
            <!--second card start-->
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-ketut-subiyanto-4473622.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Dietary and Supplements</h5>
                        <p class="card-text">Fix your diet with the help of coaches</p>
                    </div>
                </div>
            </div>
            <!--first card end-->
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-leon-ardho-1552242.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Virtual Coaching</h5>
                        <p class="card-text">Get a free trial to experience our virtual coaching system</p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-li-sun-2294363.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Community</h5>
                        <p class="card-text">Dive in the community of healthy people with rich mindset</p>
                    </div>
                </div>
            </div>
        </div>
       

        <!--featured blogs start-->
        <h3 class="text-center" style="padding-top: 30px">Profile Management</h3>
        <!--group-->
        <div class="row g-4 row-cols-3" style="padding-top: 30px">
            <!--first card start-->
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-li-sun-2294403.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Workout Plans</h5>
                        <p class="card-text">Create custom workout plans with our smart routine system</p>
                    </div>
                </div>
            </div>
            <!--first card end-->
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-pixabay-221210.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Manage Profiles</h5>
                        <p class="card-text">Update your profile and make friends in the community</p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="C:\xampp\htdocs\FitnessTracker\app\views\assets\index_img\pexels-pixabay-39308.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">Find related blogs here.</p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card" style="width: auto; height: auto">
                    <img
                        src="app/views/assets/index_img/pexels-pixabay-416717.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 250px; width: 100%"
                    />
                    <div class="card-body">
                        <h5 class="card-title">User Dashboard</h5>
                        <p class="card-text">Use your personal tracker to keep track of yuor health</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <!-- <div w3-include-html="components/footer.html"></div> -->
</footer>

<script>
    includeHTML();
</script>

</html>
