<?php
session_start();

// バリデーション読み込み
require 'validation.php';
$errors = validation($_POST);

//クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');

//XSS対策
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//ページ切り替え
$pageFlag = 0;
if (!empty($_POST['btn_submit']) && empty($errors)) {
    $pageFlag = 1;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <style>
        body {
            background-color: #E0EDB9;
        }

        .button input {
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <!-- ページフラッグでページ切り替え -->
    <?php if ($pageFlag === 0) : ?>
        <!-- csrfトークン確認 -->
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <?php
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['date'] = $_POST['date'];
            $_SESSION['message'] = $_POST['message'];
            $token = $_SESSION['csrfToken'];
            ?>
            <!-- 確認画面 -->
            <section class="section wrapper" id="workshop">
                <h1 class="section-title">確認画面</h1>
                <?php if (!empty($errors) && !empty($_POST['btn_submit'])) : ?>
                    <?php echo '<ul class="error">'; ?>
                    <?php
                    // エラー表示
                    foreach ($errors as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                    ?>
                    <?php echo '</ul>'; ?>
                <?php endif; ?>
                <!-- 入力内容表示 -->
                <form action="form.php" method="post">
                    <dl>
                        <dt><label for="name">名前</label></dt>
                        <dd><input type="text" id="name" name="name" value="<?php echo h($_POST['name']); ?>" disabled></dd>
                        <dt><label for="email">メールアドレス</label></dt>
                        <dd><input type="email" id="email" name="email" value="<?php echo h($_POST['email']); ?>" disabled></dd>
                        <dt><label for="date">予約日</label></dt>
                        <dd><input type="date" id="date" name="date" value="<?php echo h($_POST['date']); ?>" disabled></dd>
                        <dt><label for="message">お問い合わせ</label></dt>
                        <dd><textarea id="message" name="message" disabled><?php echo h($_POST['message']); ?></textarea></dd>
                    </dl>
                    <!-- エラーがあって送信ボタンが押されたら -->
                    <?php if (!empty($errors) && !empty($_POST['btn_submit'])) : ?>
                        <p class="error">※前に戻って修正して下さい。</p>
                    <?php endif; ?>
                    <div class="button" style="margin-bottom: 15px;">
                        <input id="submit" type="submit" name="btn_submit" value="送信">
                        <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
                        <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
                        <input type="hidden" name="date" value="<?php echo h($_POST['date']); ?>">
                        <input type="hidden" name="message" value="<?php echo h($_POST['message']); ?>">
                        <input type="hidden" name="csrf" value="<?php echo $_POST['csrf'] ?>">
                    </div>
                </form>
                <form action="index.php#page8" method="post">
                    <div class="button">
                        <input id="submit" type="submit" value="戻る">
                    </div>
                </form>
            </section>

            <!-- 予約確認メール送信 -->
            <?php
            mb_language("Japanese");
            mb_internal_encoding("UTF-8");

            $date = date('Y年n月j日', strtotime($_POST['date']));
            $to = $_POST['email'];
            $subject = '予約完了メール';
            $message = $_POST['name'] . '様' . PHP_EOL . PHP_EOL . '以下の日時で予約を受け付けました。' . PHP_EOL . $date . PHP_EOL . PHP_EOL . 'ご来店お待ちしております。';
            $header = "From: portfolio@cafe.kitaakinori.com";

            mb_send_mail($to, $subject, $message, $header);
            ?>

        <?php endif; ?>
    <?php endif; ?>

    <!-- ページフラッグでページ切り替え -->
    <?php if ($pageFlag === 1) : ?>
        <!-- csrfトークン確認 -->
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <!-- DBインサート -->
            <?php require 'db/insert.php';
            insertBook($_POST);
            ?>
            <!-- 送信完了画面 -->
            <section class="section wrapper" id="workshop">
                <h1 class="section-title">送信完了</h1>

                <p>ご予約ありがとうございます。</p>
                <p>予約完了メールを送信しました。ご確認下さい。</p>
                <div class="button">
                    <input id="submit" type="submit" onclick="location.href='/'" value="トップページに戻る">
                </div>
            </section>
            <!-- csrfトークン・入力内容セッション削除 -->
            <?php $_SESSION = []; ?>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>