<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hotwheels 2023</title>
    <link rel="stylesheet" href="../../styles.css">
    <script>
        let deleteQueue = [];

        function queueDelete(id) {
            deleteQueue.push(id);
        }

        function updateHave(id, increment) {
            fetch('../../src/hotwheelssrc/hotwheels2023Increment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}&increment=${increment}`
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Failed to update');
                }
            });
        }

        function executeDeletes() {
            if (confirm('本当に削除しますか？')) {
                deleteQueue.forEach(id => {
                    fetch('../../src/hotwheelssrc/hotwheels2023Delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `id=${id}&_method=DELETE`
                    }).then(response => {
                        if (!response.ok) {
                            alert('Failed to delete');
                        }
                    });
                });
                location.reload();  // Reload the page after all deletes
            }
        }
    </script>
</head>
<body>
    <h1>hotwheels 2023</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th><a href="?sort=ID">ID</a></th>
            <th><a href="?sort=itemID">itemID</a></th>
            <th><a href="?sort=Col">Col</a></th>
            <th><a href="?sort=Name">Name</a></th>
            <th><a href="?sort=Series">Series</a></th>
            <th><a href="?sort=have">have</a></th>
            <th>Update</th>
            <th><button type="button" onclick="executeDeletes()">削除</button></th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post['ID'] }}</td>
            <td>{{ $post['itemID'] }}</td>
            <td>{{ $post['Col'] }}</td>
            <td>{{ $post['Name'] }}</td>
            <td>{{ $post['Series'] }}</td>
            <td>{{ $post['have'] }}</td>
            <td>
                <button type="button" onclick="updateHave({{ $post['ID'] }}, 1)">+</button>
                <button type="button" onclick="updateHave({{ $post['ID'] }}, -1)">-</button>
            </td>
            <td>
                <input type="checkbox" onclick="queueDelete({{ $post['ID'] }})">
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Form for adding new data -->
    <form method="POST" action="../../src/hotwheelssrc/hotwheels2023Add.php">
        <input type="text" name="itemID" placeholder="itemID" required>
        <input type="text" name="Col" placeholder="Col" required>
        <input type="text" name="Name" placeholder="Name" required>
        <input type="text" name="Series" placeholder="Series" required>
        <input type="number" name="have" placeholder="have" required>
        <button type="submit">Add</button>
    </form>
</body>
</html>
