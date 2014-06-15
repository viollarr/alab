<?php // no direct access

defined('_JEXEC') or die('Restricted access'); 

?>

<?php foreach ($list as $item) :  ?>

        <div class="txt_categorias"><?php echo $item->categoria; ?></div>

        <div class="txt_titulo_noticias"><a href="<?php echo $item->link; ?>"><?php if ($item->categoria=="Destaque"){ echo "<b>".$item->text."</b>";}else{echo $item->text;} ?></a></div>   

        <div class="txt">

	    <?php

				$comhtmltag = array("<div>","<p>", "</p>", "<b>", "</b>","&lt;p&gt;","&lt;/p&gt;");
				$semhtmltag = array("", "", "", "", "","","");

		if ($item->categoria!="Destaques"){


				if (!empty($item->intro)) {

					$texto =  limita_caracteres($item->intro, $params->get('introlength'), false);
					//$texto = str_replace($comhtmltag, $semhtmltag, $texto);
					//print strip_tags($texto);
					$texto = htmlspecialchars_decode($texto);
					print $texto;

				} else {

					$texto =substr($item->full, 0, $params->get('introlength'));
					//$texto = str_replace($comhtmltag, $semhtmltag, $texto);
					//print strip_tags($texto);
					$texto = htmlspecialchars_decode($texto);
					print $texto;
					
					//$texto = str_replace($comhtmltag, $semhtmltag, $texto);
					//print strip_tags($texto);

				}

		?>

        <br />

        <img src="templates/alab_template/images/bullet.gif" width="9" height="9" /><span class="txt"> <a href="<?php echo $item->link; ?>">Leia mais</a></span>

        <?php

		}		

		?>

    </div>

	<?php 

	if ($item->categoria=="Destaques"){

		preg_match('/<img(.*?)\/>/i', htmlspecialchars_decode($item->intro), $span_img);

		if ($span_img[1]!=""){

		

			/*if (!empty($item->intro)) {

					//echo substr($item->intro, 0, $params->get('introlength'));

					echo limita_caracteres(htmlspecialchars_decode($item->intro), $params->get('introlength'), false);

				} else {

					echo substr($item->full, 0, $params->get('introlength'));

			}*/

	?>

	    <img src="templates/alab_template/images/bullet.gif" width="9" height="9" /><span class="txt"> <a href="<?php echo $item->link; ?>">Leia mais</a></span>                        

        <br /><br />

        <div class="img_principal"><a href="<?php echo $item->link; ?>"><img <?php echo $span_img[1];?> width="340" /></a></div>

		

	<?php

		}else{ //não tem imagem

		?>

        <br />

		<span class="txt">

		<?php	

            $texto = limita_caracteres($item->intro, 600, false);
			//$texto = str_replace($comhtmltag, $semhtmltag, $texto);
			
			$texto = htmlspecialchars_decode($texto);
			
			print $texto;

		?>

        </span>

        <br />

		<img src="templates/alab_template/images/bullet.gif" width="9" height="9" /><span class="txt"> <a href="<?php echo $item->link; ?>">Leia mais</a></span>                        

	<?php

		}// if span_img

	}//categoria destaque	

	?>

<br />

<?php

endforeach; 

?>

