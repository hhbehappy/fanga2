<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせを受け付けました</title>
</head>
<body>
    <p>お問い合わせ内容は次のとおりです。</p>
    ーーーーーーーーーーーーーーーーー
	<p>お名前：{{$inputs['name']}}</p>
	<p>メールアドレス：<br>{{$inputs['email']}}</p>
	<p>お問い合わせ内容：<br>{{$inputs['message']}}</p>
    ーーーーーーーーーーーーーーーーー
    <p>このメールは自動返信メールです。</p>
    <p class="">
        サイト名:<a href="https://fanga.jp/" class="">FANGA</a><br>
        URL:https://fanga.jp/
    </p>
</body>
</html>