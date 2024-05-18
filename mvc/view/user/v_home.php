<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <script src="/web2/public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Watch Store</title>
</head>

<body>

    <?php require "mvc/view/absolutePart/header.php"; ?>

    <section style="height: 100vh;">
        <div class="banner">
            <div class="slide">
                <div class="slide-item active">
                    <img loading="lazy" src="/web2/public/data/banner1.jpg" alt=".">
                    <div class="bannerContent">

                    </div>
                </div>
                <div class="slide-item next">
                    <img loading="lazy" src="/web2/public/data/banner2.jpg" alt=".">
                </div>
                <div class="slide-item prev">
                    <img loading="lazy" src="/web2/public/data/banner3.jpg" alt=".">
                </div>
            </div>
        </div>
        <!-- <div class="prevItem">
        <div style="font-weight: bold; font-size: large; color: gray">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
        </div>
    </div>
    <div class="nextItem">
        <div style="font-weight: bold; font-size: large; color: gray">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </div>
    </div> -->
    </section>

    <section class="about container" id="about">
        <div class="about-img">
            <img src="/web2/public/data/img (6).jpg" alt="" style="max-width : 70%;">
        </div>
        <div class="about-text">
            <span>About us</span>
            <h2>Cheap Prices With <br>Quality Watchs</h2>
            <p>WatchPoint is specialized in the trade of vintage luxury watches with recognized experience in the
                international market of collectible watches. With boutiques in Monaco, Paris, Geneva, Saint-Tropez and
                Courchevel, The Watch Point curates a distinctive selection of appealing rare and vintage watches that
                can be found on the watch secondary market.</p>
            <!-- About button -->
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>

    <section class="bg-dark">
        <div class="products container">
            <div class="productItemCard rounded">
                <div class="imgFlu cardImg">
                    <img loading="lazy" src="/web2/public/data/img (7).jpg" alt=".">
                </div>
                <div class="cardInfor">
                    <div class="colorEffect">
                        <br>
                    </div>
                    <div>
                        <h3 class="itemName">Rolex Pro</h3>
                        <h4 class="itemPrize">$1000<span class="oldPrize"></span></h4>
                    </div>
                </div>
            </div>

            <div class="productItemCard rounded">
                <div class="imgFlu cardImg">
                    <img loading="lazy" src="/web2/public/data/img (8).jpg" alt=".">
                </div>
                <div class="cardInfor">
                    <div class="colorEffect">
                        <br>
                    </div>
                    <div>

                        <h3 class="itemName">Rolex Pro</h3>
                        <h4 class="itemPrize">$1000<span class="oldPrize"></span></h4>
                    </div>
                </div>
            </div>

            <div class="productItemCard rounded">
                <div class="imgFlu cardImg">
                    <img loading="lazy" src="/web2/public/data/img (9).jpg" alt=".">
                </div>
                <div class="cardInfor">
                    <div class="colorEffect">
                        <br>
                    </div>
                    <div>

                        <h3 class="itemName">Rolex Pro</h3>
                        <h4 class="itemPrize">$1000<span class="oldPrize"></span></h4>
                    </div>
                </div>
            </div>

            <div class="productItemCard rounded">
                <div class="imgFlu cardImg">
                    <img loading="lazy" src="/web2/public/data/img (10).jpg" alt=".">
                </div>
                <div class="cardInfor">
                    <div class="colorEffect">
                        <br>
                    </div>
                    <div>

                        <h3 class="itemName">Rolex Pro</h3>
                        <h4 class="itemPrize">$1000<span class="oldPrize"></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="contact container">
            <div class="bg-dark d-flex rounded">
                <div class="rounded-right d-flex formContentContainer">
                    <div class="imgFlu rounded-right d-flex">
                        <img src="/web2/public/data/img (11).jpg" alt=".">
                    </div>

                    <div class="formContent">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores iste animi eius at doloribus
                        delectus odit. Quam et architecto facilis, aspernatur molestias iste magni earum? Adipisci
                        laborum
                        nisi ullam quia.
                    </div>
                </div>

                <div class="form">
                    <div><b>Full name: </b> <input class="formInp" type="text" required="required" id="fullname"
                            placeholder="enter your full name"></div>
                    <div><b>Phone number: </b> <input class="formInp" type="text" required="required" id="phone"
                            placeholder="enter your phone number"></div>
                    <div><b>Email: </b> <input class="formInp" type="text" id="email" required="required"
                            pattern="[a-zA-Z0-9]@[a-zA-Z]{0,6}\.[a-zA-Z]{2,4}" placeholder="enter your email"></div>
                    <a href="" class="btn">Send</a>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-dark">
        <div class="container image">
            <div class="d-flex">
                <div class="imgFlu rounded"><img loading="lazy" src="/web2/public/data/img (4).jpg" alt=""></div>

                <div>
                    <div class="d-flex topImgContainer ">
                        <div class="imgFlu rounded" style="margin-left: 0;"><img loading="lazy"
                                src="/web2/public/data/img (1).jpg" alt="."></div>

                        <div class="imgFlu rounded" style="margin-right: 0;"><img loading="lazy"
                                src="/web2/public/data/img (2).jpg" alt="."></div>
                    </div>

                    <div class="imgFlu rounded bottomImgContainer">
                        <img loading="lazy" src="/web2/public/data/img (3).jpg" alt=".">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="rate">
            <div class="slide">

                <div class="slide-item prev">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="." alt="."></div>
                        <div class="customerName">
                            <h3>jett</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">wash dish</div>
                    </div>
                </div>

                <div class="slide-item active">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="." alt="."></div>
                        <div class="customerName">
                            <h3>Gordon Ramsey</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">As high quality as my dishes, will be back</div>
                    </div>
                </div>

                <div class="slide-item next">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="" alt=""></div>
                        <div class="customerName">
                            <h3>Ramus</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">OK</div>
                    </div>
                </div>

                <div class="slide-item">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="" alt=""></div>
                        <div class="customerName">
                            <h3>Anthony</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">Đẹp hơn mấy thằng sài áp bồ wéch</div>
                    </div>
                </div>

                <div class="slide-item">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="." alt="."></div>
                        <div class="customerName">
                            <h3>Ronando</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">SHUUUUUUUUUUUUUUUUUUUUUUU!</div>
                    </div>
                </div>

                <div class="slide-item">
                    <div class="d-flex">
                        <div class="imgFlu rounded"><img src="." alt="."></div>
                        <div class="customerName">
                            <h3>loli</h3>
                        </div>
                        <div class="rating"></div>
                        <div class="comment">onii...chan!</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>

</html>