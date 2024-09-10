F<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".slider").bxSlider();
        });
    </script>
    <title>BUZAĞI TARTIM SİSTEMİ</title>
    <style>
        #slider {
            width: 700px;
            height: 306px;
            margin: 0 auto;
        }

        .slider img {
            display: block;
            margin: 0 auto;
            width: 700px;
            height: 306px;
        }



        p {
            color: darkblue;
            font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif";
            font-size: 75%;
            text-align: center;
        }


        .about {
            margin-top: 50px;
        }

        #başlıklar {
            text-align: right;
            height: 0px;
        }

        #orta {
            height: 700px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div style=" color: white; padding: 20px;">
        <?php require_once "sidebar.php"; ?>
    </div>
    <div class="container">
        <div id="orta" style=" color:white; ">
            <div class="slider" id="slider">
                <div><img src="assets/img/1.jpg" /></div>
                <div><img src="assets/img/2.jpg" /></div>
                <div><img src="assets/img/3.jpg" /></div>
                <!-- <div><img src="assets/img/4.jpg" /></div> -->
                <div><img src="assets/img/5.jpg" /></div>
                <div><img src="assets/img/6.jpg" /></div>
                <div><img src="assets/img/8.jpg" /></div>
                <div><img src="assets/img/7.jpg" /></div>

           
            </div>
            <div class="about">
                <p>
                Bu projede, hayvan kimlik tespiti için RFID tabanlı
kulak küpeleri kullanılacak ve hayvanların kilolarının otomatik olarak düzenli bir şekilde ölçülüp veri tabanına
aktarılması sağlanacaktır. Projede Burdur Mehmet Akif Ersoy Üniversitesi Tarım, Hayvancılık ve Gıda
Araştırmaları Uygulama ve Araştırma Merkezi bünyesinde bulunan çiftlikteki buzağılar kullanılacaktır. Çiftlikte
bulunan tartım platformu buzağının ağırlığını destekleyecek şekilde tasarlanmış ve buzağının ağırlığını ölçen
yük hücreleri ile donatılmıştır. Tartım platformu ile buzağıların kilo ölçümü yapılarak, kimliklendirme ve kilo
verileri birleştirilip veri tabanına işlenecektir. Her buzağı için yapılan bu işlemler, telefon ya da bilgisayardan,
buzağının belirli aralıklarla gelişiminin takip edilmesini sağlayacaktır. RFID kimliklendirme ile otomatik tartım ve
ağırlık kayıt sistemi, hayvancılık işletmelerinde verimliliği artırırken aynı zamanda çalışma sürelerini
azaltacaktır. Bu sayede, işletmeler buzağılarını daha etkin bir şekilde takip edebilecek, sağlık sorunlarını erken
teşhis edebilecek ve verimli bir büyüme sağlayarak karlılıklarını artırabilecektir.
                </p>
            </div>

        </div>
        <div style="background-color: whitesmoke; color: white; padding: 20px;">
            <p>Burdur Mehmet Akif Ersoy Üniversitesi<br>
                Elektrik Elektronik Mühendisliği Bölümü</p>
        </div>
    </div>
</body>

</html>