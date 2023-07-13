<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/user.php'; ?>
<?php require 'inc/_global/token.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<?php $one->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $one->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $one->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<style>
table.table-bordered>tbody>tr>td {
    border: 1px solid #364054;
}

table.table-bordered>tbody>tr>th {
    border: 1px solid #364054;
}
</style>
<div class="content">
<form action="vesika-sorgu.jsp" method="post">
    <h2>Vesika  Sorgu</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">TC</span>
                        <input id="tc" name="tc" type="text" class="form-control">
                    </div>
                </div>
                <div class="alert alert-danger" style="padding: 15px;">
											Aktif! Sadece açık öğretime giden öğrenciler çıkar!
											</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <input class="btn btn-secondary" onclick="" type="submit" value="Sorgula">
                </div>
            </div>
        </div>
    </div>
	
</form>
<div class="table-responsive">

                                <table id="example2" class="table">

                                    <thead>

                                        <tr style="text-align: center;">

                                            <th>TC</th>

                                            <th>Öğrenci Numarası</th>

                                            <th>ADI</th>

                                            <th>SOYADI</th>

                                            <th>OKUL ALAN</th>

											<th>RESİM</th>

                                        </tr>

                                    </thead>
    <?php
	if(isset($_POST["tc"])){
        $tc = $_POST["tc"];
        $tcs = $_POST["tc"];
  
$ailelink = "http://20.122.193.203/apiservice/woxy/vesikayeni.php?tc=$tcs&auth=woxynindaramcigi";
$kr=file_get_contents($ailelink);
$value =json_decode($kr,true);

$tcs=$value["ogrencino"];
$gsms=$value["name"];
$soyad = $value["surname"];
    $okul = $value["school"];
        $image = $value["image"];

                            ?>
                            <tbody>

                                    <tr style="text-align: center;">
                                    <td> <?= $tc; ?> </td>
                                    <td> <?= $tcs; ?> </td>
                                        <td> <?= $gsms; ?> </td>
                                        <td> <?= $soyad; ?> </td>
                                        <td> <?= $okul; ?> </td>
                                        
                                        <td> <img src="data:image/png;base64, <?= $image; ?>" alt="Resim Bulunamadı" /></td>
                                    </tr>
                                    <?php  } ?>
	</tbody>

                                </table>

                            </div>
</div>

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php $one->get_js('js/lib/jquery.min.js'); ?>
<?php $one->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $one->get_js('js/pages/op_auth_signin.min.js'); ?>
<?php require 'inc/_global/views/footer_end.php'; ?>