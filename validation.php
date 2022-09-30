<?php

function validation($request)
{
    $errors = [];

    if (empty($request['name']) || 20 < mb_strlen($request['name'])) {
        $errors[] = '「名前」は必須です。20文字以内で入力してください。';
    }

    if (empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = '「メールアドレス]は必須です。正しい形式で入力してください。';
    }

    if (empty($request['date']) || strtotime($request['date']) < strtotime(date("Y/m/d", strtotime("+1 day")))) {
        $errors[] = '「予約日」は必須です。明日以降の日付を入力してください。';
    }

    if (mb_strlen($request['message']) > 200) {
        $errors[] = '「お問い合わせ」は200文字以内で入力してください。';
    }

    return $errors;
}
