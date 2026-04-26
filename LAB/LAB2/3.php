<?php
if(isset($_POST["redovi"]))
    $redovi = $_POST["redovi"];

if(isset($_POST["stupci"]))
    $stupci = $_POST["stupci"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border:1px solid black;
            border-collapse: collapse;
            width:100%;
        }
        td, th{
            border:1px solid black;
            border-collapse: collapse;
            height:20px;
        }
        .tablica-div{
            margin:5px;
            display: flex;
            justify-content: center;
            align-items: center;
            width:50%;
        }
        .main-div{
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <main>
        <div class="main-div">
            <form method="post" action="">
                
                <label for="stupci">Odaberite broj stupaca tablice:</label>
                <select id="stupci" name="stupci">
                <option value="4" <?php echo isset($_POST["stupci"]) && $_POST["stupci"] == 4 ? "selected": "";?>>4</option>
                <option value="6" <?php echo isset($_POST["stupci"]) && $_POST["stupci"] == 6 ? "selected": "";?>>6</option>
                <option value="8" <?php echo isset($_POST["stupci"]) && $_POST["stupci"] == 8 ? "selected": "";?>>8</option>
                </select>
                <hr>
                <label for="redovi">Odaberite broj redova tablice:</label>
                <select id="redovi" name="redovi">
                    <option value="2" <?php echo isset($_POST["redovi"]) && $_POST["redovi"] == 2 ? "selected": "";?>>2</option>
                    <option value="4" <?php echo isset($_POST["redovi"]) && $_POST["redovi"] == 4 ? "selected": "";?>>4</option>
                    <option value="6" <?php echo isset($_POST["redovi"]) && $_POST["redovi"] == 6 ? "selected": "";?>>6</option>
                </select>
                <hr>
                <button type="submit">Napravi tablicu</button>
            </form>

            <?php
            if(isset($_POST["redovi"])){
                echo "<div class='tablica-div'><table>";
                for($i = 0; $i < $redovi; $i++){
                    echo "<tr>";
                    if($i == 0){
                        for($j = 0; $j < $stupci; $j++){
                            echo "<th></th>";
                        }
                    }
                    else{
                        for($j = 0; $j < $stupci; $j++){
                            echo "<td></td>";
                        }    
                    }
                    echo "</tr>";
                }
                echo "</table></div>";
            }
            ?>
        </div>
    </main>
</body>
</html>