<?php
$teks = "Aku ini binatang jalang. Dari kumpulannya terbuang.";
	echo ("<strong>Contoh Teks: </strong></br>");
	echo ($teks);
	
	$arraykata= explode(" ",$teks);
	
	$hasil=array();
	
	/*
	===============RULES===================
	---------------------------------------
	ejaan van ophuijsen	|		EYD
	---------------------------------------
			dj			|		j
			tj			|		c
			j			|		y
			nj			|		ny
			sj			|		sy
			ch			|		kh
			oe			|		u
		glottal stop(')	|		k
	---------------------------------------
	---------------------------------------
	*/
	
	/*
	==============EXAMPLES=================
	---------------------------------------
	ejaan van ophuijsen	|		EYD
	---------------------------------------
			djari		|		jari
			tjuji		|		cuci
			jang		|		yang
			njamuk		|		nyamuk
			sjarat		|		syarat
			achir		|		akhir
			goeroe		|		guru
			ma'moer		|		makmur
	---------------------------------------
	---------------------------------------
	*/
	
	$eyd = array("/j/","/c/","/y/","/ny/","/sy/","/kh/","/u/","/J/","/C/","/Y/","/Ny/","/Sy/","/Kh/","/U/");
	$ophuijsen = array("dj","tj","j","nj","sj","ch","oe","Dj","Tj","J","Nj","Sj","Ch","Oe");
	
	//looping
	foreach($arraykata as $kata){
		$kata = preg_replace($eyd,$ophuijsen,$kata);
		/*----mengubah huruf "k" ke glottal stop apostrophe(')----*/
		if(preg_match("/[aiueoAIUEO]k[^aiueo]/",$kata)){
			$kata = preg_replace("/k/","'",$kata);
		}
		array_push($hasil,$kata);
	}
	//akhir dari looping
	
	$hasil = implode(" ",$hasil);
	echo ("</br></br><strong>Teks Versi Ejaan van Ophuijsen</strong></br>");
	echo($hasil);
?>