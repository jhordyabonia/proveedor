<?php
class ExcelNew
{
	function read_file($filename)
	{
		require_once 'Classes/PHPExcel.php';
		$objPHPExcel = PHPExcel_IOFactory::load(APPPATH.'../uploads/inventarios/'.$filename);
		$out=array();	
		$data=NULL;
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
		{
			$worksheetTitle     = $worksheet->getTitle();
			$highestRow         = $worksheet->getHighestRow(); // e.g. 10
			$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			$nrColumns = ord($highestColumn) - 64;
			$data->titlesheet=$worksheetTitle;
			$data->number_columns=0;
			$data->number_rows=0;
			for ($row = 4; $row <= $highestRow; ++ $row)
			 {
				for ($col = 1; $col < $highestColumnIndex; ++ $col)
				 {
					$cell = $worksheet->getCellByColumnAndRow($col, $row);
					$val = $cell->getValue();
					$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
					$data->values[$row-4][$col-1]=$val;
					$data->type[$row-4][$col-1]=$dataType ;
					if($row==0)
				 	{	$data->number_columns++;	}
				 }
				 $data->number_rows++;
			 }
			$out[]=$data;
			unset($data);
		}
		return $out;
	}
}