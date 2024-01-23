<?php

session_start();
include("../functions/redirct.php");
?>

<html>

<head>
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Righteous&display=swap" rel="stylesheet">
</head>

<body>

    <div class="main">

        <!----- Start Header ------>
        <div class="header">

            <!-- <div class="header-left"><img src="" width="300" height="150" alt="Logo"></div> -->

            <div class="header-bottom">
                <div class="header-font">Ready to Grab</div>
                <div class="header-font">a Bite..</div>
            </div>

        </div>
        <!----- End Header ------>

        <!----- Start Content ------>


        <div class="content-part-1">
            <div class="content-part-1-left">
                <div class="content-part-1-left-h3">Cooking at it's Finest</div>
                <div class="content-part-1-left-p">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially
                    unchanged.
                </div>
                <div class="p20_0"><a href="../index.php" class="content-part-1-left-btn">Home Page</a></div>
                <?php if (isset($_SESSION['authn'])) { ?>
                    <div class="p20_0"><a href="../carts/index.php" class="content-part-1-left-btn">Carts</a></div>
                <?php } ?>
            </div>
            <div class="content-part-1-right" align="center">
                <img src="images/content-part-1.jpg" width="673" height="434" alt="Restaurant">
            </div>
        </div>
        <?php
        $items = getAllItems('items');

        if (mysqli_num_rows($items) > 0) {
            foreach ($items as $item) {
                ?>
                <div class="content-part-3">
                    <div class="content-part-3-left">
                        <img src="../admin/uploads/<?= $item['image']; ?>" width="230" height="155" alt="<?= $item['name']; ?>">
                    </div>
                    <div class="content-part-3-right">
                        <div class="content-part-3-right-h4">
                            <?= $item['name'] ?>
                        </div>
                        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>
                                <?= $item['price'] ?>/-
                            </i>
                        </div>
                        <?= $item['description'] ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text">-</span>
                            <input type="text" class="form-control" disabled aria-label="Amount (to the nearest dollar)" style="width: 50px; border-radius: 5px; border: 0px">
                            <span class="input-group-text">+</span>
                        </div>
                        <?php if (isset($_SESSION['authn'])) { ?>
                            <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
                        <?php } else {
                            ?>
                            <div class="margin_p3"><a href="../index.php" class="order-now">Login To order</a></div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <h4>No Items Available</h4>
            <?php
        }
        ?>
        <!----- End Content ------>

        <!------ Start Footer ------>
        <div class="footer">
            <div class="footer-parts">
                <div class="footer-parts-h3">About Restaurant</div>
                <div class="footer-parts-p">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it
                    to
                    make a type specimen book.</div>
            </div>
            <div class="footer-parts">
                <div class="footer-parts-h3">Opening Hours</div>
                <div class="footer-parts-p">
                    Mon - Thu : 7:00 AM - 10:00 PM <br />
                    Friday : 7:00 AM - 11:00 PM <br />
                    Sat - Sun : 7:00 AM - 11:45 PM
                </div>
            </div>
            <div class="footer-parts">
                <div class="footer-parts-h3">Our Location</div>
                <div class="footer-parts-p">
                    3rd phace MG Layout,<br />
                    Opp - Smaple School,<br />
                    Pl Name - Free Time Learn,<br />
                    Andhra Pradesh, Nellore(Dt),<br />
                    India - 524002
                </div>
                <div class="footer-icons">
                    <ul>
                        <li><a href="#!"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#!"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#!"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#!"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="white">&copy;
                <script language="javascript" type="text/javascript">document.write(new Date().getFullYear());</script>.
                All rights reserved by <a href="http://www.freetimelearning.com/" target="_blank">Free
                    Time Learn</a>.
            </div>
        </div>
        <!------ End Footer ------->

        <div class="clearfix"></div>
    </div>

</body>

</html>