<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';

class IMGcrud extends Controlador
{
	
	private $idtotal;
	private $idimagen;
	private $tabla;
	private $listado;
	
	public function setIdtotal($valor)
	{
		$this->idtotal = $valor;
		return $this;
	}

	
	public function getIdtotal()
	{
		return $this->idtotal;
	}
	
	
	
	public function setIdimagen($valor)
	{
		$this->idimagen = $valor;
		return $this;
	}

	
	public function getIdimagen()
	{
		return $this->idimagen;
	}
	
	
	
	public function setTabla($valor)
	{
		$this->tabla = $valor;
		return $this;
	}

	
	public function getTabla()
	{
		return $this->tabla;
	}
	
	public function listado($idtotal,$tabla)
	{ 
		
		
		$this->setIdtotal($idtotal);
		$this->setTabla($tabla);
		
		$listado = ORM::for_table('myt_imagen')
				->where(array ('idtotal'	=> $this->getIdtotal(),
								'tabla'		=> $this->getTabla() ))
				->order_by_desc('id')
				->find_many();
		
		
		$this->listado = $listado;
		return $listado;
		
	
	}
	
	public function eliminarImagen($idimagen,$patron,$dir,$root)
	{
		
		
		$imagen = ORM::for_table('myt_imagen')->find_one($idimagen);
		$imagen->nombrearchivo;
		
		$patron = explode('|',$patron);
		
		foreach($patron as $nom=>$val){
			
			$patron2 = explode(',',$patron[$nom]);
			
			foreach($patron2 as $nom2=>$val){
				$prefijo = $patron2[0]; }
			
				unlink($root.$dir.'/'.$prefijo.'/'.$prefijo.'_'.$imagen->nombrearchivo); 
			}
		
		$imagen->delete();
		
		$imagen_txt = ORM::for_table('myt_locale')
						->where_equal(array ('idtotal'	=> $idimagen,
									   'tabla'		=> 'myt_imagen'))
						->delete_many();
		

	}
	
	
	
	public function listarIdiomasFotos()
	{
		$txt_img =array();
		
		
		$n=0;
		foreach($this->listado as $nom=>$val){
		 
				$listado_txt = ORM::for_table('myt_locale')
								->where(array (	'idtotal'	=> $this->listado[$nom]['id'],
												'tabla'		=> 'myt_imagen',
												'nombrecampo'=> 'alt' ))
								->find_many();	 
		
			if(isset($listado_txt)){
				
					foreach($listado_txt as $nom2=>$val2){		
							$txt_img[$n]=array( 'alt'			=> $listado_txt[$nom2]['alt'],
												'locale'		=> $listado_txt[$nom2]['locale'],
												'nombrecampo'	=> $listado_txt[$nom2]['nombrecampo'],
												'txt'			=> $listado_txt[$nom2]['txt'],
												'id'			=> $listado_txt[$nom2]['id'],
												'idtotal'		=> $listado_txt[$nom2]['idtotal'],
												);
											$n++;
											}
						}			
		}

		return $txt_img;
	}
	
	
	public function actualizar($id,$alt)
	{
		
		$texto_imagen = ORM::for_table('myt_locale')->find_one($id);

		$texto_imagen->txt =$alt; 

		$texto_imagen->save();	
		
	}
	
	
	public function actualizarprin($id,$alt)
	{
		
		$texto_imagen = ORM::for_table('myt_imagen')->find_one($id);

		$texto_imagen->alt =$alt; 

		$texto_imagen->save();	
		
	}
	
	
	
	
	public function almacenarIMG($idtotal,$tabla,$nombre,$alt,$idiomas)
	{
		$imagen = ORM::for_table('myt_imagen')->create();

		$imagen->nombrearchivo = $nombre;
		$imagen->alt 		= $alt;
		$imagen->idtotal 	= $idtotal;
		$imagen->tabla 		= $tabla;
		
		$imagen->save();	
		$imagen->id;
		$idiomas = explode(',',$idiomas);
		foreach ($idiomas as $nom=>$val){
			if($nom!=0){	
				$txtimagen = ORM::for_table('myt_locale')->create();

				$txtimagen->nombrecampo = 'alt';
				$txtimagen->txt 		= '';
				$txtimagen->idtotal 	= $imagen->id;
				$txtimagen->tabla 		= 'myt_imagen';
				$txtimagen->locale 		= $idiomas[$nom];
				
				$txtimagen->save();	
				}
		}
		
		
	}	
	
}

?>
