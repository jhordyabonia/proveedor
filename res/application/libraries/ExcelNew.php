<?php
class ExcelNew
{
	function read_file($filename)
	{
		require_once 'Classes/PHPExcel.php';
		$objPHPExcel = PHPExcel_IOFactory::load(APPPATH.'../uploads/inventarios/'.$filename);
		$data;	
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
			for ($row = 1; $row <= $highestRow; ++ $row)
			 {
				for ($col = 0; $col < $highestColumnIndex; ++ $col)
				 {
					$cell = $worksheet->getCellByColumnAndRow($col, $row);
					$val = $cell->getValue();
					$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
					$data->values[$col][$row]=$val;
					$data->type[$col][$row]=$dataType ;
					if($row==0)
				 	{	$data->number_columns++;	}
				 }
				 $data->number_rows++;
			 }
		}
		return $data;
	}
}