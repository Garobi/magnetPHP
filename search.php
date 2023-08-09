<?php
    function generalSearchWebsite() {
        include("database.php");
        $sql = "SELECT * FROM website";
        $result = $conn->query($sql);
        tableMakerWebsite($result);
        mysqli_close($conn);
    }
    function specificSearchWebsite($prompt) {
        include("database.php");
        $sql = "SELECT * FROM website where url LIKE '%${prompt}%'";
        $result = $conn->query($sql);
        tableMakerWebsite($result);
        mysqli_close($conn);
    }

    function searchMedia($prompt) {
        include("database.php");
        $sql = "SELECT * FROM media where title LIKE '%${prompt}%'";
        $result = $conn->query($sql);
        tableMakerMedia($result);
        mysqli_close($conn);
    }

    function tableMakerWebsite($result) {
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>URL</th><th>Score</th><th>safety</th><th>uploaded</th><th>upadted</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["url"]."</td><td>".$row["score"]."</td><td>".$row["safety"]."</td><td>".$row["uploaded"]."</td><td>".$row["updated"]."</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "No Results";
        }
    }

    function tableMakerMedia($result){
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>IDWebsite</th><th>URL</th><th>Title</th><th>Country</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["idmedia"]."</td><td>".$row["idwebsite"]."</td><td><a href='".$row["url"]."' target='_blank'>Website</a></td><td>".$row["title"]."</td><td>".$row["country"]."</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "No Results";
        }
    }
?>