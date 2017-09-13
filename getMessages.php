<?php 

include 'connection.php';

$messages = $pdo->query("SELECT * FROM Messages ORDER BY timestamp ASC");
$tableMessages = $messages->fetchAll(PDO::FETCH_ASSOC);

foreach ($tableMessages as $key => $value) {
	echo "<li class='list-group-item message'>
	<header>
		<i class='sender'>".$value["sender"]."</i>
	</header>
	<main>
		<i class='message'>".$value["message"]."</i>
	</main>
	<footer class='timestamp'>".$value["timestamp"]."</footer>
</li>";
}


?>