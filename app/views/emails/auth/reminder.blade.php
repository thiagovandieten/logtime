<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Wachtwoord wijzigen</h2>

		<div style="color: #666; font-size: 16px;font-family: arial; line-height: 24px;">
			Dit bericht is een reactie op uw verzoek het wachtwoord voor uw account opnieuw in te stellen. Klik op de onderstaande link en volg de aanwijzingen.<br/>{{ URL::to('login/forgotpassword', array($token)) }}
			{{--Deze link verloopt over {{ Config::get('auth.reminder.expire', 60) }} minuten.--}}
		</div>
	</body>
</html>
