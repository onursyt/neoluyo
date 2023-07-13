<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<?php 
if (isset($_SESSION["username"])){
  header("Location: dashboard.jsp");
}else
	$notify = "";
	if (isset($_GET["ref"]) && strlen($_GET["ref"]) == 6){
		$stmt = $conn->prepare(sprintf("SELECT premium FROM users WHERE referrerKey = ?"));
		$stmt->bind_param('s', $_GET["ref"]);
		$stmt->execute();
		$result = $stmt->get_result();
		$rows = $result->num_rows;
		$us = $result->fetch_assoc();
		if ($rows == 0){
			$notify .= "$(document).ready(function(){One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Geçersiz referans no!'});});";
			$rfr = "";
			$rfr_dis = "enabled";
		} else if ($rows == 1 && $us["premium"] > time()){
			$rfr = $_GET["ref"];
			$rfr_dis = "disabled";
		} else if ($rows == 1 && $us["premium"] < time()){
			$rfr = "";
			$rfr_dis = "enabled";
			$notify .= "$(document).ready(function(){One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Girilen referans numarası artık geçerli değildir.'});});";
		}
	}
	if (isset($_POST)){
		if (isset($_POST['h-captcha-response'])){
			if (isset($_POST["signup-username"], $_POST["signup-referrer"], $_POST["signup-password"], $_POST["signup-password-confirm"])){
				$data = array(
					'secret' => "0x1139feEA1614DE61B5495ce8624413c58E345b27",
					'response' => $_POST['h-captcha-response']
				);
				$verify = curl_init();
				curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
				curl_setopt($verify, CURLOPT_POST, true);
				curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($verify);
				 var_dump($response);
				$responseData = json_decode($response);
				
				if($responseData->success) {
					$t = time();
					$referrer = mysqli_real_escape_string($conn, $_POST["signup-referrer"]);
					$username = mysqli_real_escape_string($conn, $_POST["signup-username"]);
					$stmt = $conn->prepare(sprintf("SELECT premium FROM users WHERE referrerKey = ?"));
					$stmt->bind_param('s', $referrer);
					$stmt->execute();
					$result = $stmt->get_result();
					$rows = $result->num_rows;
					$us = $result->fetch_assoc();
					if ($rows == 0){
						$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Geçersiz referans no!'});";
					}else if ($us["premium"] < time()){
						$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Girilen referans numarası artık geçerli değildir.'});";
					}else{
						$username = mysqli_real_escape_string($conn, $_POST["signup-username"]);
						$stmt = $conn->prepare(sprintf("SELECT username FROM users WHERE username = ?"));
						$stmt->bind_param('s', $username);
						$stmt->execute();
						$result = $stmt->get_result();
						$rows = $result->num_rows;
						if ($rows >= 1){
							$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Bu kullanıcı adı zaten kullanılıyor.'});";
						}else{
							$password = mysqli_real_escape_string($conn, $_POST["signup-password"]);
							$password_1 = sha1(mysqli_real_escape_string($conn, "AOREFGİSmkneoolsakİiİİİ".$_POST["signup-password"]));
							$password_2 = sha1(mysqli_real_escape_string($conn, "AOREFGİSmkneoolsakİiİİİ".$_POST["signup-password-confirm"]));
							$ref_key =  bin2hex(random_bytes(3));
							$tkn =  sha1(bin2hex(random_bytes(24)));
							
							if ($password_1 == $password_2){
								if (strlen($username) >= 4 || strlen($password) >= 8){
									$date = time();
									$queryLimit = 30;
									$sessionExpire = 1500;
									
									$ua = $_SERVER['HTTP_USER_AGENT'];
									$stmt = $conn->prepare("INSERT INTO users (username, password, userReferrer, referrerKey, token, queryLimit, sessionExpire) VALUES (?, ?, ?, ?, ?, ?, ?)");
									$stmt->bind_param("sssssss", $username, $password_1, $referrer, $ref_key, $tkn, $queryLimit, $sessionExpire);
									$stmt->execute();
									header("Location: giris.jsp");
								}else{
									$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Kısa karakter tespit edildi lütfen istenilen karakter sayısında kullanıcı adı ve şifre girin!'});";
								}
							}else{
								$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Kullanmaya çalıştığınız parolalar eşleşmiyor!'});";
							}
						}
					}
				} 
				else {
				   $notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Robot doğrulaması başarısız, Lütfen tekrar deneyiniz. Sorun olduğunu düşünüyorsan site yöneticisi ile iletişime geçin.'});";
				}
			}else{
				$notify .= "One.helpers('jq-notify', {type: 'warning', icon: 'fa-solid fa-triangle-exclamation me-1', message: 'Tüm alanları doldurman gerekiyor!'});";
			}
		}
	}
?>
<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
  <div class="content">
    <div class="row justify-content-center push">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <!-- Sign Up Block -->
        <div class="block block-rounded mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">Tavsancik Hesap Oluşturma</h3>
            <div class="block-options">
              <a class="btn-block-option" href="giris.jsp" data-bs-toggle="tooltip" data-bs-placement="left" title="Giriş Yap">
                <i class="fa fa-sign-in-alt"></i>
              </a>
            </div>
          </div>
          <div class="block-content">
            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
		    <img id="logo-container" class="h2 mb-1" src="<?php echo $one->assets_folder; ?>/media/photos/arkasiolmayanbanner.png" alt="Login Logo" style="width: 280px;">
               
              <form class="js-validation-signup" method="POST">
                <div class="py-3">
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt" id="signup-username" name="signup-username" placeholder="Kullanıcı Adınızı Giriniz."data-bs-toggle="tooltip" data-bs-placement="left" title="Discord kullanıcı adını gir.">
                  </div>
                  <div class="mb-4">
                    <input type="text" <?= $rfr_dis ?> class="form-control form-control-lg form-control-alt" id="signup-referrer" name="signup-referrer" placeholder="Referans Nosunu Giriniz." data-bs-toggle="tooltip" data-bs-placement="left" title="Yöneticinin size verdiği referans numarası." value="<?= $rfr ?>">
                  </div>
                  <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="signup-password" placeholder="İleride parola değişemezsiniz, lütfen unutmayacağın bir parola gir.">
                  </div>
                  <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="signup-password-confirm" placeholder="Lütfen Tekrar Parola Giriniz.">
                  </div>
                  <div class="mb-4">
                    <div class="h-captcha" id="h-captcha" data-theme="dark" data-size="normal" data-sitekey="3ba61b7f-cfd8-49d2-a093-3914f27b0fb9" data-bs-toggle="tooltip" data-bs-placement="left" title="Robot doğrulaması zorunludur!"></div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-7 col-xl-8">
                    <button data-bs-toggle="tooltip" data-bs-placement="left" title="Hesabınız oluşturulduktan sonra manuel onay sürecine girecektir. Ortalama onay süresi 1 gündür. Yöneticiler hesabınızı onaylayana kadar sabırla bekleyin." type="submit" class="btn w-100 btn-alt-success">
                      <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Kayıt İşlemini Tamamla
                    </button>
                  </div>
                </div>
              </form>
              <!-- END Sign Up Form -->
            </div>
          </div>
        </div>
        <!-- END Sign Up Block -->
      </div>
    </div>
    <div class="fs-sm text-muted text-center">
      <strong><?php echo "Tavsancik" . ' ' . $one->version; ?></strong> &copy; <span data-toggle="year-copy"></span>
    </div>
  </div>
</div>

<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- jQuery (required for jQuery Validation plugin) -->
<?php $one->get_js('js/lib/jquery.min.js'); ?>

<!-- Page JS Plugins -->
<?php $one->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $one->get_js('js/pages/op_auth_signup.min.js'); ?>

<script src='https://www.hCaptcha.com/1/api.js' async defer></script>
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

<?php require 'inc/_global/views/footer_end.php'; ?>