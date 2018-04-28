	<?php
//start session
session_start();
// setting variable for account id
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}			
				
				
				
				function MaskCreditCard($cc){
				// Get the cc Length
				$cc_length = strlen($cc);
				// Replace all characters of credit card except the last four and dashes
				for($i=0; $i<$cc_length-4; $i++){
				if($cc[$i] == '-'){continue;}
				$cc[$i] = 'X';
				}
	
				// Return the masked Credit Card #
				return $cc;

				}
				function FormatCreditCard($cc){
				// Clean out extra data that might be in the cc
				$cc = str_replace(array('-',' '),'',$cc);
				// Get the CC Length
				$cc_length = strlen($cc);
				// Initialize the new credit card to contian the last four digits
				$newCreditCard = substr($cc,-4);
				// Walk backwards through the credit card number and add a dash after every fourth digit
				for($i=$cc_length-5;$i>=0;$i--){
				// If on the fourth character add a dash
				if((($i+1)-$cc_length)%4 == 0){
				$newCreditCard = '-'.$newCreditCard;
				}
				// Add the current character to the new credit card
				$newCreditCard = $cc[$i].$newCreditCard;
				}
				// Return the formatted credit card number
	
				return $newCreditCard;
}
?>