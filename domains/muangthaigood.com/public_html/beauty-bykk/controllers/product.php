<?php
if ($_POST['bt_submit'] == "Add to cart") {

    if ($_SESSION['customer_id'] == '') {
        //$url = ADDRESS . "sign.html";

        echo "<script>$(document).ready(function() {  alert('กรูณาเข้าสุ่ระบบเพื่อทำการสั่งซื้อค่ะ');   });   </script>";
        ?>

        <div class="alert alert-danger" role="alert"> 
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="sr-only">Error:</span> กรูณาเข้าสู่ระบบหรือลงทะเบียนเพื่อสั่งซื้อค่ะ 
            <a href="<?php echo ADDRESS ?>signin.html" class="btn btn-primary" style="  color: #6C6C6C;background-color: #F4F4F4;border-color: #ccc;font-weight: bold;">เข้าสู่ระบบ</a>
            <a href="<?php echo ADDRESS ?>register.html" class="btn btn-primary" style="  color: #6C6C6C;background-color: #F4F4F4;border-color: #ccc;font-weight: bold;">ลงทะเบียน</a>
        </div>

        <?php
    } else {
        ?>
        <div class="alert alert-success" role="alert"> 
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span class="sr-only">Success:</span> เพิ่มลงในตระกร้าสินค้าแล้ว 
            <a href="<?php echo ADDRESS ?>cart.html" class="btn btn-primary" style="  color: #6C6C6C;background-color: #F4F4F4;border-color: #ccc;font-weight: bold;">View cart</a>
        </div>
        <?php
        if (!isset($_SESSION["intLine"])) {

            $_SESSION["intLine"] = 0;
            $_SESSION["strProductID"][0] = $_POST['product_id'];
            $_SESSION["strQty"][0] = $_POST['qty'];
        } else {

            $key = array_search($_POST['product_id'], $_SESSION["strProductID"]);
            if ((string) $key != "") {
                $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $_POST['qty'];
            } else {

                $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
                $intNewLine = $_SESSION["intLine"];
                $_SESSION["strProductID"][$intNewLine] = $_POST['product_id'];
                $_SESSION["strQty"][$intNewLine] = $_POST['qty'];
            }
        }
///////////////////////
    }
}
?>

<?php
if ($_GET['proID'] != '') {
    $arrID = explode('_', $_GET['proID']);
    $proID = $arrID[0];
    ?>
    <div style="padding-left: 223px;">
        <ul style="height: 290px;">
            <?php
            $sql2 = "SELECT * FROM " . $products->getTbl() . " WHERE id = " . $proID . " and status ='ใช้งาน' ORDER BY sort ASC";

            $query2 = $db->Query($sql2);
            $pro_detail = '';
            if ($db->NumRows($query2) > 0) {
                while ($row2 = $db->FetchArray($query2)) {
                    $pro_detail = $row2['product_detail'];
                    ?>
                    <li style="height: 270px;">
                        <a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>">

                            <img src="<?php echo $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") == "" ? NO_IMAGE : ADDRESS . 'images/' . $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") ?>" width="202" height="166" class="imgproducts" >
                        </a>


                        <p style="margin-top: 39px;"><div class="txtproductssize"><a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>"><?= $row2['product_name'] ?></a></div></p>

                        <div class="txtproductssize">
                            <span style="font-weight: bolder; font-size: 14px;">ราคา: <?= $functions->formatcurrency($row2['product_cost']) ?> ฿</span>
                            <div style="width: 110px;padding-left: 12px;  padding-top: 5px;"> 

                                <a href="<?= ADDRESS ?>cart/<?= $row2['id'] ?>" id="add_cart_button"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;หยิบใส่ตะกร้า</a>
                            </div>

                        </div>

                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>


    <div class="clear"></div>
    <div class="product-detail" style="width: 100%;">
        <?php
        $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
        $product_Detail2 = str_replace("../files", "../../files", $pro_detail);

        $html = preg_replace('/(width|height)="\d*"\s/', "", $product_Detail2);
        echo $html;
        ?>

    </div>



    <?php
} else if ($_GET['catID'] != '') {
    $arrID = explode('_', $_GET['catID']);
    $catID = $arrID[0];

    $sql = "SELECT * FROM " . $category->getTbl() . " WHERE id = " . $catID . " and status ='ใช้งาน' ORDER BY sort ASC";

    $query = $db->Query($sql);

    while ($row = $db->FetchArray($query)) {
        ?>
        <div style="">
            <span><?= $row['category_detail']; ?></span>
            <h1><?= $row['category_name'] ?></h1>
            <ul style="height: 290px;">
                <?php
                $sql2 = "SELECT * FROM " . $products->getTbl() . " WHERE category_id = " . $row['id'] . " and status ='ใช้งาน' ORDER BY sort ASC";

                $query2 = $db->Query($sql2);
                if ($db->NumRows($query2) > 0) {
                    while ($row2 = $db->FetchArray($query2)) {
                        ?>
                        <li>
                            <a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>">

                                <img src="<?php echo $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") == "" ? NO_IMAGE : ADDRESS . 'images/' . $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") ?>" width="202" height="166" class="imgproducts" >
                            </a>


                            <p style="margin-top: 39px;"><div class="txtproductssize"><a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>"><?= $row2['product_name'] ?></a></div></p>

                            <div class="txtproductssize">
                                <span style="font-weight: bolder; font-size: 14px;">ราคา: <?= $functions->formatcurrency($row2['product_cost']) ?> ฿</span>
                                <div style="width: 110px;padding-left: 12px;    padding-top: 5px;"> 

                                    <a href="<?= ADDRESS ?>cart/<?= $row2['id'] ?>" id="add_cart_button"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;หยิบใส่ตะกร้า</a>
                                </div>

                            </div>

                        </li>
                        <?php
                    }
                }
                ?>
            </ul>

            <div class="clear"></div>
            <hr>
        </div>



    <?php } ?>
    <?php
} else {


    $sql = "SELECT * FROM " . $category->getTbl() . " WHERE status ='ใช้งาน' ORDER BY sort ASC";

    $query = $db->Query($sql);

    while ($row = $db->FetchArray($query)) {
        ?>
        <div style="">
            <span><?= $row['category_detail']; ?></span>
            <h1><?= $row['category_name'] ?></h1>
            <ul style="height: 290px;">
                <?php
                $sql2 = "SELECT * FROM " . $products->getTbl() . " WHERE category_id = " . $row['id'] . " and status ='ใช้งาน' ORDER BY sort ASC";

                $query2 = $db->Query($sql2);
                if ($db->NumRows($query2) > 0) {
                    while ($row2 = $db->FetchArray($query2)) {
                        ?>
                        <li>
                            <a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>">

                                <img src="<?php echo $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") == "" ? NO_IMAGE : ADDRESS . 'images/' . $product_files->getDataDescLastID("file_name", "product_id = '" . $row2['id'] . "'") ?>" width="202" height="166" class="imgproducts" >
                            </a>


                            <p style="margin-top: 39px;"><div class="txtproductssize"><a href="<?= ADDRESS ?>product/<?= $row2['category_id'] ?>/<?= $row2['id'] ?>_<?= $row2['product_name_ref'] ?>"><?= $row2['product_name'] ?></a></div></p>

                            <div class="txtproductssize">
                                <span style="font-weight: bolder; font-size: 14px;">ราคา: <?= $functions->formatcurrency($row2['product_cost']) ?> ฿</span>
                                <div style="width: 110px;padding-left: 12px;    padding-top: 5px;"> 

                                    <a href="<?= ADDRESS ?>cart/<?= $row2['id'] ?>" id="add_cart_button"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;หยิบใส่ตะกร้า</a>

                                </div>

                            </div>

                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="clear"></div>
            <hr>
        </div>



    <?php } ?>
<?php } ?>

<style>
    .clear  {
        clear:  both;
    }
    .contentleft li {
        height: 305px;
    }
    #add_cart_button{

        width: 108px !important;
        display: block;
        height: 20px;

        color: #FFFFFF;
        margin-left: 39px;
        background-color: #CE436D;
        border-radius: 10px;

        padding: 1px;

        border: 1px solid rgb(205, 66, 108);
        text-shadow: 0px 1px rgba(109, 108, 108, 0.46);
    }
    .txtproductssize{
        padding: 0;
    }
</style>