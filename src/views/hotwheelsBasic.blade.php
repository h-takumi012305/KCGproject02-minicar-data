<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2023Basic</title>
    <link rel="stylesheet" href="hotwheelsstyles.css">
</head>
<body>
    <p><a href="../hotwheels.html" ><input type="image" src="../images/hotwheels-logo.jpg" /></a></p>
    
    <p><input type="image" src="../images/basics.jpg" /></p>
    
    <h2><a href="../minicardata-base.html" >ミニカーデータベースへ戻る</a></h2>
    <i class="far fa-check-circle"></i>

    <h3><a href="https://hotwheels.fandom.com/wiki/List_of_2023_Hot_Wheels" >wikiはこちらから</a></h3>
    <table>
        <tr><th>ID</th><th>itemID</th><th>DATE</th><th>Name</th><th>have</th></tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post['Toy'] }}</td>
            <td>{{ $post['Col.'] }}</td>
            <td>{{ $post['Model Name'] }}</td>
            <td>{{ $post['Series'] }}</td>
            <td>{{ $post['have'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>