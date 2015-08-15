<?php

/**
 * Description of publicar_oferta2
 *
 * @author Karlox Martinez
 */
class Herramientas extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('new/Tipo_empresa_model', "tipo_empresa");
		$this->load->model('new/Dimension_model', "dimension");
		$this->load->model('new/Categoria_model', "categoria");
		$this->load->model('new/Subcategoria_model', "subcategoria");
		$this->load->model('new/Departamento_model', "departamento");
		$this->load->model('new/Municipio_model', "municipio");
		$this->load->model('u_model', "u");
	}
	/*
	public function tipo_empresa($selected=FALSE) 
	{
		$data_tmp=$this->tipo_empresa->get_all();
		asort($array);
		reset($array);
		echo '<option value="">Tipo de Empresa</option>';
		foreach ($data_tmp as $empresa):
			if ($selected==$empresa->id_tipoempresa) {
				echo '<option value="' . $empresa->id_tipoempresa . '" selected>' . $empresa->tipo . '</option>';
			}else{
				echo '<option value="' . $empresa->id_tipoempresa . '">' . $empresa->tipo . '</option>';
			}
		endforeach;
	}
	*/
	public function tipo_empresa($selected=FALSE)
	{
		foreach ($data_tmp as $key => $value)
		{
			$data['datos'][$key]->id=$value->id_tipoempresa;
			$data['datos'][$key]->nombre=$value->tipo;
		}
		$data['selected']=$selected;
		$data['nombre']="tipo_empresa";
		$this->load->view('herramientas/select', $data, FALSE);
	} 

	public function subcategorias($categoria=FALSE) {
		$options = "";
		if ($categoria) 
		{
			$subcategoria = $this->subcategoria->get_all(array('id_categoria'=>$categoria));
			foreach ($subcategoria as $fila) {
				?>
				<div style="text-align: left; cursor: pointer;" title="<?= $fila->nom_subcategoria ?>">
					 (<?= $fila->id_subcategoria ?>)
					 <?= $fila->nom_subcategoria ?>
				</div>
				<?php
			}
		}
	}

	public function categorias() 
	{		
		$categorias = $this->categoria->get_all();
		$data;
		foreach ($categorias as $key => $value)
		{
			$data['datos'][$key]->id=$value->id_categoria;
			$data['datos'][$key]->nombre=$value->nombre_categoria;
		}
		$data['nombre']="categoria";
		$this->load->view('herramientas/select', $data, FALSE);
		$this->load->view('herramientas/funcionalidades');	
	}
	public function departamentos() 
	{		
		$departamentos = $this->departamento->get_all();
		$data;
		foreach ($departamentos as $key => $value)
		{
			$data['datos'][$key]->id=$value->id_departamento;
			$data['datos'][$key]->nombre=$value->nombre;
		}
		$data['nombre']="departamento";
		$this->load->view('herramientas/select', $data, FALSE);
		$this->load->view('herramientas/funcionalidades');	
	}
	public function municipios($departamento=FALSE) 
	{		
		if(!$departamento)
		{	$departamento=$this->input->post('departamento');	}
		$municipios = $this->municipio->get_all(array('id_departamento'=>$departamento));
		$data;
		foreach ($municipios as $key => $value)
		{
			$data['datos'][$key]->id=$value->id_municipio;
			$data['datos'][$key]->nombre=$value->municipio;
		}
		$data['nombre']="municipio";
		$this->load->view('herramientas/select', $data, FALSE);
	}

	public function unidad_medida($cantidad = 1,$selected = NULL) {
		$dimensiones = $this->dimension->get_all();
		$dim = NULL;
		foreach ($dimensiones as $dimension) {
			if ($dimension->magnitud=="cantidad") {
				if ($dim != $dimension->magnitud) {
					echo "</optgroup>";
					echo "<optgroup label=".ucwords($dimension->magnitud).">";
					$dim = $dimension->magnitud;
				}
				if ($cantidad == 1) {
					if ($dimension->simbolo) {
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->nombre ." (".$dimension->simbolo.") </OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->nombre ." (".$dimension->simbolo.") </OPTION>";
						}
					}else{
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->nombre. "</OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->nombre . "</OPTION>";
						}
					}
				} else {
					if ($dimension->simbolo) {
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->prural . " (".$dimension->simbolo.") </OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->prural . " (".$dimension->simbolo.") </OPTION>";
						}
					}else{
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->prural. "</OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->prural . "</OPTION>";
						}
					}
				}
			}
		}
		foreach ($dimensiones as $dimension) {
			if ($dimension->magnitud!=="cantidad") {
				if ($dim != $dimension->magnitud) {
					echo "</optgroup>";
					echo "<optgroup label=".ucwords($dimension->magnitud).">";
					$dim = $dimension->magnitud;
				}
				if ($cantidad == 1) {
					if ($dimension->simbolo) {
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->nombre ." (".$dimension->simbolo.") </OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->nombre ." (".$dimension->simbolo.") </OPTION>";
						}
					}else{
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->nombre . "</OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->nombre . "</OPTION>";
						}
					}
				} else {
					if ($dimension->simbolo) {
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension . " selected>" . $dimension->prural . " (".$dimension->simbolo.") </OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->prural . " (".$dimension->simbolo.") </OPTION>";
						}
					}else{
						if($dimension->id_dimension==$selected){
							echo "<OPTION VALUE=" . $dimension->id_dimension. " selected>" . $dimension->prural . "</OPTION>";
						}else{
							echo "<OPTION VALUE=" . $dimension->id_dimension . ">" . $dimension->prural . "</OPTION>";
						}
					}
				}
			}
		}

	}

}
?>