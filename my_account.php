<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('title','My account : IT Online Shopping website');
	$layout->set('content','
<!--Content-->
		<table class="user_contact">
			<tr>
				<th>Contact</th>
				<th></th>
			</tr>
			<tr>
				<td>
					UID : 
				</td>
				<td>
					000000001
				</td>
			</tr>
			<tr>
				<td>
					E-mail : 
				</td>
				<td>
					karanpoj@gmail.com
				</td>
			</tr>
			<tr>
				<td>
					Name : 
				</td>
				<td>
					Karanpoj Varintaravet
				</td>
			</tr>
			<tr>
				<td>
					Mobile Phone : 
				</td>
				<td>
					0999999999
				</td>
			</tr>
			<tr>
				<td>
					Birthday : 
				</td>
				<td>
					14/07/1996
				</td>
			</tr>
		</table>
		<table class="user_contact">
			<tr>
				<th>Address</th>
				<th></th>
			</tr>
			<tr>
				<td>
					Recipient`s name : 
				</td>
				<td>
					Karanpoj Varintaravet
				</td>
			</tr>
			<tr>
				<td>
					Mobile Phone : 
				</td>
				<td>
					0999999999
				</td>
			</tr>
			<tr>
				<td>
					Address : 
				</td>
				<td>
					99 Soi Klong Luang 17, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120
				</td>
			</tr>
		</table>
	');
	echo $layout->output();
?>