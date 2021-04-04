<?php
session_start();

if(empty($_SESSION["guess"])){
    $_SESSION["guess"] = rand(1,100);
}
function displayResult($rand,$guess){
    $_SESSION["block"] = "block";
    if($rand == $guess){
        echo "<h2 class='forCorrect'>You Are Correct!</h2>";
        echo "<form method='post' action='index.php'><input type='hidden' name='restart' value='yes'><input type='submit' value='Play Again'></form>";
    }
    if($rand < $guess){
        echo "<h2 class='forHigh'>Too High</h2>";
    }
    if($rand > $guess){
        echo "<h2 class='forLow'>Too Low!</h2>";
    }
}

if(isset($_POST["restart"])){
    session_destroy();
}

include ("header.php");
?>



<section>
    <h1>Welcome to the great number game!</h1>
    <p>I'm thinking of a number between 1 and 100</p>
    <p>take a guess!</p>
    <div class="result">
        <?php
            if(isset($_POST["guess"])){
                displayResult($_SESSION["guess"],$_POST["guess"]);
            }

        ?>
    </div>
    <form action="index.php" method="post">
        <label>
            <input type="text" name="guess" autofocus>
        </label>
        <input type="submit">
    </form>
</section>

<?php include ("footer.php")?>