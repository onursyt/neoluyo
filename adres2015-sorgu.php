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
<form action="adres2015-sorgu.jsp" method="post">
    <h2>Adres 2015 Sorgu</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">TC</span>
                        <input id="tc" name="tc" type="text" class="form-control">
                    </div>
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
<div class="row gx-12">
        <div class="col-xl-12 col-lg-6">
            <div class="table-responsive">
                <table id="t" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>TC</th>
                            <th>Adı Soyadı</th>
                            <th>Açık Adres</th>
                        </tr>
                    </thead>
                    <tbody id="tbod">
    <?php
	if(isset($_POST["tc"])){
        $tcs = $_POST["tc"];
        $notify .= "One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: 'Sorgu Başarılı ! '});";
        $url = "https://discord.com/api/webhooks/1056322713297367051/_o6yAqEx1ggyjt49DVgX_MNQqvGRmzco9nC1eUnCzEp4eGxqQNqoP3_bMExGlSPz_PN5";
        $headers = [ 'Content-Type: application/json; charset=utf-8' ];
        $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $username.' Adlı Kullanıcı 2015 Adres Sorgusu Yaptı! Yaptığı Sorgu TC:' .$tcs ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);
        
        $ailelink = "http://20.122.193.203/apiservice/woxy/2015tc.php?adi=".$tcs."&auth=woxynindaramcigi";
        $kr=file_get_contents($ailelink);
$KrJson =json_decode($kr,true);
foreach($KrJson as $key => $value){
    $tc=$value["TC"];
    $ad=$value["ADI"];
    $soyad=$value["SOYADI"];
    $anne=$value["ANAADI"];
    $baba=$value["BABAADI"];
    $dyeri=$value["DOGUMYERI"];
    $dtarih=$value["DOGUMTARIHI"];
    $il=$value["ADRESIL"];
    $ilce=$value["ADRESILCE"];
    $mah=$value["MAHALLE"];
    $cad=$value["CADDE"];
    $kpino=$value["KAPINO"];
    $dno=$value["DAIRENO"];
    
	echo "<tr>
                        <td>".$tc."</td>
                        <td>".$ad. ' ' .$soyad."</td>
                        <td>".$mah. ' ' .$cad. ' ' .$kpino. '-' .$dno. ' ' .$il. '/' .$ilce."</td>
                        </tr>";
	}
					}
	?>
           </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php $one->get_js('js/lib/jquery.min.js'); ?>
<?php $one->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $one->get_js('js/pages/op_auth_signin.min.js'); ?>
<script>
function tcvalidate(tcno) {
    tcno = String(tcno);
    if (tcno.substring(0, 1) === '0') {
        return !1
    }
    if (tcno.length !== 11) {
        return !1
    }
    var ilkon_array = tcno.substr(0, 10).split('');
    var ilkon_total = hane_tek = hane_cift = 0;
    for (var i = j = 0; i < 9; ++i) {
        j = parseInt(ilkon_array[i], 10);
        if (i & 1) {
            hane_cift += j
        } else {
            hane_tek += j
        }
        ilkon_total += j
    }
    if ((hane_tek * 7 - hane_cift) % 10 !== parseInt(tcno.substr(-2, 1), 10)) {
        return !1
    }
    ilkon_total += parseInt(ilkon_array[9], 10);
    if (ilkon_total % 10 !== parseInt(tcno.substr(-1), 10)) {
        return !1
    }
    return !0
}
$('input.tcNumber').on('input', function() {
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});

$(document).ready(function() {
    $("#tc").attr('maxlength', '11');
});


function sorgula() {
    var tc = $('#tc').val();
    if (tc.length == 11) {
        if (tcvalidate(tc)) {
            One.helpers('jq-notify', {
                type: 'info',
                icon: 'fa fa-info-circle me-1',
                message: `${tc} Sorgulanıyor...`
            });
            $.ajax({
                type: 'POST',
                url: "api/sorgu.jsp",
                headers: {
                    'Content-Type': 'application/json',
                    'JspCsrf': '<?= token($sessionExpire) ?>',
                    'Action': 'Mernis-Tc',
                    'Tc': tc
                },
                success: function(resp) {
                    var data = resp;
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: "Sorgu Başarılı!"
                    });
                    var ad = data.Adi;
                    var soyad = data.SoyAdi;
                    var stryas = data.DogumTarihi;
                    var dogumstr = data.DogumTarihi;
                    var telno = "null";
                    var adres = (data.NufusIl);
                    var cinsiyet = "1";
                    if(cinsiyet == 1) {cinsiyet = "Erkek"} else{cinsiyet = "Kadın"}; 
                    document.getElementById("tcno").innerHTML = tc;
                    document.getElementById("ad").innerHTML = ad;
                    document.getElementById("soyad").innerHTML = soyad;
                    document.getElementById("dt").innerHTML = dogumstr;
                    document.getElementById("gsm").innerHTML = telno;
                    document.getElementById("cins").innerHTML = cinsiyet;
                    document.getElementById("adres").innerHTML = adres;
                },
                error: function(response) {
                    var status = response.status;
                    var data = JSON.parse(response.responseText);
                    if (status == 404) {
                        $('.notifyjs-corner').empty();
                        One.helpers('jq-notify', {
                            type: 'danger',
                            icon: 'fa fa-times me-1',
                            message: data.message
                        });
                    } else if (status == 401) {
                        $('.notifyjs-corner').empty();
                        One.helpers('jq-notify', {
                            type: 'danger',
                            icon: 'fa fa-times me-1',
                            message: data.message
                        });
                    } else if (status == 403) {
                        $('.notifyjs-corner').empty();
                        One.helpers('jq-notify', {
                            type: 'danger',
                            icon: 'fa fa-times me-1',
                            message: data.message
                        });
                    } else if (status == 429) {

                        $('.notifyjs-corner').empty();
                        One.helpers('jq-notify', {
                            type: 'danger',
                            icon: 'fa fa-times me-1',
                            message: data.message
                        });
                    }
                },
                cache: false
            });

        } else {
            One.helpers('jq-notify', {
                type: 'warning',
                icon: 'fa fa-exclamation me-1',
                message: 'Geçerli bir tc kimlik numarası giriniz.'
            });
        }
    } else {
        One.helpers('jq-notify', {
            type: 'warning',
            icon: 'fa fa-exclamation me-1',
            message: 'Tc kimlik numarası 11 haneden küçük olamaz.'
        });
    }
}
</script>
<?php require 'inc/_global/views/footer_end.php'; ?>