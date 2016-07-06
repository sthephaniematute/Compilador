<?php
	
	//Función que toma un código y devuelve sin observaciones o espacios o líneas en blanco
	function verificaComentario($codigo){
		$contCS=0; 
		$comentario=0;
		$noLines = array();
		//Quitar los espacios, tabulaciones y entre otra cadena
		foreach($codigo as $cS){
			//recortar los caracteres de control ASCII al comienzo de $binario 
			//(from 0 to 31 inclusive)
			$clean = $cS;
			//$clean = ltrim($cS, "\x00..\x1F"); //String limpia los espacios
			$cleanAux = ''; //String Auxiliar
			$cleanArray = str_split($clean); //Array da String Limpio
			$tamCA=0;
			
			foreach($cleanArray as $cA){
												
				$tamCA++; //tamaño
	
			}
			
			//Navega la matriz en busca de comentarios, guardar el código indocumentado en serie auxiliar
			$i=0;
			while($i<$tamCA){
				if($i<$tamCA-2){
					$conq = $cleanArray[$i].$cleanArray[$i+1].$cleanArray[$i+2];
				}
				if($cleanArray[$i]=='#'){
					break;
				}
				
				if(($conq =='"""' || $conq =="'''") && $comentario ==1){
					$comentario =0;
					break;
				}
				if(($conq =='"""' || $conq =="'''")  && $comentario ==0){
					$comentario =1;
				}
				if($comentario==0){
					$cleanAux = $cleanAux. $cleanArray[$i];
				}
				$i++;
			}
			$contCS++; 								
			$noLines[] = $cleanAux;
		}
		$auxNoLines = array();
		foreach($noLines as $cS){
			if($cS != "" && $cS != " " && $cS != "\n" && $cS != "\t" && $cS != "    " ){
				$auxNoLines[] = $cS;
			}
		}
		$cont2=0;
		
		foreach($auxNoLines as $cS){
			echo $cont2.':'. $cS .'<br>';
			$cont2++;
		}
		
		return $auxNoLines;
	}



?>
