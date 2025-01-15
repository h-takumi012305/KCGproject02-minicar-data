<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POPRACE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p><input type="image" src="./images/poprace-logo.jpg" /></p>
    <h1>ポップレース</h1>
    
    <h2><a href="../minicardata-base.html" >ミニカーデータベースへ戻る</a></h2>
    <table>
        <tr><th>ID</th><th>Model ID</th><th>Model</th><th>Description</th><th>Make</th><th>DATE</th><th>Manufacturer</th><th>have</th></tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post['ID'] }}</td>
            <td>{{ $post['Model ID'] }}</td>
            <td>{{ $post['Model'] }}</td>
            <td>{{ $post['Description'] }}</td>
            <td>{{ $post['Make'] }}</td>
            <td>{{ $post['DATE'] }}</td>
            <td>{{ $post['Manufacturer'] }}</td>
            <td>{{ $post['have'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>