<?php
function pdo_connect_mysql(){
    $DATABASE_HOST="localhost";
    $DATABASE_USER="root";
    $DATABASE_PASS="";
    $DATABASE_NAME="employee";
    try
    {
        return $db = new PDO("mysql:host=". $DATABASE_HOST . "; dbname=". $DATABASE_NAME .";charset=utf8",$DATABASE_USER,$DATABASE_PASS);
    }
    catch(PDOException $exception)
    {
            exit("Bağlantı hatası oluştu");
    }
}

function template_header($title){
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Playball&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Limelight&family=Playball&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Kaushan+Script&family=Limelight&family=Playball&display=swap" rel="stylesheet"> 
        <link rel="stylesheet"  href="responsivetable.css" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script> 


        <style>
          .mb-5{
              margin-top: 20px;
          }
          .smaller{
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-family: 'Anton', sans-serif;
            font-family: 'Playball', cursive;
          }
          .collapse a{
            font-family: 'Limelight', cursive;
    
          }
          .col-sm-12 img{
            border-radius: 150px;
            width: 100%;
            height: 100%;
    
          }
          .carousel-item h1{
            opacity: 0;
            animation: moveBanner 1s 0.9s forwards;
          }
          .carousel-item p{
            opacity: 0;
            animation: moveBanner 1s 0.5s forwards;
          }
          .carousel-item a{
            opacity: 0;
            animation: moveBanner 1s 0.1s forwards;
          }
          @keyframes moveBanner{
        0%{
            transform: translateX(-40rem);
        }
        100%{
            transform: translateX(0);
            opacity: 1;
        }
    }
    .mb-5 h2{
      font-family: 'Kaushan Script', cursive;
    
    }
    .text-center > i{
      color: black;
      font-size: 20px;
    }
    
    
    
    
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info text-center px-4">
            <div class="container-fluid">
              <a class="smaller" href="#">ŞEKERCILER HOLDING PERSONEL BILGILERI</a>
              <button class="navbar-toggler bg-transparent  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i>ANASAYFA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="read.php"><i class="fas fa-id-card"></i>İLETİŞİM</a>
                  </li>
    
    
                
                </ul>
              </div>
            </div>
          </nav>


    EOT;
}
function template_title($text)
{
    echo <<<EOT
    <div class="text-center mb-5">
        <i class="fas fa-home"></i>
         <h2>$text</h2>
         <hr class="w-25 m-auto">
    </div>
    EOT;
}
function template_title1($text)
{
    echo <<<EOT
    <div class="text-center mb-5">
        <i class="far fa-address-card"></i>
         <h2>$text</h2>
         <hr class="w-25 m-auto">
    </div>
    EOT;
}
function template_title2($text)
{
    echo <<<EOT
    <div class="text-center mb-5">
        <i class="fas fa-user-plus"></i>
         <h2>$text</h2>
         <hr class="w-25 m-auto">
    </div>
    EOT;
}
function template_title3($text)
{
    echo <<<EOT
    <div class="text-center mb-5">
      <i class="fas fa-user-edit"></i>
         <h2>$text</h2>
         <hr class="w-25 m-auto">
    </div>
    EOT;
}

function template_content()
{
    echo <<<EOT
    <div class="container">
        <div class="row px-2">
            <div class="col-sm-12 col-md-6 col-lg-6 col-12 pt-5">

                <div id="carouselExampleControls" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h1 class=""> GÜÇLÜ KADROMUZLA HER ZAMAN YANINIZDAYIZ</h1>
                            <p>
                            Şirketimiz insan odaklı yönetim anlayışı içerisinde, çalışanlarımıza verdiğimiz eğitimle birlikte, zihinsel yetenekleri, kişilik özellikleri, kendilerini geliştirme düzeyleri, işlerinde ilerleme 
                            ve üst düzeylere gelme istekleri dikkate alınarak kariyer planlarına yön vermektedir. Bununla  çalışanlarımızın iş doyumunu, şirkete bağlılığını ve şirket içi hareketliliğini sağlamaktayız.
                            </p>
                            <a class="btn btn-primary" href="create.php" role="button"><i class="fas fa-user-plus"></i>  PERSONEL EKLE</a>
                            <a class="btn btn-primary" href="read.php" role="button"><i class="far fa-address-card"></i>  PERSONEL LİSTELE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                <img src="img/personel.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    EOT;
}
function template_services(){
    echo <<<EOT
    <section id="services" class="p-4 my-5">
        <div class="text-center mb-5">
          <i class="fas fa-building"></i>
          <h2>Neler yapıyoruz?</h2>
          <hr class="w-25 m-auto">
        </div>
        <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-4 col-12">
            <div class="card my-2">
              <div class="card-body">
                <i class="fas fa-bolt"style="font-size: 50px; margin-left: 42.3%;"></i>
                <h5 class="card-title">Elektrik Üretimi</h5>
                <p class="card-text">Tüm enerji yatırımlarımızı tek çatı altında toplamak üzere 2000 yılında kurulan Doğan Enerji, yenilenebilir kaynaklardan sürdürülebilir temiz enerji sağlama vizyonuyla hidroelektrik yatırımlarının yanı sıra, portföyüne rüzgar ve güneş enerjisini ekleyerek sektörde sağlam bir yer edindi.</p>

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4 col-12">
            <div class="card bg-light my-2">
              <div class="card-body">
                <i class="fas fa-gas-pump" style="font-size: 50px; margin-left: 42.3%;"></i>
                <h5 class="card-title">Akaryakıt Perakendesi</h5>
                <p class="card-text">1963 yılında akaryakıt sektöründe hizmet vermeye başlayan Aytemiz Akaryakıt A.Ş., 2010 yılından beri bugün bildiğimiz Aytemiz markası ile çalışmalarına devam ediyor. İsmail Aytemiz’in 55 yıllık sektör tecrübesi ve alanında uzman bir kadroyla kısa sürede sektörde tanınan bir marka haline gelen Aytemiz, genç ve dinamik bir şirket. </p>

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4 col-12">
            <div class="card my-2">
              <div class="card-body">
                <i class="fas fa-car" style="font-size: 50px; margin-left: 42.3%;"></i>
                <h5 class="card-title">Otomotiv Ticareti & Pazarlama</h5>
                <p class="card-text">Doğan Trend Otomotiv, 2020 yılında Doğan Grubu’nun otomotiv ve mobilite alanındaki şirket ve markalarını tek çatı altında toplamak üzere kuruldu. Bünyesinde distribütörlüklerle birlikte perakende, kiralama ve mobilite markalarını pazarladığı e-ticaret platformları bulunuyor.</p>

              </div>
            </div>
          </div>
        </div>


        </div>
      </div>
      </section>


    EOT;
}
function template_footer(){
    echo <<<EOT
            <div class="container-fluid bg-dark text-white mt-2" >
          
            <div class="row p-5" style="padding-bottom: 10px !important;">
              <div class="col-md-4">
                <h3>Merkez Ofis</h3>
                Ataşehir / istanbul <br>
                iletisim@sekercilerholding.com
                <br>
                +90 5XX XXX XX XX
              </div>
              <div class="col-md-4">
                <iframe width="100%" height="200" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8063.344166213807!2d29.121394844291828!3d40.984068014808535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2str!4v1623332235289!5m2!1sen!2str"></iframe>    </div>
              <div class="col-md-4">
                <h3>Bize Katıl...</h3>
                
                  <i class="fab fa-facebook-square fa-3x p-1"><a href="#"></a></i>        
                
                
                  <i class="fab fa-twitter-square fa-3x p-1"><a></a></i>
                
                
                  <i class="fab fa-youtube fa-3x p-1"><a></a></i>
                
              </div>
            </div>

          </div>
    </body>
    </html>
    EOT;
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
 <?php
 
 


 ?>

 
</body>
</html>