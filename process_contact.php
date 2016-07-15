<?php

	$loc = 'confirm.php';

	$err_msg = '';
	foreach ($_POST AS $post_data) {
		if ( stristr($post_data, ';') || stristr($post_data, '$') || stristr($post_data, '<') || stristr($post_data, '>') || stristr($post_data, '=') ) {
			$err_msg = 'scripting characters not allowed.<br/>Please return to <a href="contact-text.html">Contact Us</a>.';
		}
	}

	$recipient;
	$subject;
	$mail_body;

	if ( empty($err_msg) ) {
		if ( isset($_POST['request_info']) && ($_POST['request_info'] == "questions") ) {

			$info_name = $_POST['fullname_info'];
			$info_email = $_POST['email_info'];
			$questions = $_POST['textarea_info'];

			$recipient = "canticorumv@gmail.com";
			//$recipient = "leeryder2@earthlink.net";
			//$recipient = "kalinma@msn.com";
			$subject = "Information Request Form Submitted for The New York Virtuoso.";

			if ( !empty($info_name) && !empty($info_email) && !empty($questions) ) {
				$mail_body = "A visitor to The New York Virtuoso web site has requested information. Details follow:";
				$mail_body .= "\r\n";
				$mail_body .= "\r\nContact Full Name: ".$info_name;
				$mail_body .= "\r\nContact Email: ".$info_email;
				$mail_body .= "\r\nQuestions, Comments:\r\n".$questions;
			}

		} else if ( isset($_POST['list_info']) && ($_POST['list_info'] == "mailinglist") ) {

			$info_name = $_POST['fullname_list'];
			$info_email = $_POST['email_list'];

			$recipient = "canticorumv@gmail.com";
			//$recipient = "leeryder2@earthlink.net";
			//$recipient = "kalinma@msn.com";
			$subject = "Mailing List Form Submitted for The New York Virtuoso Singers.";

			if ( !empty($info_name) && !empty($info_email) ) {
				$mail_body = "A visitor to The New York Virtuoso web site has submitted contact information for the mailing list. Details follow:";
				$mail_body .= "\r\n";
				$mail_body .= "\r\nContact Full Name: ".$info_name;
				$mail_body .= "\r\nContact Email: ".$info_email;
			}
		}


		$header = '';
		$header .= 'From: canticorumv@gmail.com'."\r\n";
		//$header .= 'From: kalinma@msn.com'."\r\n";
		$header .= 'MIME-Version: 1.0'."\r\n";
		$header .= 'Content-type: text/plain; charset=iso-8859-1'."\r\n";

		if ( !empty($mail_body) ) {
			$result = mail($recipient, $subject, $mail_body, $header);
			if ($result) {
				$msg = 'Thank you for submitting your information to The New York Virtuoso!';
				$loc = 'confirm.php?msg='.urlencode($msg);
			} else {
				$err = 'We appear to be having some server problems. Please try again later.';
				$loc = 'confirm.php?err='.urlencode($err);
			}
		} else {
			$err = urlencode('Please return to <a href="contact-text.html">Contact Us</a> and complete all required fields.');
			$loc = 'confirm.php?err='.urlencode($err);
		}

	} else {
		if ( !empty($err_msg) ) {
			$err = $err_msg;
			$loc = 'confirm.php?err='.urlencode($err);
		} else {
			$err = 'Please return to <a href="contact-text.html">Contact Us</a> and complete all required fields.';
			$loc = 'confirm.php?err='.urlencode($err);
		}
	}

	header('Location: '.$loc);

?>
