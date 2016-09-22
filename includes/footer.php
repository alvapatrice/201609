<?php
    /**
     * Created by PhpStorm.
     * User: Nostalgie
     * Date: 21-Sep-16
     * Time: 3:24 PM
     */
?>
<link href="css/font-awesome.min.css" rel="stylesheet">
<footer>
    <div class="footer" id="footer" style="background-color:#353535;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-offset-1">
                    </br>
                    </br>
                    </br>
                    </br>
                    <h1 style="color:white;">MeLife</h1>
                    <p id="footercopy"> HviewTech &copy 2016. All right reserved. </p>
                    </br>
                    <p style="padding-left:10px;">
                        <a target="_blank" href="https://www.facebook.com">Facebook</a>
                        -
                        <a target="_blank" href="https://twitter.com">Twitter</a>
                        -
                        <a target="_blank" href="https://www.linkedin.com">LinkedIn</a>
                    </p>
                </div>
                <div class="col-sm-2">
                    <h3 id="footertext"> Company </h3>
                    <ul>
                        <li> <a href="#" id="footerli"> About Us </a> </li>
                        <li> <a href="#" id="footerli"> Interns </a> </li>
                        <li> <a href="#" id="footerli"> Careers </a> </li>
                        <li> <a href="#" id="footerli"> Blog </a> </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h3 id="footertext"> Docs </h3>
                    <ul>
                        <li> <a href="#" id="footerli"> Scoring </a> </li>
                        <li> <a href="#" id="footerli"> Environment </a> </li>
                        <li> <a href="#" id="footerli"> FAQ </a> </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h3 id="footertext"> Others </h3>
                    <ul>
                        <li> <a href="#" id="footerli"> Privacy Policy </a> </li>
                        <li> <a href="#" id="footerli"> Free Node </a> </li>
                        <li> <a href="#" id="footerli"> About Us </a> </li>
                    </ul>
                </div>
            </div>
            </br>
            </br>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
</footer>
<?php
    mysqli_close($conn);
    ob_end_flush();
?>
