<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Calendar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
		include "calendar.php";
		date_default_timezone_set('Europe/Istanbul');
		if (empty($_POST["month"]) || empty($_POST["year"])) {
			$month = date("m");
			$year = date("Y");
		}else {
			$month = $_POST["month"];
			$year = $_POST["year"];
		}
		$calendar = new calendar($month,$year);
		?>
		<div class="container">
			<div class="calendar-date content-background">
				<div class="calendar-month-head">
					<div class="left"> <?php echo $year.' / '.$calendar->get_month_name($month); ?></div>
					<div class="right">
						<a>  </a>
						<a>  </a>
					</div>
				</div>
				<div class="clearfix"></div>
				<table class="calendar-day-table">
						<tr class="tr-th">
							<?php echo '<th>'.implode('</th><th>',$calendar->get_day_name()).'</th>';?>
						</tr>
				</table>
				<table class="calendar-day-table">
						<tr>
							<?php echo $calendar->get_day_of_week();?>
						</tr>
				</table>
				<br>
					<form class="form-inline" action="" method="post">
						<div class="form-group">
							<input class="form-control" type="text" name="month" placeholder="ay">
							<input class="form-control" type="text" name="year" placeholder="yıl">
							<input class="btn btn-warning" type="submit" name="post" value="hesapla" style="">
						</div>
					</form>
			</div>
		</div>
	</body>
</html>
