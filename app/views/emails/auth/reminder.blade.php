<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Wachtwoord aanpassen</h2>

		<div>
			Dit bericht is een reactie op uw verzoek het wachtwoord voor uw account opnieuw in te stellen. Klik op de onderstaande link en volg de aanwijzingen.<br/>{{ URL::to('password/reset', array($token)) }}
			Deze link verloopt over {{ Config::get('auth.reminder.expire', 60) }} minuten.
		</div>
	</body>
</html>
