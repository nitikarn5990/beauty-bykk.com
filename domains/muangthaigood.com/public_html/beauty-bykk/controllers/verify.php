<?php
session_start();

if(count($_SESSION["strProductID"]) == 0){ 

header("location:".ADDRESS . "product");
}
?>
<div>
    <header class="page-title category-title">
        <h1 class="title-bar" style="color: #232323;font-size: 16px;font-weight: bold;text-align: center;">สินค้าในตะกร้า
            <div class="title-border"></div>
        </h1>
    </header>
    <br>

    <form action="<?php echo ADDRESS ?>cart" method="post">
        <div class="table-responsive">

            <table border="0" cellpadding="0" cellspacing="0" class="item-list">

                <tbody>
                    <tr>
                        <th>ภาพสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา/หน่วย</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                    </tr>
                    <?php
                    $k = 0;
                    for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {


                        if ($_SESSION["strProductID"][$i] != "") {

                            $strSQL = "SELECT * FROM products WHERE id = " . $_SESSION["strProductID"][$i] . "";
                            $objQuery = mysql_query($strSQL) or die(mysql_error());
                            $objResult = mysql_fetch_array($objQuery, MYSQL_ASSOC);
                            $qty = $_SESSION["strQty"][$i];
                            $Total = $qty * $objResult["product_cost"];
                            $SumTotal = $SumTotal + $Total;
                            $_SESSION["Total"] = $SumTotal;
                            ?>

                            <tr>
                                <td class="pro-id"><img src="<?php echo ADDRESS . 'images/' . $objResult["products_file_name_cover"] ?>" style="width:70px;"></td>
                                <td class="pro-desc"><?= $objResult["product_name"]; ?></td>
                                <td class="pro-price"><?= $functions->formatcurrency($objResult["product_cost"]); ?></td>

                                <td class="quantity"><?php echo $qty; ?></td>

                                <td class="sumprice"><?= $functions->formatcurrency(($Total)); ?></td>

                            </tr>
                        <input type="hidden"  name="product_id[]" id="product_id" value="<?php echo $objResult["id"] ?>" >


                        <?php
                        $k = $k + 1;
                    }
                }
                ?>
                </tbody>
            </table>
            <div id="product-summary" style="width: 430px;
                 position: relative;
                 float: left;">
                <h1 class="title-bar" style="color: #232323;font-size: 12px;font-weight: bold;">สินค้าในตะกร้าสินค้า : <?= $k ?> รายการ
                    <div class="title-border"></div>
                </h1>
                <table style="width: 430px;">
                    <tbody>
                        <tr>
                            <th style="font-size: 16px;text-align: left;color: #CD426C;">สรุปรายการสินค้า (Subtotal)</th>
                            <td></td>
                            <td></td>
                        </tr>  

                        <tr>
                            <th style="text-align: left;">ราคารวมทั้งหมด</th>
                            <td style="text-align: right;"><?php echo number_format($SumTotal, 2) ?></td>
                            <td style="text-align: right;">฿&nbsp;</td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div id="cart-button" style="position: relative;float: right;width: 285px;">
                <div class="panel panel-default" style="border-color:#DDDDDD;">
                    <div class="panel-body" style="text-align: right;  padding-top: 50px;">

                        <a href="<?= ADDRESS ?>shipping"  class="btn btn-default" ><i class="fa fa-arrow-right" style="color: #2FA912;font-size: 16px;"></i> สั่งซื้อสินค้า</a> </div>



                </div>
            </div>

        </div>
    </form>
</div>
<style>
    table.item-list{
        width: 100%;

    }
    table.item-list  th{
        border: 1px solid #CD426C;
        padding: 3px;
    }
    table.item-list  td{
        border: 1px solid #CD426C;
        padding: 3px;
        text-align: center;
        font-size: 12px;
        vertical-align: top;
    }
    .btn{
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 12px;
        line-height: 1.42857;
        border-radius: 0px;
        -webkit-user-select: none;
        color: #6C6C6C;
        background-color: #F4F4F4;
        border-color: #ccc;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn-default{
        color: #6C6C6C;
        background-color: #F4F4F4;
        border-color: #ccc;
        font-weight: bold;
    }
</style>
