<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/user.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function copyURI(evt) {
    evt.preventDefault();
    navigator.clipboard.writeText(evt.target.getAttribute('href').replace("#", "")).then(() => {
                One.helpers('jq-notify', {
                    type: 'success',
                    icon: 'fa fa-check me-1',
                    message: "Link Başarıyla Panoya Kopyalandı!"
                });
    }, () => {
		One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Panoya Kopyalama Başarısız!'});
    });
}
/*alert("Yavaşlamalar normal sitede aktif 724 kişi sorgu atıyor! En kısa sürede eski hızına geri dönecektir.");*/
</script>
<style>
#shadowBox {
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.2);
    /* Black w/opacity/see-through */
    border: 3px solid;
}

.rainbow {
    text-align: center;
    text-decoration: underline;
    font-size: 32px;
    font-family: monospace;
    letter-spacing: 3px;
}
.rainbow_text_animated {
    background: linear-gradient(to right, #6666ff, #0099ff , #00ff00, #ff3399, #6666ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: rainbow_animation 6s ease-in-out infinite;
    background-size: 400% 100%;
}

@keyframes rainbow_animation {
    0%,100% {
        background-position: 0 0;
    }

    50% {
        background-position: 100% 0;
    }
}
</style>
<!-- Hero -->
<div class="content">
  <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
    <div class="flex-grow-1 mb-1 mb-md-0">
      <h1 class="h3 fw-bold mb-2">
        Tavsancik — Panel
      </h1>
      <h2 class="h6 fw-medium fw-medium text-muted mb-0">
  
      </h2>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
  <!-- Overview -->
  <div class="row items-push">
  <div class="col-sm-12 col-xxl-12">
      <!-- Pending Orders -->
      <div data-bs-toggle="tooltip" data-bs-placement="left" class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
         
            <?= $welcome_text?> <a class="fw-semibold" href="#"><?= $username ?></a> <?= $welcome_text_1 ?>
          </dl>
         
        </div>
      </div>
      <!-- END Pending Orders -->
    </div>
    <div class="col-sm-4 col-xxl-4">
      <!-- Pending Orders -->
      <div data-bs-toggle="tooltip" data-bs-placement="left" title="Üyeliğinizin bitmesine kalan süre." class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
          <dt class="fs-3 fw-bold"><?= $premium_days ?></dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0"><?= $premium_text ?></dd>
          </dl>
       
        </div>
      </div>
      <!-- END Pending Orders -->
    </div>
    <div class="col-sm-4 col-xxl-4">
      <!-- Pending Orders -->
      <div data-bs-toggle="tooltip" data-bs-placement="left" title="Kayıtlı kullanıcı sayısı." class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
          <dt class="fs-3 fw-bold"><?= $all_count_text ?></dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Kayıtlı Kullanıcı</dd>
          </dl>
          <div class="item item-rounded-lg bg-body-light">
            <i class="fa fa-clock fs-3 text-primary"></i>
          </div>
        </div>
      </div>
      <!-- END Pending Orders -->
    </div>
    <div class="col-sm-4 col-xxl-4">
      <!-- New Customers -->
      <div data-bs-toggle="tooltip" data-bs-placement="left" title="Premium Tanımlanmayan kullanıcı sayısı." class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
          <dt class="fs-3 fw-bold" ><?= $waiting_premium ?></dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Premium Tanımlanmayanlar</dd>
          
          </dl>
          <div class="item item-rounded-lg bg-body-light">
            <i class="far fa-user-circle fs-3 text-primary"></i>
          </div>
        </div>
      </div>
           <!-- END New Customers -->
    </div>
    <div class="col-sm-16 col-xxl-16">
      <!-- Messages -->
      <div data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="left" title="
		  Kurallar
	  " class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
         <center>Duyuru</center> <br>
         <td>Allah sorgu aktif!</td>
         <td>-18 Vesika Sorgu Aktif!</td> <br>
         <td>Okul Sorgu Bakımda!</td> <br>
         <td>Ad Soyad sorgu yaparken sayfadan ayrılmayın ve il ilçe seçeneğini doldurunuz ( Arattığın isimde sadece 10 kişi yaşamıyor ülkede mantık yürütün )</td> <br>
       
         

           
      

        </div>
      </div>
    
  <!-- END Overview -->
      <!-- END New Customers -->
    </div>
    <div class="col-sm-16 col-xxl-16">
      <!-- Messages -->
      <div data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="left" title="
		  Kurallar
	  " class="block block-rounded d-flex flex-column h-100 mb-0">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
          <dl class="mb-0">
            <center>Kurallar</center>
          <td>Siteye VPN gibi uygulamalar ile giriş yapmak yasaktır.</td> <br> 
          <td>Başkasının hesabını kullanmak yasaktır</td><br> 
          <td>Hesap satışları kesinlikle yasaktır.</td><br> 
          <td>Tek cihazdan giriş yapınız! Keyiniz ban yerse sorumluluk size aittir.</td><br> 
          <td>Multi Hesap kullananlar kalıcı şekilde yasaklanır!</td> <br>

    
 <a class="fw-semibold" href="/discord" target="_blank">Discord'a Katıl</a>
    
        </div>
      </div>
    
  <!-- END Overview -->
    </div>
  </div>
  <!-- END Recent Orders -->
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>

<?php require 'inc/_global/views/footer_start.php'; ?>
<script defer>
	$(document).ready(function() {
		$(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
		$(document).bind('selectstart dragstart', function(e) {
		  e.preventDefault();
		  return false;
		});
		$(document).ready(function(){
		  $(document).bind("cut copy paste",function(e) {
			  e.preventDefault();
		  });
		});
		$('img').on('dragstart', function(event) { event.preventDefault(); });
		$('img').bind('contextmenu', function(e) { return false; }); 
		$('#logo-container').on('contextmenu', 'img', function(e){ return false; });
	}); 
</script>
<!-- Page JS Code -->


<?php require 'inc/_global/views/footer_end.php'; ?>
