<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_shop");
$output = '';
if(isset($_POST["export"]))
{
  $reader = new PHPExcel_Reader_Excel2007();
$excel = $reader->load($_FILES['plik']['tmp_name']);
$data = [];
foreach ($excel->getActiveSheet()->getRowIterator() as $row) {
if ($excel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible()) {
   $data[] = $excel->getActiveSheet()->rangeToArray('A' .$row->getRowIndex().':'.'BB'.$row->getRowIndex());
   }
}
 $query = "SELECT * FROM tbl_order ORDER BY date DESC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Quantity</th>  
                        
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["productName"].'</td>  
                         <td>'.$row["quantity"].'</td>  
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
