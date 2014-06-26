<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rolldice random</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, intial-scale=1">
</head>
<body>
    The random roll was <?= $random;?><br>
    Your guess was: <?= $guess; ?><br>
    
    <? if ($random == $guess) : ?>
    	<p style="color:green;">Your guess was correct!</p>
    <? else : ?>
    	<p style="color:red;">Sorry, please try again!</p>
    <? endif ?>


    

</body>
</html>

