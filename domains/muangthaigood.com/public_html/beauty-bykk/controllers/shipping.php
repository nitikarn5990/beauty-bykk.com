<?php
session_start();

if (count($_SESSION["strProductID"]) == 0) {

    header("location:" . ADDRESS . "product");
}

if ($_POST['btn_submit'] == 'ดำเนินการต่อ') {
    $cpt = $_POST['capt'];
    if ($cpt != $_SESSION['CAPTCHA']) {
        ?>


        <script>
            $(document).ready(function () {
                alert('Error code');
            });
        </script>

        <?php
    } else {


        $arrData = array();
        


        $arrData = $functions->replaceQuote($_POST);
        $orders->SetValues($arrData);
        if ($orders->GetPrimary() == '') {


            $orders->SetValue('created_at', DATE_TIME);


            $orders->SetValue('updated_at', DATE_TIME);
        } else {


            $orders->SetValue('updated_at', DATE_TIME);
        }
        $orders->SetValue('order_date', DATE_TIME);
        $orders->SetValue('status', 'รอการชำระเงิน');

        if ($orders->Save()) {
            $orders_id = $orders->GetValue('id');
            for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {


                if ($_SESSION["strProductID"][$i] != "") {


                    $strSQL = "SELECT * FROM products WHERE id = " . $_SESSION["strProductID"][$i] . "";
                    $objQuery = mysql_query($strSQL) or die(mysql_error());
                    $objResult = mysql_fetch_array($objQuery, MYSQL_ASSOC);
                    $qty = $_SESSION["strQty"][$i];
                    $Total = $qty * $objResult["product_cost"];
                    $SumTotal = $SumTotal + $Total;
                    $_SESSION["Total"] = $SumTotal;


                    $orders_detail->SetValue('orders_id', $orders_id);
                    $orders_detail->SetValue('product_id', $_SESSION["strProductID"][$i]);
                    $orders_detail->SetValue('qty', $qty);
                    $orders_detail->SetValue('cost', $objResult["product_cost"]);
                    $orders_detail->SetValue('total', $Total);
                    if ($orders_detail->save()) {
                        
                    }
                }
            }
        }


        header("location:" . ADDRESS . "success/".$orders_id);
    }
    ?>
<?php } ?>

<div class="block-middle" style="padding-left: 263px;">
    <form id="shippingForm" name="shippingForm" method="post" action="<?= ADDRESS ?>shipping">
        <table>
            <tbody><tr>
                    <td colspan="3" style="height:5px"></td>
                </tr>
                <tr>
                    <td colspan="3"><input name="" type="radio" value="" checked="checked">
                        กรอกชื่อที่อยู่ในการจัดส่งสินค้า</td>
                </tr>
                <tr>
                    <th>ชื่อ - นามสกุล  :</th>
                    <td class="c-red">*</td>
                    <td>
                        <input name="name" type="text" class="medium" id="name" value="<?= $_POST['name'] != '' ? $_POST['name'] : '' ?>" required="">
                        <div class="c-red"></div>
                    </td>
                </tr>
                <tr>
                    <th>ที่อยู่ :</th>
                    <td class="c-red">*</td>
                    <td><input name="address" type="text" class="medium" id="address" value="<?= $_POST['address'] != '' ? $_POST['address'] : '' ?>" required="">
                        <div class="c-red"></div>

                </tr>
                <tr>
                    <th>จังหวัด :</th>
                    <td class="c-red">*</td>
                    <td>
                        <input name="province" type="text" class="medium" id="province" value="<?= $_POST['province'] != '' ? $_POST['province'] : '' ?>" required="">
                        <div class="c-red"></div>
                    </td>
                </tr>

                <tr>
                    <th>รหัสไปรษณีย์ :</th>
                    <td class="c-red">*</td>
                    <td>
                        <input name="zipcode" type="text" maxlength="5" class="short" id="zipcode" value="<?= $_POST['zipcode'] != '' ? $_POST['zipcode'] : '' ?>" required="">
                        <div class="c-red"></div>
                    </td>
                </tr>
                <tr>
                    <th>เบอร์ติดต่อ :</th>
                    <td class="c-red">*</td>
                    <td>
                        <input name="tel" type="text" class="medium" id="tel" value="<?= $_POST['tel'] != '' ? $_POST['tel'] : '' ?>" maxlength="10" required="">
                        <div class="c-red"></div>
                    </td>
                </tr>
                <tr>
                    <th>E-mail :</th>
                    <td class="c-red">*</td>
                    <td>
                        <input name="email" type="text" class="medium" id="myemail" value="<?= $_POST['email'] != '' ? $_POST['email'] : '' ?>" required="">
                        <div class="c-red"></div>
                    </td>
                </tr>
                <tr>
                    <th>รายละเอียดอื่นๆ :</th>
                    <td class="c-red">&nbsp;</td>
                    <td><textarea name="other" id="other"><?= $_POST['other'] != '' ? $_POST['other'] : '' ?></textarea></td>
                </tr>
                <tr>
                    <td > Enter Code</td>
                    <td class="c-red">*</td>
                    <td>
                        <p>
                            <input name="capt" id="capt" required="" type="text"> <img src="image_capt.php" id="mycapt" align="absmiddle">

                            <img id="changeCpt" src="https://www.e-cnhsp.sp.gov.br/GFR/imagens/refresh.png" style="vertical-align: middle;cursor: pointer;">
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="btn_submit" value="ดำเนินการต่อ">
                        <input name="saveContact" type="hidden" id="saveContact" value="0"></td>
                </tr>
            </tbody></table>
    </form>
</div>
<style>
    .c-red{
        color: red;
    }

</style>
<script type="text/javascript">



    $('#changeCpt').click(function (e) {
        var v = Math.random();
        $('#mycapt').attr('src', 'image_capt.php?v=' + v);
    });

</script>