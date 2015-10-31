<?php

echo '<!DOCTYPE html>
<html lang="en">
<body>';


echo '<h2 align="center">Job Application Task</h2>';

if(isset($uri1))
	{
		echo '<p align="center">You link contains: '. $uri1 .'</p>';
	}
	
if(isset($nouri))
	{
		echo '<p align="center">'. $nouri .'</p>';
	}


if(isset($domains))
	{
	 	echo 	'<strong><table border="1" cellspacing="0" cellpadding="10" align="center">
					 <tr>
					 <th valign="top" align="center">Domains</th> 
					 </tr>';
		
		foreach($domains as $row)
			{
				echo '<tr>
						  <td valign="top" align="center">'. $row['domain'] .'</td>
						  </tr>';
			}
		echo '</table></strong>';  
	}
	
if(isset($elements))
	{
		echo 	'<br><strong><table border="1" cellspacing="0" cellpadding="10" align="center">
					<tr>
					<th valign="top" align="center">URI requests</th> 
					</tr>';
		foreach($elements as $row)
			{
				echo '<tr>
						<td valign="top" align="center">'. $row['uri'] .'</td> 
						</tr>';
			}
				echo 	'</table></strong>'; 
	}

if(isset($hashed))
	{
		echo '<p align="center">'. $hashed .'</p>';
	}
if(isset($nhash))
	{
		echo '<p align="center">'. $nhash .'</p>';
	}
if(isset($nouris))
	{
		echo '<p align="center">'. $nouris.'</p>';
	}

echo '</body>
</html>';