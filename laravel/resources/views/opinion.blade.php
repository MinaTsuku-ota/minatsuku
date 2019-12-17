<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    @include('recaptcha_js')
</head>

<body>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">ホーム</a></li>
            <li class="breadcrumb-item active" aria-current="page">Opinion</li>
        </ol>
    </nav>

    <div class="container container-fluid">
        <form method="POST" action="{{ route('opinion') }}">
            @csrf
            <div class="form-group">
                <label for="title">タイトル:</label>
                <input type="text" id="title" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">本文:</label>
                <textarea id="body" class="form-control" name="body" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">送信</button>
            </div>
            <input type="hidden" name="recaptcha" id="recaptcha">
        </form>
    </div>

    @if (session('message'))
    <script>
        alert('{{ session('message') }}');
    </script>
    @endif
</body>

</html>
