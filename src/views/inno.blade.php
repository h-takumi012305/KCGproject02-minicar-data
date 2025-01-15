<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inno64</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p><input type="image" src="./../images/inno-logo.png" /></p>
    <h1>inno</h1>
    <h2><a href="../minicardata-base.html">ミニカーデータベースへ戻る</a></h2>
    <table>
        <tr><th>ID</th><th>itemID</th><th>DATE</th><th>Name</th><th>have</th></tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post['ID'] }}</td>
            <td>{{ $post['itemID'] }}</td>
            <td>{{ $post['DATE'] }}</td>
            <td>{{ $post['Name'] }}</td>
            <td>{{ $post['have'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
