<?php

include 'functions.php';
$pdo=pdo_connect_mysql();
$msg='';


if(isset($_GET['id']))
{
    $stm=$pdo->prepare('SELECT *FROM contactinformation WHERE id=?');
    $stm->execute([$_GET['id']]);
    $contact=$stm->fetch(PDO::FETCH_ASSOC);

    if(!$contact)
    {
        exit('BOYLE BİR İLETİSİM İDSİ YOK');
    }
    if(isset($_GET['confirm'])){
        if($_GET['confirm']=='yes'){
            $stmt=$pdo->prepare('DELETE FROM contactinformation WHERE id=?');
            $stmt->execute([$_GET['id']]);
            header('Location:read.php');
        }
        else{
            header('Location:read.php');
            exit;
        }
    }

}

else{
    exit('ID SEÇİLMEMİŞ');
}



?>
<style>
    .delete .yesno {
    display: flex;
    }
    .delete .yesno a {
    display: inline-block;
    text-decoration: none;
    background-color: #38b673;
    font-weight: bold;
    color: #FFFFFF;
    padding: 10px 15px;
    margin: 15px 10px 15px 0;
    }
    .delete .yesno a:hover {
    background-color: #32a367;
    }
	.content {
    width: 1000px;
    margin: 0 auto;
    }
    .content h2 {
    margin: 0;
    padding: 25px 0;
    font-size: 22px;
    border-bottom: 1px solid #ebebeb;
    color: #666666;
    }

</style>

<?=template_header('sil') ?>


<div class="content delete">
<h2>#<?=$contact['id']?></h2>
<?php if($msg): ?>
<p><?$msg?></p>
<?php else : ?>
<p>Kaydı silmek istediğinizden emin misiniz?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Evet</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">Hayır</a>
    </div>
    <?php endif; ?>
</div>


