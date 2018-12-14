<html>
<head></head>
<body>
<?php
  $ip = "162.248.88.42";
  $port = "27015";
  include 'query.php';  
?>

Name:
<?php echo $server['name'] ?>

<br> Map:
<?php echo $server['map'] ?>

<br> Game:
<?php echo $server['game'] ?>

<br> Description:
<?php echo $server['description'] ?>

<br> Players:
<?php echo $server['players']  ?>

<br> Playersmax:
<?php echo $server['playersmax'] ?>

<br> Bots:
<?php echo $server['bots'] ?>

<br> Dedicated:
<?php echo $server['dedicated'] ?>

<br> Os:
<?php echo $server['os'] ?>

<br><br>

<?php
  $ip = "74.91.120.57";
  $port = "27015";
  include 'query.php';  
?>

Name:
<?php echo $server['name'] ?>

<br> Map:
<?php echo $server['map'] ?>

<br> Game:
<?php echo $server['game'] ?>

<br> Description:
<?php echo $server['description'] ?>

<br> Players:
<?php echo $server['players']  ?>

<br> Playersmax:
<?php echo $server['playersmax'] ?>

<br> Bots:
<?php echo $server['bots'] ?>

<br> Dedicated:
<?php echo $server['dedicated'] ?>

<br> Os:
<?php echo $server['os'] ?>

</body>
</html>
