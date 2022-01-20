<?php
include 'functions.php';
$pdo=pdo_connect_mysql();
$msg="";

if(isset($_GET['id'])){
    if(!empty($_POST))
    {
        $id=isset($_POST['id']) ? $_POST['id']: NULL;
        $namesurname=isset($_POST['namesurname']) ? $_POST['namesurname']: '';
        $address=isset($_POST['address'])? $_POST['address']: '';
        $phone=isset($_POST['phone'])? $_POST['phone']: '';
        $jop=isset($_POST['jop'])? $_POST['jop']: '';
        $dateofstart=isset($_POST['dateofstart'])? $_POST['dateofstart']: '';
        $salary=isset($_POST['salary'])? $_POST['salary']: '';


        $stm=$pdo->prepare('UPDATE contactinformation SET id= ?, namesurname= ?, address= ?, phone= ?, jop= ?, dateofstart= ?, salary= ? WHERE id=?');
        $stm->execute([$id,$namesurname,$address,$phone,$jop,$dateofstart,$salary,$_GET['id']]);
        $msg="
        <script>
        Swal.fire({
          icon: 'success',
          title: 'BAŞARILI!',
          text: 'GÜNCELLEME İŞLEMİ BAŞARILI!'
        });
  
        </script>";

        
    }

    $stm=$pdo->prepare('SELECT *FROM contactinformation WHERE id=?');
    $stm->execute([$_GET['id']]);
    $information=$stm->fetch(PDO::FETCH_ASSOC);

    if(!$information)
    {
        exit('SECTİGİNİZ ID NUMARASI YOK...');
    }


}
else{
    exit('ID SEÇİLMEMİŞ...');
}
?>


<?=template_header("GÜNCELLEME") ?>
<?=template_title3("PERSONEL GÜNCELLEME FORMU") ?>
<div class="update container center_div">
<form class="row g-3" style="width: 100%" action="update.php?id=<?= $information['id'] ?>" method="POST">
  <div class="col-md-6" >
    <label for="id" class="form-label">#</label>
    <input type="text" class="form-control" name="id" id="id" value="<?=  $information['id'] ?>">
  </div>
  <div class="col-md-6">
    <label for="namesurname" class="form-label">AD & SOYAD</label>
    <input type="text" class="form-control" id="namesurname" name="namesurname" value="<?=  $information['namesurname'] ?>">
  </div>
  <div class="col-md-6">
    <label for="address" class="form-label">ADRES</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Küçükbakkalköy Mah. Ataşehir/İST" value="<?=  $information['address'] ?>">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">TELEFON NO</label>
    <input type="text" class="form-control" id="phone" placeholder="XXX XXX XX XX" name="phone" value="<?=  $information['phone'] ?>">
  </div>
  <div class="col-md-6">
    <label for="jop" class="form-label">İŞ</label>
    <input type="text" class="form-control" id="jop" name="jop" value="<?=  $information['jop'] ?>">
  </div>
  <div class="col-md-4">
    <label for="dateofstart" class="form-label">İŞE GİRİŞ TARİHİ</label>
    <input type="datetime-local" class="form-control" id="dateofstart" name="dateofstart" value="<?=date('Y-m-d\TH:i',strtotime($information['dateofstart']))?>">
  </div>
  <div class="col-md-2">
    <label for="salary" class="form-label">MAAŞ</label>
    <input type="text" class="form-control" id="salary" name="salary" value="<?=  $information['salary'] ?>">

  </div>
  <div class="col-12">

  </div>
  <div class="col-12">
    <button type="submit" id="submit" value="Olustur" class="btn btn-primary">GÜNCELLE</button>
  </div>
  <?php if($msg): ?>
  <p><?=$msg ?></p>
  <?php endif; ?>
  </form>
  </div>