<?php
    include 'functions.php';

    $pdo=pdo_connect_mysql();

    $stmt=$pdo->prepare('SELECT * FROM contactinformation');
    $stmt->execute();
    $contactinformation=$stmt->FetchAll(PDO::FETCH_ASSOC);
    


?>
<?=template_header('LİSTE')?>
<?=template_title1('Personel Listesi')?>
<div class="container-1">
    <div>
        <a href="create.php" class="btn btn-primary indir" role="button" aria-pressed="true"><i class="fas fa-user-plus"></i>  PERSONEL EKLE</a>
    </div>
    <div>
        <form action="import.php" method="POST">
        <input type="submit" class="btn btn-primary indir" name="export" value="EXCEL İNDİR">
        </form>
    </div>
</div>
<div class="cont_Table">
        <table class="table-general">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">AD & SOYAD</th>
                    <th scope="col">ADRES</th>
                    <th scope="col">TELEFON NO</th>
                    <th scope="col">İŞ</th>
                    <th scope="col">BAŞLANGIÇ TARİHİ</th>
                    <th scope="col">MAAŞ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($contactinformation as $information): ?>

                <tr>
                    <td data-label="#"><?=$information['id']?></td>
                    <td data-label="AD & SOYAD"><?=$information['namesurname']?></td>
                    <td data-label="ADRES"><?=$information['address']?></td>
                    <td data-label="TELEFON NO"><?=$information['phone']?></td>
                    <td data-label="İŞ"><?=$information['jop']?></td>
                    <td data-label="BAŞLANGIÇ TARİHİ"><?=$information['dateofstart']?></td>
                    <td data-label="MAAŞ"><?=$information['salary']?></td>
                    <td>
                      <div class=buttons_table>
                        <button class="btn_TblUpdate"><a href="update.php?id=<?=$information['id']?>" name="archive"><i class="fas fa-pen-alt"></i></a></button>
                        <button class="btn_TblDelete"><a href="delete.php?id=<?=$information['id']?>"><i class="fas fa-trash-alt"></i></a></button>
                        
                        <!-- <button class="btn_TblDelete delete" id='del_<?= $information['id'] ?>' data-id='<?= $information['id']?>'><i class="fas fa-trash-alt"></i></button> -->
                      </div>
                    </td>
                </tr>
                <?php
                endforeach
                ?>
            </tbody>
        </table>
</div>


