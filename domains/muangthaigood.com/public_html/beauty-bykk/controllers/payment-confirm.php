<!-- Latest compiled and minified CSS -->
<link href="../plugins/datepicker/jquery.datepick.css" rel="stylesheet">

<script src="../plugins/datepicker/jquery.plugin.js"></script>
<script src="../plugins/datepicker/jquery.datepick.js"></script>
<script src="../plugins/datepicker/jquery.datepick-th.js"></script>
<script>
    $(function () {
        // $('#transfer_date').datepick();
        $('#transfer_date').datepick({
            maxDate: +0,
            dateFormat: 'yyyy-m-d'
        });
        // $('#inlineDatepicker').datepick({onSelect: showDate});
    });

</script>

<?php
if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);

    $payment_confirm->SetValues($arrData);


    if ($payment_confirm->GetPrimary() == '') {


        $payment_confirm->SetValue('created_at', DATE_TIME);


        $payment_confirm->SetValue('updated_at', DATE_TIME);
    } else {


        $payment_confirm->SetValue('updated_at', DATE_TIME);
    }

    $payment_confirm->SetValue('transfer_date', $_POST['transfer_date'] . " " . $_POST['transfer_hr'] . ":" . $_POST['transfer_min'] . ":00");
    $payment_confirm->SetValue('status', 'รอการชำระเงิน');


    if ($payment_confirm->Save()) {


        if (isset($_FILES['file_array'])) {


            $Allfile = "";

            $Allfile_ref = "";

            for ($i = 0; $i < count($_FILES['file_array']['tmp_name']); $i++) {

                if ($_FILES["file_array"]["name"][$i] != "") {

                    //   unset($arrData['webs_money_image']);


                    $targetPath = DIR_ROOT_IMAGES . "/";

                    $ext = explode('.', $_FILES['file_array']['name'][$i]);
                    $extension = $ext[count($ext) - 1];
                    $rand = mt_rand(1, 100000);

                    $newImage = DATE_TIME_FILE . $rand . "." . $extension;


                    $cdir = getcwd(); // Save the current directory

                    chdir($targetPath);

                    copy($_FILES['file_array']['tmp_name'][$i], $targetPath . $newImage);

                    chdir($cdir); // Restore the old working directory   
                    //   $payment_confirm->SetValue('image_receipt', $newImage);


                    if ($payment_confirm->GetPrimary() != '') {

                        $arrOrder = array(
                            'image_receipt' => $newImage,
                            'updated_at' => DATE_TIME
                        );

                        $arrOrderID = array('id' => $payment_confirm->GetPrimary());
                        if ($payment_confirm->updateSQL($arrOrder, $arrOrderID)) {

                            // echo "<script>alert('แจ้งชำระเงิน สำเร็จ')</script>";
                        }
                    } else {

                        echo "<script>alert('ไม่สามารถทำรายการได้ กรุณาลองใหม่อีกครั้ง')</script>";
                    }
                }
            }
        }


        //  SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');
        echo "<script>alert('แจ้งชำระเงิน สำเร็จ')</script>";
        // header('location:' . ADDRESS . 'payment-confirm');
        // die();
    } else {


        //  SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
        echo "<script>alert('ไม่สามารถทำรายการได้ กรุณาลองใหม่อีกครั้ง')</script>";
    }
}
?>

<?php echo $payment_confirm_detail->getDataDesc('detail', 'id = 1') ?>
<div class="row" style="padding-left: 210px;">

    <form class="form-horizontal" enctype="multipart/form-data"  method="POST" action="<?php echo ADDRESS ?>payment-confirm" style="text-align: center;
          border: 1px dotted rgba(205, 66, 108, 0.54);;
          width: 300px;">




        <p> ชื่อ - สกุล<em>*</em><br />
            <span>
                <input type="text" class="form-control" id="name" name="name"  required>
            </span> </p>
        <p> เบอร์โทร<em>*</em><br />
            <span>
                <input type="number" name="tel" class="form-control" id="tel" required>
            </span> </p>
        <p> Email<em>*</em><br />
            <span>
                <input type="email" name="email" class="form-control" id="email" required>
            </span> </p>
        <p> จำนวนเงินที่ชำระ<em>*</em><br />
            <span>
                <input type="number" class="form-control" id="transfer_amount" name="transfer_amount"  required>
            </span> </p>
        <p> วันที่โอน<em>*</em><br />
            <span>
                <input type="text" class="form-control" id="transfer_date" name="transfer_date" readonly="" required>
            </span> </p>
        <p> เวลาที่โอนเงิน<em>*</em><br />
            <span>
                <select class="form-control" id="transfer_hr" name="transfer_hr" required>
                    <option value="">-ชั่วโมง-</option>
<?php
for ($h = 0; $h < 24; $h++) {
    echo "<option value=" . str_pad($h, 2, "0", STR_PAD_LEFT) . ">" . str_pad($h, 2, "0", STR_PAD_LEFT) . "</option>";
}
?>
                </select>
                :
                <select class="form-control" id="transfer_min" name="transfer_min" required>
                    <option value="">-นาที-</option>
<?php
for ($m = 0; $m < 60; $m++) {
    echo "<option value=" . str_pad($m, 2, "0", STR_PAD_LEFT) . ">" . str_pad($m, 2, "0", STR_PAD_LEFT) . "</option>";
}
?>
                </select>
            </span> </p>

        <p> อัพโหลดรูปสลิป (ถ้ามี)<em></em><br />
            <span>
                <input type="file" class="form-control" name="file_array[]" id="file_array">
            </span> </p>

        <p>
            <input id="submit_bt" name="submit_bt" type="submit" value="บันทึกข้อมูล"

                   style="width: 80px; height: 30px;" />
            <input name="reset"

                   type="reset" value="Reset" style="width: 80px; height: 30px;" />
        </p>


        <p>&nbsp;</p>
    </form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<style>
    em{
        color: red;
    }
</style>