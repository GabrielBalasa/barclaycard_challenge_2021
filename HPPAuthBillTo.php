<?php
	require 'navigation.php';
	$user_id = $_SESSION['loggedin'];
	$data = $pdo->prepare('SELECT * FROM bookings JOIN services ON bookings.service_id = services.service_id WHERE user_id = :user_id ORDER BY booking_id DESC');
	$values = [
		'user_id' => $user_id
	];
	$data->execute($values);
	$user = $data->fetch();
?>	
	<body>
		<font face="Times New Roman">
			<h1 class="pb-5" align="center">Payment Information</h1>
			
			<form method="post" action="HPPAuthBillTo2.php" name=BaseForm>
				<table align="center">
					<col width="180">
					<col width="180">
					
					<tr>
						<!-- <td>
							transaction_uuid
                                                 </td> -->
						<td>
							<input type="text" name="transaction_uuid" value="<?php echo uniqid() ?>" hidden >
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							locale
						</td> -->
						<td>
							<input type="text" name="locale" value="en" hidden>
						</td>
					</tr>
							
					<tr>
						<!-- <td>
							transaction_type
						</td> -->
						<td>
							<input type="text" name="transaction_type" value="authorization" hidden>
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							reference_number
						</td> -->
						<td>
							<input type="text" name="reference_number" value="<?php echo uniqid() ?>" hidden>
						</td>
					</tr>
					
					<tr>
						<td>
							Total amount
						</td>
						<td>
							<input type="text" name="amount" value="<?=$user['service_price']; ?>">
						</td>
					</tr>
					
					<tr>
						<td>
							Currency
						</td>
						<td>
							<input type="text" name="currency" value="GBP">
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							signed_date_time
						</td> -->
						<td>
							<input type="text" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>" hidden>
						</td>
					</tr>
					
					<!-- <tr>
						<td colspan="2">
							<b>Do not change unless necessary</b>
						</td>
					</tr> -->
					
					<tr>
						<!-- <td>
							access_key
						</td> -->
						<td>
							<input type="text" name="access_key" value="465bd72b81043eeeb38497bc30b738d1" hidden>
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							profile_id
						</td> -->
						<td>
							<input type="text" name="profile_id" value="5F467CC1-177B-42D3-BBC7-1F79306F2573" hidden>
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							signed_field_names
						</td> -->
						<td>
							<input type="text" name="signed_field_names" value="access_key,amount,currency,locale,profile_id,reference_number,signed_date_time,signed_field_names,transaction_type,transaction_uuid,unsigned_field_names,bill_to_address_city,bill_to_address_country,bill_to_address_line1,bill_to_address_postal_code,bill_to_email,bill_to_forename,bill_to_surname" hidden>
						</td>
					</tr>
					
					<tr>
						<!-- <td>
							unsigned_field_names
						</td> -->
						<td>
							<input type="text" name="unsigned_field_names" value="" hidden>
						</td>
					</tr>
					
					<tr>
						<td class="pb-4" colspan="2">
							<b class="h2" >Address</b>
						</td>
					</tr>

					<tr>
						<td>
							City
						</td>
						<td>
							<input type="text" name="bill_to_address_city" value="Northampton">
						</td>
					</tr>
					
					<tr>
						<td>
							Country
						</td>
						<td>
							<input type="text" name="bill_to_address_country" value="GB">
						</td>
					</tr>
					
					<tr>
						<td>
							Address
						</td>
						<td>
							<input type="text" name="bill_to_address_line1" value="1234 Pavilion Drive">
						</td>
					</tr>
					
					<tr>
						<td>
							Postcode
						</td>
						<td>
							<input type="text" name="bill_to_address_postal_code" value="NN4 7SG">
						</td>
					</tr>
					
					<tr>
						<td>
							Email
						</td>
						<td>
							<input type="text" name="bill_to_email" value="jbloggs@testemail.co.uk">
						</td>
					</tr>
					
					<tr>
						<td>
							Forename
						</td>
						<td>
							<input type="text" name="bill_to_forename" value="Test">
						</td>
					</tr>
					
					<tr>
						<td>
							Surname
						</td>
						<td>
							<input type="text" name="bill_to_surname" value="Name">
						</td>
					</tr>

					<tr>
						<td>
							Phone Number
						</td>
						<td>
							<input type="text" name="phone" value="Phone number">
						</td>
					</tr>

						</table>	
					
						<div class="pt-5 d-flex justify-content-center" >
							<input type="submit" value="Pay" style="height:30; width:150">
						</div>
					
				
			</form>
		</font>
	</body>
</html>