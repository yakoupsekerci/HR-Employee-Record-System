<?php  

$connect = mysqli_connect("localhost", "root", "", "employee");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM contactinformation";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>#</th>
                    <th>AD & SOYAD</th>
                    <th>ADRES</th>
                    <th>TELEFON NO</th>
                    <th>İŞ</th>
                    <th>BAŞLANGIÇ TARİHİ</th>
                    <th>MAAŞ</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td>'.$row["id"].'</td>  
                        <td>'.$row["namesurname"].'</td>  
                        <td>'.$row["address"].'</td>
                        <td>'.$row["phone"].'</td>  
                        <td>'.$row["jop"].'</td>  
                        <td>'.$row["dateofstart"].'</td>
                        <td>'.$row["salary"].'</td>
                        
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls' );
  header('Content-Disposition: attachment; filename=personellist.xls');
  echo $output;
 }
}
?>