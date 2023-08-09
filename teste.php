<?php
session_start();

if(isset($_POST['text_input']) && $_POST['text_input']!=""){
    $_SESSION['text_input'] = $_POST['text_input'];
    //handle other form stuff here
}
?>

<form method="post" action="teste.php">
    <input type="text" name="text_input" <?php if(isset($_SESSION['text_input']) && $_SESSION['text_input']!=""){echo " value='".$_SESSION['text_input']."'";} ?> >
    <input type="submit">
</form>
