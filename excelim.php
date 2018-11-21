<?php
	require_once  ('PHPExcel/Classes/PHPExcel.php');
	require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
	$path="test.xls";
	$objPHPExcel = PHPExcel_IOFactory::load($path);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 65;
  
   
	}
	
	$page="";
	$data=array();
	for ($row = 2; $row <= $highestRow; ++ $row) {
		$val=array();
		for ($col = 0; $col < $highestColumnIndex; ++ $col) {
		   $cell = $worksheet->getCellByColumnAndRow($col, $row);
		   $val[] = $cell->getValue();
		}
		
		echo "\n";
		if($page!=$val[0]){
			$page=$val[0];
			$data[$page][0]=array('tabindex'=>$val[1],'element'=>$val[2],'identifier'=>$val[2],'idValue'=>$val[4],'data'=>$val[5]);
			
			//$houseId=(isset($val[0])) ? $val[0] : "";
			//$houseAdd=(isset($val[2])) ? $val[2] : "";
			//$indivId=(isset($val[3])) ? $val[3] : "";
			//$indivNam=(isset($val[4])) ? $val[4] : "";
			$i=1;
			//echo $houseId."\n";
		}
		else{
			$data[$page][$i]=array('tabindex'=>$val[1],'element'=>$val[2],'identifier'=>$val[2],'idValue'=>$val[4],'data'=>$val[5]);
			
			$i++;
		}
		//echo json_encode($data);
	}
	echo count($data);
?>