<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />




    <title>Ghurte Jabo</title>


    <!-- icon link  -->
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- bootstrap 4 cdn  -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- bootstrap 5 cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="CSS/style-front-page.css">




</head>

<body>

    <!-- header section starts  -->


    <header>

        <div id="menu-bar" class="fas fa-bars"></div>


        <a href="index.php" class="logo"><span>G</span>hurte jabo</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#packages">Destination</a>
            <a href="./userActivity/tourPlan.php">Tour Plan</a>
            <a href="#gallery">Gallery</a>
            <a href="category.php">Package</a>
            <a href="contactus.php">Contact</a>
        </nav>


        <div class="icons">
            <i class="fas fa-search" id="search-btn" hidden></i>
            <i class="fas fa-search"></i>
            <a href="./Authentication/login.php" hidden><i class="fas fa-user" id="login-btn"></i></a>
            <a href="Entrypage.php"><i class="fas fa-user"></i></a>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>


    </header>

    <!-- header section ends  -->


    <!-- login form container  -->

    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">

            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form>

    </div>



    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>adventure is worthwhile</h3>
            <p>dicover new places with us, adventure awaits</p>
            <a href="#packages" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
            <span class="vid-btn" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-3.mp4"></span>
            <span class="vid-btn" data-src="images/vid-4.mp4"></span>
            <span class="vid-btn" data-src="images/vid-5.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
        </div>

    </section>


    <!-- packages section starts  -->

    <section class="packages" id="packages">

        <h1 class="heading">
            <span>D</span>
            <span>e</span>
            <span>s</span>
            <span>t</span>
            <span>i</span>
            <span>n</span>
            <span>a</span>
            <span>t</span>
            <span>i</span>
            <span>o</span>
            <span>n</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/sylhet (1).jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Sylhet</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="tour-main-site1.php" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <img src="images/coxsbazar.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> CoxsBazar </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <a href="#" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <img src="images/rangamati.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> rangamati </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <a href="#" class="btn">View</a>
                </div>
            </div>

            <div class="box">
                <img src="images/Sundarban-Khulna-Bangladesh.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Khulna </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <a href="#" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <img src="images/banderban.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Bandarban</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <a href="#" class="btn">View</a>
                </div>
            </div>

            <div class="box">
                <img src="images/barishal.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Barishal </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam! Lorem ipsum, dolor sit
                        amet consectetur adipisicing elit.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">view</a>
                </div>
            </div>

        </div>

    </section>

    <!-- packages section ends -->




    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/chittagong.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/coxsbazar.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/barishal.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/banderban.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/rajshahi.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sreemongol_1.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/rangamati.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/coxsbazar.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>


        </div>

    </section>

    <!-- gallery section ends -->



    <!-- footer section -->
    <?php include'./component/footerf.php'?>
    <!-- footer section end  -->



    <!-- bootstrap 4 js+popper cdn  -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- bs 5 - JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- custom JavaScript -->
    <script src="js/script.js"></script>


</body>

</html>