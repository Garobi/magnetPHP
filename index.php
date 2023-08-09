<?php
    session_start();
    include("database.php");
    if(isset($_POST['search']) && $_POST['search']!=""){
        $_SESSION['search'] = $_POST['search'];
    }
    else {
        $_SESSION['search'] = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <h4>Pesquisa:</h4>
        <input type="text" name="search" <?php if(isset($_SESSION['search']) && $_SESSION['search']!=""){echo " value='".$_SESSION['search']."'";} ?> >
        <select name="selection" id="selection">
            <option value="" selected="selected" hidden="hidden">Chose Search Option</option>
            <option value="media">Media</option>
            <option value="website">Website</option>
        </select>
        <input type="submit">
    </form>
    <?php 
    ?>
</body>
</html>
<?php
    include("search.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_SPECIAL_CHARS);
        $selection = filter_input(INPUT_POST, "selection", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($search)) {
            $_SESSION['search'] = "";
            switch ($selection) {
                case 'website':
                    echo "teste Website";
                    generalSearchWebsite();
                    break;
                
                case 'media':
                    echo "Invalid query";
                    break;
                default:
                    echo "Select your search option";
                    break;
            }
            // ;
            
        }
        else{
            switch ($selection) {
                case 'website':
                    specificSearchWebsite($search);
                    break;
                
                case 'media':
                    searchMedia($search);
                    break;
                default:
                    echo "Select your search option";
                    break;
            }
        }
    }
    
?>