<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
                <label for="text1">Text:</label>
                <input type="text" id="text1" class="form-control" name="text" required>
            </div>
            <div class="form-group">
                <label for="textarea1">Textarea:</label>
                <textarea id="textarea1" class="form-control"></textarea>
            </div>
        </form>
    </div>

</body>

</html>
