

<ol class="breadcrumb">

    <li><a href="<?php echo ADDRESS ?>">Home</a></li>
    <?php
    if ($_GET['controllers'] == 'cart' || $_GET['controllers'] == 'ordered' || $_GET['controllers'] == 'ordered_status') {
        
    } else {
        if ($_GET['catID'] != '' && $_GET['productID'] == '') {
            echo "<li>" . $_GET['catID'] . "</li>";
        }
        if ($_GET['catID'] != '' && $_GET['productID'] != '') {

            echo "<li><a href=" . ADDRESS . "product/" . $_GET['catID'] . ".html>" . $_GET['catID'] . "</a></li>";
            echo "<li class=active>" . $_GET['productID'] . "</li>";
        }
    }
    ?>




</ol>