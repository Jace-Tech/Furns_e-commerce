<?php

if (isset($_GET["alert"])) :
    $alert = $_GET["alert"];

    switch ($alert) {
        case 'login':
        ?>
            <script>
                swal("Please login to continue", '', 'info')
            </script>
        <?php
            break;

        case 'ue_f':
        ?>
            <script>
                swal("Email does not exist", '', 'error')
            </script>
        <?php
            break;

        case 'cou_de':
        ?>
            <script>
                swal("Invalid Coupon Code", '', 'error')
            </script>
        <?php
            break;

        case 'p_f':
        ?>
            <script>
                swal("Pin does not match", '', 'error')
            </script>
        <?php
            break;

        case 'pc_s':
        ?>
            <script>
                swal("Password Changed Successfully", '', 'success')
            </script>
        <?php
            break;

        case 't_s':
        ?>
            <script>
                swal("Transaction Successful", '', 'success')
            </script>
        <?php
            break;

        case 't_s':
        ?>
            <script>
                swal("Transaction Failed", '', 'success')
            </script>
        <?php
            break;

        case 'cookie_e':
        ?>
            <script>
                swal("Sorry your session expired", '', 'success')
            </script>
        <?php
            break;

        case 'logout':
        ?>
            <script>
                swal("Logged Out Successfully", '', 'success')
            </script>
        <?php
            break;
    }
endif;
