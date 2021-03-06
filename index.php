<?php include("inc/quiz.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
        <?php if ($show_score == false) {?>
            <?php if (!empty($toast)) {echo '<p>' . $toast . '</p>';} ?>
                <p class="breadcrumbs">Question <?php echo count($_SESSION['used_indexes']); ?> of <?php echo $total_questions; ?></p>
                <p class="quiz"><?php echo 'What is ' . $question['leftAdder'] . ' + ' . $question['rightAdder'] . '?';?></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $index; ?>" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>" />
                </form>
        <?php } ?>
        <?php 
            if ($show_score == true) {
                echo '<p>You got ' . $_SESSION['total_correct'] .  ' of ' . $total_questions . ' correct!</p>';
                echo '<button class="btn" onClick="window.location.reload();">Play Again</button>';
            }
        ?>
        </div>
    </div>
</body>
</html>