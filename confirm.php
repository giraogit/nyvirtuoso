<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contact Us Confirmation Page</title>
<link href="_css/nvs-headerInsert.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="text">
  <div class="mainText">
    <h1>Thank you for your email.</h1>

		<?php if ( !empty($_GET['err']) ) { ?>
			<p style="color:red;">
				<?php echo urldecode($_GET['err']); ?>
			</p>

		<?php } else if ( !empty($_GET['msg']) ) { ?>
			<p>
				<?php echo urldecode($_GET['msg']); ?>
			</p>
		<?php } ?>

  </div>
</div>

</body>

</html>
