<!doctype html>
<html lang="en">

<head>
  <title>Sreemongol</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- fontawsome 4  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- custom css  -->
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <!-- heading section  -->
  <?php include "./component/navbar.php" ?>


  
  <!-- carousel section  -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <div class="carousel-caption d-none d-md-block">
          <h2>Jaflong</h2>
          <p>Journeys, explorations, and adventures</p>
        </div>
        <img class="d-block w-100" src="images/sylhet (1).jpg" alt="Jaflong" style="height: 600px; object-fit:cover;" alt="First slide">
      </div>
      <div class="carousel-item">
        <div class="carousel-caption d-none d-md-block">
          <h2>Sreemongol</h2>
          <p>Journeys, explorations, and adventures</p>
        </div>
        <img class="d-block w-100" src="images/sylhet (2).jpg" alt="Sreemongol" style="height: 600px; object-fit:cover;" alt="Second slide">
      </div>
      <div class="carousel-item">
        <div class="carousel-caption d-none d-md-block">
          <h2>Bichanakandi</h2>
          <p>Journeys, explorations, and adventures</p>
        </div>
        <img class="d-block w-100" src="images/sylhet (3).jpg" style="height: 600px; object-fit:cover;" alt="Third slide">
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <!-- content section  -->
  <div class="container-fluid">
    <div class="row ">
      <div class="col-2 p-0">
        <nav class="nav flex-column bg-dark  text-white box h-100">
          <div class="d-block h4" style="background:rgba(14, 13, 13, 0.868) !important">
            <h3 class="p-2">Tour Spot</h3>
          </div>
          <ul class="list-unstyled text-white box h5">
            <p class="pb-2 pl-2 text-uppercase">Sreemongol</p>
            <li class="pb-3"><a href="./tour_subx1c.php" class="p-2">Connectivity</a></li>
            <li class="pb-3"><a href="./tour_subx1_acc.php" class="p-2">Accommodation</a></li>
            <li class="pb-3"><a href="./tour_subx1_restaurent.php" class="p-2">Restaurent</a></li>
            <li class="pb-3"><a href="./tour_subx1_food.php" class="p-2">Food</a></li>
            <li class="pb-3"><a href="#" class="p-2">Others</a></li>
          </ul>
        </nav>

      </div>
      <div class="col-10 ">
        <div class="content">
          <div class="text-right p-2"><?php include "./component/backButton.php" ?></div>
          <header class="row p-4">
            <h2 class="col-12 text-center ">Welcome to Sreemongol</h2>
            <p class="col-12 text-center font-weight-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci numquam facere ullam dolorum aliquam, impedit vitae suscipit quo labore similique ab, laboriosam nobis quos voluptatem maiores esse reiciendis fugit deserunt.</p>
          </header>
          <hr />
          <hr class="w-75 pb-2">
          <div class="about">
            <p class="h5 text-justify">
              <span class="fs-1 ">Sreemongol</span> is a metropolitan
              city in northeastern Bangladesh. It is the administrative seat of the
              Sylhet Division. Located on the north bank of the Surma River at the
              eastern tip of Bengal, Sylhet has a subtropical climate and lush
              highland terrain. The city has a population of more than half a
              million and is one of the largest cities in Bangladesh after Dhaka,
              Chittagong and Khulna. Sylhet is one of Bangladesh's most important
              spiritual and cultural centres. Furthermore, it is one of the most
              economically important cities after Dhaka and Chittagong. The city
              produces the highest amount of tea and natural gas. The hinterland of
              the Sylhet valley is the largest oil and gas-producing region in
              Bangladesh. It is also the largest hub of tea production in
              Bangladesh. It is notable for its high-quality cane and agarwood.The
              city is served by the Osmani International Airport, named after
              General Bangabir M A G Osmani, the Commander-in-Chief of the Mukti
              Bahini during the Bangladesh Liberation War. People from Sylhet form a
              significant portion of the Bangladeshi diaspora, particularly in the
              United Kingdom and the United States and other countries in the Middle
              East.
            </p>
          </div>
          <div class="container weather">
            <div class="row my-4 ">

              <div class=" col-6 t1 text-center p-3 mb-2 bg-warning text-dark text-bold border border-white h4"><span>Location on Map</span></div>
              <div class=" col-6 t2 text-center p-3 mb-2 bg-warning text-dark text-bold border border-white h4"><span>Weather Forecast Today</span></div>
              <div class="col-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57903.16412848584!2d91.8609819!3d24.89976355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1661099530610!5m2!1sen!2sbd" class="w-100 border border-0" height="400" allowfullscreen="" loading="lazy"></iframe>
              </div>

              <div class="col-6 ">
                <div class=" d-flex justify-content-center mt-5"><!-- weather widget start --><a target="_blank" href="https://www.booked.net/weather/sreemangal-283834"><img src="https://w.bookcdn.com/weather/picture/4_283834_1_1_137AE9_350_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=w209&anc_id=15116"  alt="booked.net"/></a><!-- weather widget end --></div>
              </div>
            </div>
          </div>

          <div class="caution container mt-4">
            <div>
              <p class="bg-warning text-dark p-2 h4">Important information</p>
            </div>

            <div id="accordianId" role="tablist" aria-multiselectable="true">
              <div class="card">
                <div class="card-header btn-outline-primary" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId1">
                      Inclusions
                    </a>
                  </h5>
                </div>
                <div id="section1ContentId1" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                  <div class="card-body">
                    <ul>
                      <li>Hotel pick up and drop off</li>
                      <li>Driver</li>
                      <li>Lunch</li>
                      <li>Entrance Fees</li>
                      <li>Bottled Water</li>
                      <li>Coffee/Tea/Soft Drink</li>
                      <li>Private transportation</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div id="accordianId " role="tablist" aria-multiselectable="true">
              <div class="card">
                <div class="card-header btn-outline-primary" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId2">
                      Exclusions
                    </a>
                  </h5>
                </div>
                <div id="section1ContentId2" class="collapse in" role="tabpanel" aria-labelledby="sectionHeaderId">
                  <div class="card-body">
                    <ul>
                      <li>Personal Expenses </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div id="accordianId" role="tablist" aria-multiselectable="true">
              <div class="card">
                <div class="card-header btn-outline-primary" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId3">
                      Additional information
                    </a>
                  </h5>
                </div>
                <div id="section1ContentId3" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                  <div class="card-body">
                    <ul>
                      <li>Confirmation will be received at time of booking</li>
                      <li>Children must be accompanied by an adult</li>
                      <li>Tour sights, food, and itinerary are subject to change.</li>
                      <li>Tour is customizable, so please advise of any specific attractions you would like to prioritize or see first</li>
                      <li> Not wheelchair accessible</li>
                      <li>Travelers should have a moderate physical fitness level</li>
                      <li> This is a private tour/activity. Only your group will participate</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container border border-warning pt-2 mb-4 mt-5 w-60 comment">
            <form action="#" method="post">
              <fieldset>
                <legend>Leave a comment</legend>
                <div class="form-group required">
                  <label for="mail">Email</label>
                  <input type="email" class="form-control" name="mail" id="mail" placeholder="Your Email">
                </div>

                <div class="form-group">
                  <label for="comment">Comment</label>
                  <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Your Comment"></textarea>
                </div>
                <div class="p-2 text-center "><a href="#" class="btn btn-primary btn-sm">submit</a></div>
              </fieldset>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- footer section  -->
  <?php include "./component/footerf.php" ?>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>