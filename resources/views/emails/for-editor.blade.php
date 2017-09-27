<!DOCTYPE html>
<html>
<head>
	<title>Tulisan baru saja ditambahkan</title>
</head>
<body>
	hallo {{ $user_name }} ada tulisan baru saja dibuat oleh {{ $post->user->name }}, dengan judul {{ $post->title }}, dapat di cek di <a href="{{ route('admin.post.show',['post'=>$post->id]) }}">sini</a>
</body>
</html>