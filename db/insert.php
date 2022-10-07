<?php

function insertBook($request)
{
    require 'db/connect.php';

    $params = [
        'id' => null,
        'name' => $request['name'],
        'email' => $request['email'],
        'date' => $request['date'],
        'message' => $request['message'],
        'created_at' => null,
    ];

    $count = 0;
    $columns = '';
    $values = '';

    // キーを取り出す
    foreach (array_keys($params) as $key) {
        if ($count++ > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' . $key;
    }

    // 名前付きプレースホルダーでインサート
    $sql = 'insert into book (' . $columns . ')values(' . $values . ')';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}
