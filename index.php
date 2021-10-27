<?php include("includs/header.php"); ?>
<?php
if (isset($_GET['url']) && !empty($_GET['url'])) {
	$url = strtolower(trim($_GET['url']));
	//echo $url;
	$link = db_query("SELECT * FROM `links` WHERE `short_link` = '$url';")->fetch();
	//var_dump($link);
	if (empty($link)) {
		echo "Такая ссылка не найдена";
		header('Location: 404.php');
		die;
	}
	db_exec("UPDATE `links` SET `views` = `views` + 1 WHERE `short_link` = '$url';");
	header('Location:' . $link['long_link']);
	die;
	//var_dump($link);
} //else echo 'url is empty';
?>
<main class="container">
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Необходимо <a href="<?php echo get_url('registr.php'); ?>">зарегистрироваться</a> или <a href="<?php echo get_url('login.php'); ?>">войти</a> под своей учетной записью</h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Пользователей в системе: <?php echo $users_count ?></h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Ссылок в системе: <?php echo $links_count ?></h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Всего переходов по ссылкам: <?php echo $views_count ?></h2>
		</div>
	</div>
</main>
<?php include("includs/footer.php");  ?>