<?php
// check for form submission - if it doesn’t exist then send back to contact form
// if (!isset($_POST["save"]) || $_POST["save"] != "contact") {
//     header("Location: contact-form.php"); exit;
// }
// get the posted data
$client_name = $_POST["client_name"];
$client_email = $_POST["client_email"];
$client_phone = $_POST["client_phone"];
$client_address = $_POST["client_address"];
$pet_name = $_POST["pet_name"];
$pet_breed = $_POST["pet_breed"];
$pet_age = $_POST["pet_age"];
$pet_gender = $_POST["pet_gender"];
$pet_spayed_neutered = $_POST["pet_spayed_neutered"];
$pet_vaccines = $_POST["pet_vaccines"];
$pet_medications = $_POST["pet_medications"];
$pet_health_problems = $_POST["pet_health_problems"];

if (empty($client_name))
    $error = "You must enter your name.";
elseif (empty($client_email))
    $error = "You must enter your email address.";
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $client_email))
    $error = "You must enter a valid email address.";
elseif (strlen ($client_phone) < 10)
    $error = "You must enter a valid phone number.";
elseif (empty($client_address))
    $error = "You must enter a address.";
elseif (empty($pet_name))
    $error = "You must enter a pet name.";
elseif (empty($pet_breed))
    $error = "You must enter a pet breed.";
elseif (empty($pet_age))
    $error = "You must enter a pet age.";
elseif (empty($pet_gender))
    $error = "You must enter a pet gender.";
elseif (empty($pet_spayed_neutered))
    $error = "You must specify spayed or neutered or unknown.";
elseif (empty($pet_vaccines))
    $error = "You must enter which vaccines or unknown.";
elseif (empty($pet_medications))
    $error = "You must enter a pet medications or none.";
elseif (empty($pet_health_problems))
    $error = "You must enter health problems or none";

// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header("Location: contact-form.php?e=".urlencode($error)); exit;
}
// write the email content
$email_content = "client_name:\n$client_name\n\n";
$email_content .= "email_address:\n$client_email\n\n";
$email_content .= "client_phone:\n$client_phone\n\n";
$email_content .= "client_address:\n$client_address\n\n";
$email_content .= "pet_name:\n$pet_name\n\n";
$email_content .= "pet_breed:\n$pet_breed\n\n";
$email_content .= "pet_age:\n$pet_age\n\n";
$email_content .= "pet_gender:\n$pet_gender\n\n";
$email_content .= "pet_spayed_neutered:\n$pet_spayed_neutered\n\n";
$email_content .= "pet_vaccines:\n$pet_vaccines\n\n";
$email_content .= "pet_medications:\n$pet_medications\n\n";
$email_content .= "pet_health_problems:\n$pet_health_problems\n\n";

// send the email
mail ("soren@vetrounds.com,joe@vetrounds.com,brian@vetrounds.com", "New Client Form", $email_content);
// send the user back to the form
header("Location: contact-form.php?s=".urlencode("Thank you for your info.")); exit;
?>