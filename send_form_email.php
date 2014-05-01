<?php
if(isset($_POST['submit'])) {
   $to = 'joe@vetrounds.com.com' ;     //put your email address on which you want to receive the information
   $subject = 'Appointment request at VetPronto';   //set the subject of email.
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $message = "<table><tr><td>First Name</td><td>".$_POST['firstName']."</td></tr>
               <tr><td>Last Name</td><td>".$_POST['lastName']."</td></tr>
               <tr><td>E-Mail</td><td>".$_POST['txtEmail']."</td></tr>
               <tr><td>Phone Number</td><td>".$_POST['phoneNumber']."</td></tr> </table>" ;
   mail($to, $subject, $message, $headers);
   header('Location: contact.php');
}
?>