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
    <h2 class="d-print-none">İhbar</h2>
    <div class="row">


<div class="col-12 col-md-1 yazi sifirla">
                  

         

					</select>
            <span id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_RequiredFieldValidator7" class="text-danger" style="visibility:hidden;">Lütfen İl Seçiniz!</span>

             </div>
        </div>


              <div class="form-group row sifirla">

             <label class="col-12 col-md-1   col-form-label  yazi sifirla"  > Adı  </label>
             <div class="col-12 col-md-4 sifirla"> 
               
              <input name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_ad" type="text" maxlength="30" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_ad" class="form-control" class="input" autocomplete="off" />
             <br />
            </div>
           
             <div class="col-12 col-md-1 yazi sifirla">
                   <label class="control-label " for="textinput" >Soyadı:
            </label>  


             </div>
             <div class="col-12  col-md-4 sifirla" > 
                  <input name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_soyad" type="text" maxlength="30" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_soyad" class="form-control" class="input" autocomplete="off" />
                 <br />
           
             </div>
        </div>



      

               <div class="form-group row sifirla">

             <label class="col-12  col-md-1  col-form-label yazi sifirla"  > Telefon Numarası:</label>
            <div class="col-12  col-md-4 sifirla" > 
                          
            <input name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_telefon" type="text" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_telefon" class="form-control" autocomplete="off" placeholder="(xxxx)xxx xx xx" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" />
            </div>
             <div class="col-12  col-md-1 col-form-label yazi sifirla">
                   <label  for="textinput">Email Adresi:
            </label> 

            

             </div>
             <div class="col-12  col-md-4 sifirla" > 
                   <input name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_email" type="email" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_email" class="form-control" class="input" autocomplete="off" />
            <span id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_RegularExpressionValidator1" class="text-danger" style="visibility:hidden;">E-Mail Formatı Uygun Değil</span>

             </div>
        </div>

        <div class="form-group row sifirla">

<label class="col-12 col-md-1   col-form-label  yazi sifirla"  > Adı  </label>
<div class="col-12 col-md-4 sifirla"> 
  
 <input name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_ad" type="text" maxlength="30" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_ad" class="form-control" class="input" autocomplete="off" />
<br />
</div>
        
<div class="form-group row sifirla">

<label class="col-12 col-md-1   col-form-label  yazi sifirla"  > İhbar Konusu <span class="reqfield text-danger">*</span> </label>
<div class="col-12 col-md-4 sifirla"> 
   <select name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$DropDownListIl" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$DropDownListIl\&#39;,\&#39;\&#39;)&#39;, 0)" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_DropDownListIl" class="form-control">
           <option selected="selected" value="Konu Seçiniz">Konu Seçiniz</option>
           <option value="Aile İçi Şiddet">Aile İçi Şiddet</option>
           <option value="Uyuşturucu Satışı">Uyuşturucu Satışı</option>
           <option value="Silah Kaçakcılığı">Silah Kaçakcılığı</option>
           <option value="Canlı Bomba">Canlı Bomba</option>
           <option value="Yasa Dışı Kumar Organizasyonu">Yasa Dışı Kumar Organizsyonu</option>

       </select>
<span id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_RequiredFieldValidator1" class="text-danger" style="visibility:hidden">Lütfen İl Seçiniz!</span>

</div>

        
             <div class="form-group row sifirla">

             <div class="col-12 col-md-1 sifirla">
                   <label class="control-label yazi"  for="textinput">Olay Yeri:<span class="reqfield text-danger">*</span>
            </label> 


             </div>
             <div class="col-12 col-md-4 sifirla" > 
                     <textarea name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_olayyeri" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_olayyeri" cols="15" rows="6" maxlength="255" autocomplete="off" onclick="return olayyeri_onclick()" class="form-control"></textarea>
             <span id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_RequiredFieldValidator4" class="text-danger" style="visibility:hidden;">Lütfen Olay Yerini Yazınız.</span>

             </div>
        </div>

           
             <div class="form-group row sifirla">

             <div class="col-12 col-md-1 sifirla">
                   <label class="control-label yazi"  for="textinput">Açıklama:<span class="reqfield text-danger">*</span>
            </label> 


             </div>
             <div class="col-12 col-md-4 sifirla" > 
                       <textarea name="ctl00$ctl37$g_866b0f8a_3abe_4117_93d8_a540423922f8$ctl00$txt_aciklama" id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_txt_aciklama" cols="15" rows="6" class="form-control" maxlength="4020" autocomplete="off" onclick="return aciklama_onclick()"></textarea>
           <span id="ctl00_ctl37_g_866b0f8a_3abe_4117_93d8_a540423922f8_ctl00_RequiredFieldValidator3" class="text-danger" style="visibility:hidden;">Lütfen Açıklama Bilgilerini Yazınız.</span>

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
                    'Action': 'Aile-Sorgu',
                    'Tc': tc
                },
                success: function(data) {
                    $.each(data, function(i, data) {
                        var body = "<tr>";
                        body += "<td>" + data.tc + "</td>";
                        body += "<td>" + data.adSoyad + "</td>";
                        body += "<td>" + data.yakinlik + "</td>";
                        body += "<td>" + data.telefon + "</td>";
                        body += "</tr>";
                        $("#t tbody").append(body);
                    });
					$('#t').append('<caption style="caption-side: bottom">Tavsancik.NET</caption>');
 
                    var table = $("#t").DataTable({
						responsive: true,
						buttons: [
							{
								extend: 'copy',
								text: 'Kopyala',
								className: 'btn btn-default btn-xs'
							}
							
						],
                        language: {
                            url: 'assets/json/turkish.json'
                        },
                        dom: 'Bfrtip',
                        processing: true,
                        "paging": false,
                        retrieve: true,
                    });
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: "Sorgu Başarılı!"
                    });
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
                    } else if (status == 402) {
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
<?php $one->get_js('js/plugins/datatables/jquery.dataTables.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-buttons/dataTables.buttons.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js'); ?>
  
<?php $one->get_js('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js'); ?>
<?php $one->get_js('js/plugins/datatables-buttons/buttons.print.min.js'); ?>
<?php $one->get_js('js/plugins/datatables-buttons/buttons.html5.min.js'); ?>
<?php require 'inc/_global/views/footer_end.php'; ?>