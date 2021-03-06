

<div class="container">
   
       
    
    <!-- Marketing Icons Section -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill"
                     style="background-image:url('https://scontent.ftpq1-1.fna.fbcdn.net/v/t1.0-9/16142280_1834230760148774_1762039721905079297_n.jpg?oh=dfd568124354fd39183015bbcc441be6&oe=5AD560AE');"></div>
                <div class="carousel-caption">
                    <h2><?php echo $greeting ?></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill"
                     style="background-image:url('https://scontent.ftpq1-1.fna.fbcdn.net/v/t1.0-9/10609604_1697472613824590_1400521813064864168_n.jpg?oh=12c7cde9ef9f6c76fff040deb7fc84de&oe=5A9BB35A');"></div>
                <div class="carousel-caption">
                         <h2><?php echo $greeting ?></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill"
                     style="background-image:url('https://scontent.ftpq1-1.fna.fbcdn.net/v/t31.0-8/11950157_1637255886512930_8385275946316650418_o.jpg?oh=081fa552c57613ea680cb5b37988f995&oe=5A50CFAE');"></div>
                <div class="carousel-caption">
                          <h2><?php echo $greeting ?></h2>
                </div>
            </div>

        </div>


        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>


    <div class="business">
        <div class="row">
            <h3><?php echo $sites ?></h3>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p><i class="fa fa-fw fa-university"></i>Instituto Tecnológico de Tepic</p>
                    </div>
                    <div class="panel-body">
                        <div align="center">
                            <a href="http://ittepic.edu.mx/">
                                <img src="http://www.ittepic.edu.mx/images/escudo_itt_200x200.png">
                            </a>

                        </div>



                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p><i class="fa fa-fw fa-university"></i>Tecnológico Nacional de México</p>
                    </div>
                    <div class="panel-body">
                        <div align="center">
                            <a href="http://www.tecnm.mx/">
                                <img src="https://i2.wp.com/itstacambaro.edu.mx/archivo/uploads/2017/05/tecn-nuevo-logo.png?resize=706%2C390" height="200" width="300">
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p><i class="fa fa-fw fa-compass"></i>Academia Journals</p>
                    </div>
                    <div class="panel-body">
                    <div align="center">
                    <a href="http://www.academiajournals.com/tepic">
                            <img src="http://static1.squarespace.com/static/55564587e4b0d1d3fb1eda6b/t/55c55db6e4b0760916a1277c/1501254981985/?format=1500w" height="200" width="300">
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>


    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

