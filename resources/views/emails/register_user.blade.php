<!DOCTYPE html>
<html>
<head>
	<title>Email to {{ $user_name }}</title>
</head>
<body>
	<table style="width: 100%">
		<tr>
			<td colspan="3">{{ $pesan or "Selamat Bergabung dengan sistem" }}</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ $user_name }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td>{{ $user_email }}</td>
		</tr>
	</table>
</body>
</html>