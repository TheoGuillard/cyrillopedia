<?php
header("Content-type: text/html; charset=utf-8"); // UTF 8
include('_functions.php');
include('fonts_list.php');

$nombre = $_GET['nombre'];
$glifo = $signo[$nombre];
$char = uni($glifo['char']);
$fonts = array_merge($fuentes2, $fuentes);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="author" content="Deva">
	<title>[ Cyrill-o-pedia ]</title>
	<link type="text/css" href="css/estilos.css" rel="stylesheet" charset="utf-8">
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="./js/ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
	<script src="./js/url.min.js"></script>
	<script>localStorage.clear();</script>
	<script src="./js/main.js"></script>
	<script src="./js/fontdrag.js"></script>

	<script type="text/javascript">
	function setfont() {
		
		var e = document.getElementById("preview_font2");
		var myfont = e.options[e.selectedIndex].value;
		
		var text_sample = document.querySelector('#glyphlist');
		text_sample.setAttribute("style","font-family: " + myfont);
	    
	}
	</script>
<style type="text/css">
@font-face {
        font-family: 'Arsenal-Italic';
        src: url('fonts/Arsenal-Italic.otf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'Arsenal-Regular';
        src: url('fonts/Arsenal-Regular.otf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'Brill Italic';
        src: url('fonts/Brill Italic.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'Brill Roman';
        src: url('fonts/Brill Roman.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'GentiumPlusCyrE-I';
        src: url('fonts/GentiumPlusCyrE-I.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'GentiumPlusCyrE-R';
        src: url('fonts/GentiumPlusCyrE-R.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'NotoSans-Italic';
        src: url('fonts/NotoSans-Italic.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'NotoSans-Regular';
        src: url('fonts/NotoSans-Regular.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'NotoSerif-Italic';
        src: url('fonts/NotoSerif-Italic.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'NotoSerif-Regular';
        src: url('fonts/NotoSerif-Regular.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'PT-Sans';
        src: url('fonts/PT-Sans.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'PT-Serif';
        src: url('fonts/PT-Serif.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'SourceCodePro-Black';
        src: url('fonts/SourceCodePro-Black.ttf');
        font-weight: normal;
        font-style: normal;
    }
@font-face {
        font-family: 'SourceCodePro-Regular';
        src: url('fonts/SourceCodePro-Regular.ttf');
        font-weight: normal;
        font-style: normal;
    }
</style>	
</head>

<body class="signos">

	<div class="header">
		<h2>[ cyrill-o-pedia ]</h2>
<section id="top">
	<header><h2>>> Drag fonts here!</h2></header>
	<ul id="fonts"></ul>
</section>

<ul id="navigation">
    <li><a href="index.php#basic">Basic</a></li>
    <li><a href="index.php#adobe">Adobe Extended</a></li>
    <li><a href="index.php#ext">Extended</a></li>
    <li><a href="index.php#gf-cyrillic-plus">GF Cyrillic Plus</a></li>
    <li><a href="index.php#gf-cyrillic-pro">GF Cyrillic Pro</a></li>
    <li><a href="index.php#gf-cyrillic-historical">GF Cyrillic Historical</a></li>
    <br />
    <li>Unicode:</li>
    <li><a href="index.php#unicyr">Cyrillic<sup>0400-04FF</sup></a></li>
    <li><a href="index.php#sup">Supplement<sup>0500-052F</sup></a></li>
    <li><a href="index.php#ext-a">Extended-A<sup>2DE0-2DFF</sup></a></li>
    <li><a href="index.php#ext-b">Extended-B<sup>A640-A69F</sup></a></li>
    <li><a href="index.php#ext-c">Extended-C<sup>1C80-1C8F</sup></a></li>
</ul>
 
	<select id="preview_font2" onchange="setfont();">
	<? 
		foreach ($fonts as $fuente) {
			$nombre_fuente=substr($fuente, 0, -4);
			echo '<option value="' . $nombre_fuente.', UnicodeBMPFallback;">'.$nombre_fuente.'</option>';
		}
	?>
	</select>

	<div id="sliderc"></div>
	<input type="text" id="font_size_c" style="border:0; color:#FFF;" value="80px">

	</div>
	<section id="custom">
	<div id="glyphlist">
	
<?
	//include('page.php');

foreach ($signo as $glifo) {
	$urlname = $glifo['nombre'];
	$urlname_enc = urlencode( $urlname );
	$urlname_new = str_replace('+','%20', $urlname_enc );
	$enc = $_GET['enc'];
	$url = "glyph.php?nombre=";
	$url .= "$urlname_new";
	$url .= "&enc=";
	$url .= "$enc";

	if ( $glifo['char'] != 'None' ) {
	echo '<a href="'.$url.'" ><span class="char">'.uni($glifo['char']).'</span><span class="nombre">'.$glifo['nombre'].'</span><span class="unicode">'.$glifo['char'].'</span></a>'."\n";
	}
};
?>

	</div>
	</section>
<p class="cf">&nbsp;</p>
<footer>
<p>Reference on Cyrillic glyphs for designers. DISCLAIMER: Information is provided for practical design purposes only. Service is provided 'as is'. All fonts provided are open-source.</p>

<p>Cyrill-o-pedia (v0.2) is a localisation fork of <a href="http://devanaguide.huertatipografica.com/">Devanaguide</a> by Andrés Torresi at <a href="http://www.huertatipografica.com/en">Huerta Tipográfica (andres@huertatipografica.com)</a>. Designed and coded by Alexei Vanyashin. View on <a href="https://github.com/alexeiva/cyrillopedia">Github</a>.</p>

</footer>
<script type="text/javascript">
	function setfont() {
		
		var e = document.getElementById("preview_font2");
		var myfont = e.options[e.selectedIndex].value;
		
		var texto_ejemplo = document.querySelector('#glyphlist');
		texto_ejemplo.setAttribute("style","font-family: " + myfont);
	    
	}
	</script>
</body>
</html>

