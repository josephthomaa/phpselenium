
<?php
$output ='';
 $output .='
<table>
<tr>
<td>Sr.No</td>
<td>Question</td>
<td>Option A</td>
<td>Option B</td>
<td>Option C</td>
<td>Option D</td>
<td>True Answer</td>
<td>Unit No</td>
</tr>
';

$rowCount1 = 2;
$count1=0;
 $count2=0;


 
 $output .='

<tr>
<td>1/td>
<td>qewq/td>
<td>asd</td>
<td>v</td>
<td>b</td>
<td>g</td>
<td>j</td>
<td>jj</td>
</tr>

';
     
  






$output .='</table>';
header("Content-Type: application/xls");
$file_name = "newexcel_".date("d-m-Y").".xls";

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=$file_name");
header("Cache-Control: max-age=0");
echo $output;
/*excel*/

/*over*/


?>