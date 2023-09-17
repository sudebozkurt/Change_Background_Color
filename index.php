<?php
    try{
        $databasebaglantisi = new PDO("mysql:host=localhost;dbname=project1;charset=UTF8", "root", "");
    } catch(PDOException $hata){
        echo $hata -> getMessage();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="30" bgcolor="#FF5733">
            <td align="left" style="color:white;">&nbsp;Ürün Adı</td>
            <td align="right" style="color:white;">Ürün Fiyatı&nbsp;</td>
        </tr>
        <?php
        $sorgu = $databasebaglantisi -> prepare("SELECT * FROM urunler");
        $sorgu -> execute();
        $sorguSayisi = $sorgu -> rowCount();
        $sorguKayitlari = $sorgu -> fetchAll(PDO::FETCH_ASSOC);

        $birinciRenk = "#dfdfdf";
        $ikinciRenk = "#FFFFFF";
        $renkIcinSayi = 0; 
        
        foreach($sorguKayitlari as $satirlar) {
            if($renkIcinSayi % 2){
                $arkaPlanRengi = $birinciRenk; }

            else{
                $arkaPlanRengi = $ikinciRenk;
            }
        ?>
        <tr height="30" bgcolor="<?php echo $arkaPlanRengi;?>" onmouseover="this.bgColor='#C2CEDB';" onmouseout="this.bgColor='<?php echo $arkaPlanRengi;?>'" style="cursor: pointer;">
            <td align="left">&nbsp; <?php echo $satirlar["urunAdi"]; ?> </td>
            <td align="right">&nbsp; <?php echo $satirlar["urunFiyati"]; ?></td>
        </tr>

        <?php $renkIcinSayi++; } ?>


    </table>
    
</body>
</html>