<?php
    include 'functions.php';
    $pdo=pdo_connect_mysql();
    $msg ="";


    if(!empty($_POST)){
      $id=isset($_POST['id']) && !empty($_POST['id'])!='auto' ? $_POST['id']: NULL;
      $namesurname=isset($_POST['namesurname']) ? $_POST['namesurname']: '';
      $address=isset($_POST['address'])? $_POST['address']: '';
      $phone=isset($_POST['phone'])? $_POST['phone']: '';
      $jop=isset($_POST['jop'])? $_POST['jop']: '';
      $dateofstart=isset($_POST['dateofstart'])? $_POST['dateofstart']: '';
      $salary=isset($_POST['salary'])? $_POST['salary']: '';

      $stm=$pdo->prepare('INSERT INTO contactinformation VALUES(?,?,?,?,?,?,?)');
      $stm->execute([$id,$namesurname,$address,$phone,$jop,$dateofstart,$salary]);
      $msg="
      <script>
      Swal.fire({
        icon: 'success',
        title: 'BAŞARILI!',
        text: 'KAYIT İŞLEMİ BAŞARILI!'
      });

      </script>";
    }
?>

<?=template_header('PERSONEL EKLE') ?>
<?=template_title2('Personel Ekle') ?>
<div class="container center_div">
<form class="row g-3"style="width: 100%" action="" method="POST">
  <div class="col-md-6" >
    <label for="id" class="form-label">#</label>
    <input type="text" class="form-control" value="OTOMATİK" name="id" id="id">
  </div>
  <div class="col-md-6">
    <label for="namesurname" class="form-label">AD & SOYAD</label>
    <input type="text" class="form-control" id="namesurname" name="namesurname">
  </div>
  <div class="col-md-6">
    <label for="address" class="form-label">ADRES</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Küçükbakkalköy Mah. Ataşehir/İST">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">TELEFON NO</label>
    <input type="text" class="form-control" id="phone" placeholder="XXX XXX XX XX" name="phone">
  </div>
  <div class="col-md-6">
    <label for="jop" class="form-label">İŞ</label>
    <input type="text" class="form-control" id="jop" name="jop">
  </div>
  <div class="col-md-4">
    <label for="dateofstart" class="form-label">İŞE GİRİŞ TARİHİ</label>
    <input type="datetime-local" class="form-control" id="dateofstart" name="dateofstart" value="<?=date('Y-m-d\TH:i')?>">
  </div>
  <div class="col-md-2">
    <label for="salary" class="form-label">MAAŞ</label>
    <input type="text" class="form-control" id="salary" name="salary">

  </div>
  <div class="col-12">

  </div>
  <div class="col-12">
    <button type="submit" id="submit" class="btn btn-primary">KAYDET</button>
  </div>
  </form>
<?php if($msg): ?>
<p><?= $msg ?></p>
<?php endif; ?>
</div>

