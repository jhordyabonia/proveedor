<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crypter_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		
	}
	/*
    encriptar un numero
   Regla:
   		1:) Se convierte el numero en binario.
   		2:) Cada par de vocales mayusculas equivale a 1.
   		3:) Las consonontes  en minuncula cuya pronunciancion
   			en español no tienen el caracter e equivale a 0.
   		4:) El numeros 1 equivale 0.
   		5:) si se pasan otras letras se aborta la encripcion.
  	*/

  public function encrypt($number)
  {
	$law1 = array("AA","UU","EE","OO","II");
	$law2 = array("j","k","q","w","1");
  	$out="";
	$i=$number;
	while($i>0)
	{
	 $tmp=$i%2;
	 $n = rand(0,4);
	 if($tmp==1)
	 {	
	 	$out.=$law1[$n];
	 	$i = ($i-1)/2;
	 }
	 else
	 {		 	
	 	$out.=$law2[$n];
	 	$i = $i/2;
	 }
	}
	return $out."_".$out;	
  }
  
  public function decrypt($in)
  {
  	if(!is_string($in)) return;
  	$out=0;
  	$vocal = 0;
  	$out_array;
    $in= explode('_',$in);
    if($in[0]!=$in[1])
      { return -1;}
    $in=$in[0];
  	for ($i=0;strlen($in)>$i; $i++) 
  	{
  		if($in[$i]=="j"||
  			$in[$i]=="k"||
  			$in[$i]=="q"||
  			$in[$i]=="w"||
  			$in[$i]=="1")
  		{
  			$out_array[]=0;
  		}else
  		{
	  		if($in[$i]=="A"||
	  			$in[$i]=="U"||
	  			$in[$i]=="E"||
	  			$in[$i]=="O"||
	  			$in[$i]=="I")
	  		{
	  			if($vocal==1)
	  			{
	  				$out_array[]=1;
	  				$vocal=0;
	  			}else{ $vocal=1;}
	  		}else {  return -1;  }
  		}
  	}
  	foreach ($out_array as $key => $value)
	 {
	 	$out+=$this->expo(2,$key)*$value;
	 }
	return $out;
  }
  private function expo($a,$b)
  {
  	if(is_float($b))
  		return -1;
  	if($b==0)
  		return 1;
  	
  	$tmp=$a;
  	for($i=1;$i<$b;$i++)
  	{
  		$a*=$tmp;
  	}
  	if($b<0)
  		$a=1/$a;

  	return $a;
  }
}

/* End of file crypter_model.php */
/* Location: ./application/models/crypter_model.php */