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

    foreach (array_keys($params) as $key) {
        if ($count++ > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' . $key;
    }
    $sql = 'insert into book (' . $columns . ')values(' . $values . ')';

    // var_dump($sql);
    // exit();

    $stmt = $pdo->prepare($sql); //プリペアードステートメント
    $stmt->execute($params); //実行
}
