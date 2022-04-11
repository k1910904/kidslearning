<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- X-UA-Compatible meta tag, to render web pages in older versions of Internet Explorer-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Balloon Pop Maths - a fun, interactive maths game.">
    <meta name="keywords" content="Maths, Game, Interactive">
    <meta name="author" content="Richard Ash">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link to Balloon Favicon -->
    <link rel="shortcut icon" href="assets/images/balloon-favicon.ico" type="image/x-icon">
    <!-- Link to Bootstrap 4.4.1 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link to Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Link to Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Link to Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/7863bec69d.js" crossorigin="anonymous"></script>
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Link to Email JS -->
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
    <title>Balloon Pop Maths</title>
</head>
<body>
   
    <?php
    
    include "nav.php";
    $strconn=mysqli_connect("localhost","root","","project");
    if(!$strconn)
        echo "Connection failed".mysqli_connect_error();
    else{}
    session_start();
    if(isset($_SESSION["username"]))
    {
        $username=$_SESSION["username"];
    }
    else{ echo "<div class='alert alert-danger' role='alert'>Something went wrong try login again.</div>";

    }
?>





    <!-- Balloon Pop Maths Home Page, Menu -->
    <section id="heading-section" class="container-sm" background-color = "white">
        <!-- Balloon Pop Maths Heading -->
        <div class="row">
            <!-- Screens smaller than md -->
            <div class="col-12 d-md-none container-heading-main text-center">
                <a href="index.php">
                    <h1 class="heading-main">Balloon</h1>
                    <h1 class="heading-main">Pop
                        <img src="assets/images/balloon-purple-cropped.png" alt="Purple balloon popping"/>
                    </h1>
                    <h1 class="heading-main">Maths</h1>
                </a>
            </div>
            <!-- Screens larger than md -->
            <div class="col-12 d-none d-md-block container-heading-main-large text-center">
                <a href="index.html">
                    <h1 class="heading-main"> Activity # one</h1>
                </a>
            </div>
        </div>
    </section>
    <!-- Options -->
    <section id="options-section" class="container-sm" aria-label="Options Section">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- Game Mode Options -->
                <div class="btn-group btn-group-toggle d-flex w-100 container-button-group" data-toggle="buttons">
                    <label id="multiply" class="btn btn-xl w-100 btn-info btn-text active">
                        <input type="radio" aria-label="Multiplication" name="game-mode" checked> x
                    </label>
                   
                </div>
                <!-- High Score -->
                <div hidden class="container-button-group">
                    <span id="highscore" class="btn-xl-nofill w-100 btn-text-score">High Score: 0 / 10</span> 
                </div>
                 <!-- Play Button, hidden until window has finished loading -->
                <div class="container-button-group d-flex w-100">
                    <button id="play" type="button" class="btn btn-xxl w-100 btn-info btn-text">START ACTIVITY</button>
                </div>
                <!-- Audio Controls -->
                
                <!-- Options Button -->
                <div hidden class="container-button-group" >
                    <button type="button" data-toggle="collapse" data-target="#options" aria-expanded="false" aria-controls="options" class="btn btn-xl w-100 btn-info btn-text">Options</button>
                </div>
            </div>
        </div>
        <!-- Collapsing Options -->
        <div hidden class="row collapse" id="options">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- Options applicable to all games -->
                <div class="btn-group btn-group-toggle d-flex w-100 container-button-group" data-toggle="buttons">
                    <label id="10q" class="btn btn-xl w-100 btn-info btn-text active">
                        <input type="radio" name="questions" checked> 10 Questions
                    </label>
                    <label id="20q" class="btn btn-xl w-100 btn-info btn-text">
                        <input type="radio" name="questions"> 20 Questions
                    </label>
                </div>
                <div class="btn-group btn-group-toggle d-flex w-100 container-button-group" data-toggle="buttons">
                    <label id="easy" class="btn btn-xl w-100 btn-info btn-text active">
                        <input type="radio" name="difficulty" checked> Easy
                    </label>
                    <label id="medium" class="btn btn-xl w-100 btn-info btn-text">
                        <input type="radio" name="difficulty"> Medium
                    </label>
                    <label id="hard" class="btn btn-xl w-100 btn-info btn-text">
                        <input type="radio" name="difficulty"> Hard
                    </label>
                </div>
                <!-- Multiplication and Division game options -->
                <div id="options-multiply-divide">
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-1" type="button" data-toggle="button" aria-pressed="true"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-toggle active">2x, 5x, 10x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-2" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-toggle">Mixed 1 to 12</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-3" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">1x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-4" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">7x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-5" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">2x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-6" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">8x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-7" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">3x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-8" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">9x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-9" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">4x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-10" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">10x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-11" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">5x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-12" type="button" data-toggle="button"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">11x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-mul-div-13" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">6x</button>
                            <span class="container-button"></span>
                            <button id="btn-mul-div-14" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-mul-div-sticky">12x</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                </div>
                <div id="options-add-subtract">
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-add-sub-1" type="button" data-toggle="button" aria-pressed="true"
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-add-sub-toggle active">Mixed to 10</button>
                            <span class="container-button"></span>
                            <button id="btn-add-sub-2" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-add-sub-toggle">Mixed to 20</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex w-100 container-button">
                            <span class="container-button"></span>
                            <button id="btn-add-sub-3" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-add-sub-toggle">Mixed to 50</button>
                            <span class="container-button"></span>
                            <button id="btn-add-sub-4" type="button" data-toggle="button" 
                                class="btn btn-xl w-100 btn-info btn-text btn-xl-focus-none btn-add-sub-toggle">Mixed to 100</button>
                            <span class="container-button"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
    
    
    <!-- Game Section -->
    <section id="game-section" class="container-xl d-none" aria-label="Game Section">
        <!-- Home Button -->
        <div id="game-section-home" class="row container-button-game">
            <div class="col text-left pr-0">
                <button id="btn-game-section-home" type="button" data-toggle="button" 
                    class="btn btn-xl btn-info btn-text btn-xl-focus-none">Exit Activity
                </button>
            </div>
            <div class="col text-right pl-0">            
                <div id="score" class="btn btn-xl-nofill btn-text-score d-none">Score: 0 / 20</div>
            </div>
        </div>
        <!-- Game Loader, shown until window has completed loading -->
        <div id="game-loader" class="container-xl text-center">
            <div class="container-loader"></div>
            <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            <div class="container-loader"></div>
        </div>
        <!-- Game Div, hidden until window has completed loading -->
        <div id="game-canvas-controls" class="d-none">
            <!-- Game Canvas, 2 panels - stacked on medium and small devices -->
            <div class="row game-section-balloons p-0 m-0">
                <div class="col-lg-6 p-0 m-0">
                    <div class="row canvas-balloon p-0 m-0">
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-left-1"></canvas>
                            <div id="balloon-answer-text-left-1" class="balloon-answer-text balloon-answer-text-top">8</div>
                        </div>
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-left-2"></canvas>
                            <div id="balloon-answer-text-left-2" class="balloon-answer-text balloon-answer-text-bottom">10</div>
                        </div>
                    </div>
                    <div class="row canvas-balloon p-0 m-0">
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-left-3"></canvas>
                            <div id="balloon-answer-text-left-3" class="balloon-answer-text balloon-answer-text-top">12</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0 m-0">
                    <div class="row canvas-balloon p-0 m-0">
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-right-1"></canvas>
                            <div id="balloon-answer-text-right-1" class="balloon-answer-text balloon-answer-text-top">18</div>
                        </div>
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-right-2"></canvas>
                            <div id="balloon-answer-text-right-2" class="balloon-answer-text balloon-answer-text-bottom">18</div>
                        </div>
                    </div>
                    <div class="row canvas-balloon p-0 m-0">
                        <div class="col d-flex justify-content-center p-0 m-0">
                            <canvas id="canvas-balloon-right-3"></canvas>
                            <div id="balloon-answer-text-right-3" class="balloon-answer-text balloon-answer-text-top">18</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Game Controls - 3 columns, stacked on small and medium devices -->
            <div class="row game-section-controls p-0 m-0">
                <div class="col-lg-4">
                    <div class="row">
                       
                        <div id="health" class="col-8">
                            <i id="heart1" class="fas fa-heart"></i>
                            <i id="heart2" class="fas fa-heart"></i>
                            <i id="heart3" class="fas fa-heart"></i>
                            <i id="heart4" class="fas fa-heart"></i>
                            <i id="heart5" class="fas fa-heart"></i>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div id="question">10 x 10</div>                
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="container-sm">
      
    </footer>
    <!-- JavaScript links -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/initialisation.js"></script>
    <script src="assets/js/audio.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/display.js"></script>
    <script src="assets/js/game-logic.js"></script>
    <script src="assets/js/mail.js"></script>
    <script src="assets/js/maths.js"></script>
    <script src="assets/js/events.js"></script>
</body>
</html>