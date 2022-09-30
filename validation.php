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

    if (!empty($request['date'])) {
        date_default_timezone_set('Asia/Tokyo');
        $today = date('y/m/d');
    }

    if (empty($request['date'])) {
        $errors[] = '「予約日」は必須です。';
    }

    if (mb_strlen($request['message']) > 200) {
        $errors[] = '「お問い合わせ」は200文字以内で入力してください。';
    }

    return $errors;
}
