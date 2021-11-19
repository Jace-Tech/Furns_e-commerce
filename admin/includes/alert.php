<?php

if (isset($_GET['alert'])) :
    $alert = $_GET['alert'];

    switch ($alert) {
        case 'product_added':
?>
            <script>
                swal('Product Added!', '', 'success')
            </script>
        <?php
            break;

        case 'e':
        ?>
            <script>
                swal('Something went wrong', 'Please try again', 'error')
            </script>
<?php
            break;
    }

endif;
