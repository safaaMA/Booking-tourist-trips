<?php
   include "Database.php"; 
   global $connect; 
   mysqli_set_charset($connect, 'utf8');

   $TopCopm = "SELECT * FROM company WHERE top = '1' ";
   $startTopCopm = mysqli_query($connect, $TopCopm);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" <link
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
    <title>Tourist Reservation</title>
</head>

<body>
    <div class="booking"><a href="https://wsend.co/9647722470444">احجز الان <i class="fa-brands fa-whatsapp"></i></a></div>
    <div class="Container">
        <nav class="Navbar">
            <div class="Moode">
                <i class="fa-solid fa-moon"></i>
            </div>
            <div class="list">
                <ul>
                    <li><a href="./index.php">الصفحة الرئيسيه</a></li>
                    <li><a href="./All-Comp.php">شركات سياحية</a></li>
                    <li><a href="./index.php">رحلات خاصه</a></li>
                </ul>
            </div>
            <div class="logdiv">
            <?php
                                include "Database.php"; 
                                global $connect; 
                                mysqli_set_charset($connect, 'utf8');
                                $CookiesUser = @$_COOKIE["userToken"];
                                $GetUserInfo = "SELECT * FROM users WHERE user_token='$CookiesUser'";
                                $RunUserInfo = mysqli_query($connect, $GetUserInfo);
                                $RowUserInfo = mysqli_fetch_array($RunUserInfo);
                                $UserType = @$RowUserInfo['user_admin'];
                                if($UserType == "admin"){
                                    echo'
                                    <div class="searsh">
                                    <a href="./Log/logout.php">تسجيل خروج</a>
                                    </div>
                                    ';
                                }else{
                                    echo'
                                    <div class="searsh">
                                    <a href="./serch/serch.php">ابحث</a>
                                    </div>
                                    ';
                                }
                            ?>         
            </div>
        </nav>
        <div class="InterFace">
            <div class="conentInter">
                <div class="MainTaxt">
                    <h1>منصة الإدارة السياحية المتقدمة</h1>
                    <p> هي نظام إداري مبتكر يهدف إلى تسهيل وتحسين تجربة إدارة وتنظيم الرحلات السياحية. تعتمد المنصة على
                        تكنولوجيا متقدمة لتوفير حلول فعّالة وذكية لتخطيط وتنسيق كافة جوانب الرحلات، بما في ذلك الحجوزات،
                        والنقل، والإقامة، والفعاليات السياحية. يتيح هذا النظام للمستخدمين إدارة العمليات بكفاءة، وزيادة
                        الفاعلية، وتحسين جودة الخدمة المقدمة للمسافرين، مما يسهم في تعزيز تجربة السفر </p>
                    <div class="a-Go">
                        <a href="#Comp">انطلق</a>
                    </div>
                </div>
                <div class="MainImage">
                    <img src="1.png" alt="">
                </div>
            </div>
            <div class="cart-det">
                <div class="oneCart">
                    <div class="img-cart"><img src="business-idea.png" alt=""></div>
                    <div class="title-cart">
                        <h4>حلاً شاملاً لتحسين وتيسير عمليات تنظيم الرحلات السياحية</h4>
                    </div>
                </div>
                <div class="oneCart">
                    <div class="img-cart"><img src="travel.png" alt=""></div>
                    <div class="title-cart">
                        <h4>نجمع بين التكنلوجيا والسفر</h4>
                    </div>
                </div>
                <div class="oneCart">
                    <div class="img-cart"><img src="finger-control.png" alt=""></div>
                    <div class="title-cart">
                        <h4>نتميز بسهولة الاستخدام والتكامل الفعّال في تنظيم الرحلات السياحية</h4>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="titleComp">شركات مميزة <i class="fa-solid fa-star"></i></h1>
        <section class="container">
            <div class="card__container swiper">
                <div class="card__content">
                    <div class="swiper-wrapper">
                        <?php
                        while ($Data = mysqli_fetch_array($startTopCopm)) {
                            echo '
                            <article class="card__article swiper-slide">
                            <div class="card__image">
                            <img src="./AddComp/img/' . $Data["mainPhoto"] . '" class="card__img" alt=""> 
                                <div class="card__shadow"></div>
                            </div>

                            <div class="card__data">
                                <h3 class="card__name">' . $Data["name"] . '</h3>
                                <p class="card__description">
                                ' . $Data["location"] . '
                                </p>

                                <a href="./DetailsComp.php?D=D&T=' . $Data["token"] . '" class="card__button">زيارة</a>
                            </div>
                        </article>';
                    }               
                        ?>
 
                    </div>
                </div>

                <div class="swiper-button-next">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>

                <div class="swiper-button-prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </section>
        <h1 id="Comp" class="titleComp">الشركات السياحية  <i class="fa-brands fa-think-peaks"></i></i></h1>
        <div class="container-Locations">
            <img class="img-loc" src="./boxed.jpg" alt="">
            <div class="detel">
                <h3>رحلتك المثالية تبدأ هنا: اكتشف تجارب السفر مع أفضل شركات السياحة</h3>
                <p>

                    مرحبًا بك في قسم السفر والسياحة، حيث يتاح لك اكتشاف مجموعة مميزة من شركات السياحة الرائدة. هذا القسم
                    يضم باقة متنوعة من الشركات التي تقدم خدمات سفر ممتازة وتجارب سياحية لا تُنسى.
                    اختر من بين مجموعة متنوعة من شركات السفر المعتمدة، حيث تغطي وجهات مختلفة وتقدم تجارب متنوعة لتلبية
                    احتياجات السفر الخاصة بك.
                </p>
                    <a href="./All-Comp.PHP">اكتشف</a>
            </div>
        </div>
        <h1 class="titleComp"> مواقع اثرية مهمه <i class="fa-solid fa-map-location"></i></h1>
        <div class="container-Locations aa">
            <img class="img-loc" src="./tho.jpeg" alt="">
            <div class="detel">
                <h3>استكشاف التاريخ والجمال في كنوز الأماكن الأثرية</h3>
                <p>
                    مرحبًا بك في عالم من الإثارة والاستكشاف، حيث يندرج تاريخنا العريق وجمال آثارنا الثقافية. في هذا
                    القسم، نفتح لك بابًا إلى عوالم غنية بالتاريخ والفن، حيث يروي الحجر والمعمار قصة تاريخنا بأبهى صوره.

                    استمتع بجولة إلكترونية تأخذك إلى أماكن أثرية تشهد على حضارات قديمة وحقب تاريخية هامة. اكتشف آثار
                    المعابده الضخمة والمدن القديمة التي شكلت مصير البشرية.</p>
                <a href="./AllLocation.php">زيارة</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="conect">
            <h1>تواصل معنا</h1>
            <ul class="Ul-conect">
                <li><a style="color: black;" href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a style="color: black;" href=""><i class="fa-brands fa-instagram"></i></a></li>
                <li><a style="color: black;" href=""><i class="fa-brands fa-whatsapp"></i></a></li>
                <li><a style="color: black;" href=""><i class="fa-brands fa-x-twitter"></i></a></li>
            </ul>
        </div>
        <div class="footer-det">
            <div class="OneRow">
                <ul class="ulOne">
                    <li><a href="">من نحن </a></li>
                    <li><a href="">شركات مميزة</a></li>
                    <li><a href="">كل الشركات</a></li>
                    <li><a href="">مواقع سياحية</a></li>
                </ul>
            </div>
            <div class="TowRow">
                <ul class="ulTow">
                    <li><a href="">سيايسة الخصوصية</a></li>
                    <li><a href="">شروط الاستخدام</a></li>
                    <li><a href="">حقوق الشركات</a></li>
                    <li><a href="">ابرز الخدمات</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="p">
        <p>جميع الحقوق محفوظة @ لـ منصة الإدارة السياحية 
        </p>
    </div>
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>

</body>

</html>