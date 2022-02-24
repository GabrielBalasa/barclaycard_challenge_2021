<html>
<head>
<?php
require 'navigation.php';
$user_id = $_SESSION['loggedin'];


$stmt = $pdo->prepare('SELECT * FROM bookings WHERE user_id = :user_id');
$values = [
	'user_id' => $user_id
];
$stmt->execute($values);
$data = $stmt->fetch()[0];

$data2 = $pdo->prepare('SELECT * FROM bookings JOIN services ON bookings.service_id = services.service_id WHERE user_id = :user_id');
$values = [
	'user_id' => $user_id
];
$data2->execute($values);
$user = $data2->fetch();

	$transaction_uuid = $_POST['transaction_uuid'];
	$locale = $_POST['locale'];
	$transaction_type = $_POST['transaction_type'];
	$reference_number = $user['booking_id'];
	$amount = $user['payment_amount'];
	$currency = $_POST['currency'];
	$signed_date_time = $_POST['signed_date_time'];	
	$access_key = $_POST['access_key'];
	$profile_id = $_POST['profile_id'];
	$signed_field_names = $_POST['signed_field_names'];
	$unsigned_field_names = $_POST['unsigned_field_names'];
	$bill_to_address_city = $_POST['bill_to_address_city'];
	$bill_to_address_country = $_POST['bill_to_address_country'];
	$bill_to_address_line1 = $_POST['bill_to_address_line1'];
	$bill_to_address_postal_code = $_POST['bill_to_address_postal_code'];
	$bill_to_email = $_POST['bill_to_email'];
	$bill_to_forename = $_POST['bill_to_forename'];
	$bill_to_surname = $_POST['bill_to_surname'];
	$SECRET_KEY = "44f71586173d448fb4e5a60aac580cd7de7cc1ac9b9d4c70a3ef7f1b3948319bc03660249ab24ce78ca81a07300047a13ed68fc2fc8c4c51a4967b2547bd00f94a211e674c15432d97e8a17c8164236d3fc74f9c255847dab06cf4ab826ab1d45b0eec90a64f42f1bb372851afc1badec2b32b7cbee54e11ab1f58ce5f89004a";
	
	define ('SECRET_KEY', '44f71586173d448fb4e5a60aac580cd7de7cc1ac9b9d4c70a3ef7f1b3948319bc03660249ab24ce78ca81a07300047a13ed68fc2fc8c4c51a4967b2547bd00f94a211e674c15432d97e8a17c8164236d3fc74f9c255847dab06cf4ab826ab1d45b0eec90a64f42f1bb372851afc1badec2b32b7cbee54e11ab1f58ce5f89004a');
	
	foreach($_REQUEST as $parameter_name => $parameter_value) {
        $params[$parameter_name] = $parameter_value;
    }
	
	function sign ($params) {
		return signData(buildDataToSign($params), SECRET_KEY);
	}

	function signData($data, $secretKey) {
		return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
	}

	function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
	}

	function commaSeparate ($dataToSign) {
		return implode(",",$dataToSign);
	}
	
?>
<style>
	body{
	font="Tahoma" 
	}
</style>
</head>
<body>
	
	<h1 align="center">
		Fuse Pre Payment HPP
	</h1>
	<form class="text-center" method="post" action="https://testsecureacceptance.cybersource.com/pay" name="GatewayPush">
	
	<table>
		<col width="180">
		<col width="180">
		
	<?php
            /*foreach($params as $parameter_name => $parameter_value) {
                echo "<tr><td>" . $parameter_name . "</td><td>" . $parameter_value . "</td></tr>";
            }*/
        ?>
	</table>
	
	<?php
        foreach($params as $parameter_name => $parameter_value) {
            echo "<input type=\"hidden\" id=\"" . $parameter_name . "\" name=\"" . $parameter_name . "\" value=\"" . $parameter_value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";

		echo '<p>Name:  <input type="text" value="' . $bill_to_forename . " " . $bill_to_surname . '" disabled /></p>';
		echo '<p>Address:  <input type="text" value="' . $bill_to_address_line1 . '" disabled /></p>';
		echo '<p>Country:  <input type="text" value="' . $bill_to_address_country . '" disabled /></p>';
		echo '<p>Email:  <input type="text" value="' . $bill_to_email . '" disabled /></p>';
		echo '<p>Amount:  <input type="text" value="£' . $amount . '" disabled /></p>';
		
		/*echo "<br><br>";
		print buildDataToSign($params);
		echo "<br><br>";
		print sign($params);*/
    ?>
	<br /><br />
	
	<input type="submit" id="submit" value="Confirm payment" style="height:30; width:150">
	</form>
</body>
</html>