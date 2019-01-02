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
		

	if($page!=$val[0]){
		$page=$val[0];
		$data[$page][0]=array('page'=>$val[0],'url'=>$val[1],'tabindex'=>$val[2],'element'=>$val[3],'identifier'=>$val[4],'idValue'=>$val[5],'data'=>$val[6]);
		$i=1;
			//echo $houseId."\n";
		}
		else{
			$data[$page][$i]=array('page'=>$val[0],'url'=>$val[1],'tabindex'=>$val[2],'element'=>$val[3],'identifier'=>$val[4],'idValue'=>$val[5],'data'=>$val[6]);
			
			$i++;
		}
		
	}
	//echo json_encode($data);die;
	//print_r($data['login'][0]['url']);die;	
foreach($data as $page){
	setform($page);
		
}
function setform($i){
	
		global $driver;
		sleep(3);
		try{
			$url=$driver->getCurrentURL();
			waitLoader();
			$passedUrl=$i[0]['url'];
			if($driver->getCurrentURL()!=$i[0]['url'] && $i[0]['url'] != ""){
				$driver->get($i[0]['url']);
				waitLoader();
				echo "The current page is '" .$i[0]['page']. "'\n";
				if($i[0]['page']=='delivery'){
					
						sleep(20);
					
				}
			}
			
			sleep(2);
			
				$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
				
				
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
		foreach($i as $j){
			sleep(2);
			
			($j['element']== 'wait') ?  wait($j['identifier'],$j['idValue']) : " ";
			($j['element']== 'input') ?  input($j['identifier'],$j['idValue'],$j['data']) : " ";
			($j['element']== 'button') ?  button($j['identifier'],$j['idValue']) : " ";
			($j['element']== 'href') ?  href($j['identifier'],$j['idValue']) : " ";
			($j['element']== 'js') ?  js($j['identifier'],$j['idValue']) : " ";
			($j['element']== 'inputjs') ?  inputjs($j['idValue'],$j['data']) : " ";
			($j['element']== 'selectjs') ?  selectjs($j['idValue'],$j['data']) : " ";
			($j['element']== 'checkstatus') ?  checkstatus($url,$passedUrl) : " ";
			($j['element']== 'waitloader') ?  waitLoader() : " ";
			($j['element']== 'getmail') ?  getmail() : " ";
		}
		sleep(2);
	
	}		

?>