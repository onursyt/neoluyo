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
<form action="allvesika.jsp" method="post">
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
											Bu sorguyu kullanırken karşılaşabileceğiniz başlıca sorunlar ve çözümleri  <br>

                                            Yanlış kişi çıktı, Tekrar sorgu at aynı kimlik numarasına. <br>
                                            Hep aynı kişi çıkıyor, Api patladı discord üzerinden Cyber Rate#0161 kişisine ulaş! <br>
                                            Anasayfadaki duyurular kısmını takip edin orada aktif olup olmadığı yazar!
											</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                <input class="btn btn-secondary" type="submit" value="Sorgula">
                </div>
            </div>
        </div>
    </div>
	
</form>
<div class="table-responsive">

                                <table id="example2" class="table">

                                    <thead>

                                        <tr style="text-align: center;">
                                        <th>Tc</th>
                                        <th>AD / SOYAD</th>
                                        <th>Doğum Tarihi</th>
										<th>RESİM</th>

                                        </tr>

                                    </thead>
    <?php
	if(isset($_POST["tc"])){

        $tcs = $_POST["tc"];
        $notify .= "One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: 'Sorgu Başarılı ! Hatalı sonuç alırsanız discord üzerinden bildirin.'});";
        $url = "https://discord.com/api/webhooks/1056322713297367051/_o6yAqEx1ggyjt49DVgX_MNQqvGRmzco9nC1eUnCzEp4eGxqQNqoP3_bMExGlSPz_PN5";
        $headers = [ 'Content-Type: application/json; charset=utf-8' ];
        $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $username.' Adlı Kullanıcı -18 Vesika Sorgusu Yaptı! Yaptığı Sorgu TC:'.$tcs ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);
     
  
        $ailelink = "http://20.122.193.203/apiservice/woxy/allvesika.php?tc=$tcs&auth=cyberinsikimemesiamigotu";
        $kr=file_get_contents($ailelink);
$value =json_decode($kr,true);


                 $image = $value["data"];

                 $ailelink = "http://20.122.193.203/apiservice/woxy/tc.php?tc=".$tcs."&auth=woxynindaramcigi";
        $kr=file_get_contents($ailelink);
$KrJson =json_decode($kr,true);
foreach($KrJson as $key => $value){
    $tc=$value["TC"];
    $isim=$value["ADI"];
    $soyad=$value["SOYADI"];
    $dogumtarihi=$value["DOGUMTARIHI"];
}
               
                            
						
                                    ?>
                                    <tbody>

                                            <tr style="text-align: center;">
											
                                            <td> <?= $tc ?> </td>
                                            <td> <?= $isim. " " .$soyad?> </td>
                                            <td> <?= $dogumtarihi ?> </td>
                                             
                                                
                                                <td> <img src="data:image/png;base64, <?= $image["image"]; ?>" alt="Sonuç Bulunamadı amk ne bakıyorsun başka orospu çocuğunu arat :D" /></td>
                                            </tr>
										

	<?php  }?>
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