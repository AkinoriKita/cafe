<?php
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');

//XSS対策
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//CSRF対策
if (!isset($_SESSION['csrfToken'])) {
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ALL Coffee Roasters</title>
    <meta name="description" content="ALL Coffee Roastersは「日々の生活に特別な時間を」をコンセプトに、2021年から営業しております。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/jquery.pagepiling.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/jquery.pagepiling.min.js"></script>
    <script src="js/shopify.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <header>
        <nav id="navi">
            <ul>
                <li data-menuanchor="page1" class="active"><a href="#page1">TOP</a></li>
                <li data-menuanchor="page2"><a href="#page2">NEWS</a></li>
                <li data-menuanchor="page3"><a href="#page3">CONCEPT</a></li>
                <li data-menuanchor="page4"><a href="#page4">BEANS</a></li>
                <li data-menuanchor="page4"><a href="#page7">LOCATION</a></li>
                <li data-menuanchor="page7"><a href="#page8">WORK SHOP</a></li>
                <li><a href="https://coffeemodify.myshopify.com/" target=”_blank” rel="nofollow">ONLINE SHOP<span> </span><i class="fas fa-external-link-alt"></i></a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="navi-sp">
            <ul>
                <li data-menuanchor="page1" class="active page1"><a href="#page1">TOP</a></li>
                <li data-menuanchor="page2" class="page2"><a href="#page2">NEWS</a></li>
                <li data-menuanchor="page3" class="page3"><a href="#page3">CONCEPT</a></li>
                <li data-menuanchor="page4" class="page4"><a href="#page4">BEANS</a></li>
                <li data-menuanchor="page7" class="page7"><a href="#page7">LOCATION</a></li>
                <li data-menuanchor="page8" class="page8"><a href="#page8">WORK SHOP</a></li>
                <li class="page9"><a href="https://coffeemodify.myshopify.com/" target=”_blank” rel="nofollow">ONLINE SHOP<span> </span><i class="fas fa-external-link-alt"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="pagepiling">
            <section class="section" id="top">
                <div id="mainvisual"></div>
            </section>

            <section class="section wrapper" id="news">
                <h2 class="section-title">NEWS</h2>
                <dl id="news">
                    <dt class="dt1">2022.07.15</dt>
                    <dt class="dt2"><a href="https://coffeemodify.myshopify.com/blogs/news/new-beans-airuma" target=”_blank” rel="nofollow">【新豆入荷のお知らせ】 Panama Airumá Pulped Natural</a></dt>
                    <dt class="dt3">2022.06.1</dt>
                    <dt class="dt4"><a href="https://coffeemodify.myshopify.com/blogs/news/workshop" target=”_blank” rel="nofollow">WORK SHOPのお知らせ</a></dt>
                    <dt class="dt5">2022.03.15</dt>
                    <dt class="dt6"><a href="https://coffeemodify.myshopify.com/blogs/news/newbeans-panama" target=”_blank” rel="nofollow">【新豆入荷のお知らせ】 Ethiopia Alaka Washed</a></dt>
                    <dt class="dt7">2021.11.07</dt>
                    <dt class="dt8"><a href="https://coffeemodify.myshopify.com/blogs/news/homepage-renewal" target=”_blank” rel="nofollow">ホームページリニューアルのお知らせ</a></dt>
                </dl>
            </section>

            <section class="section wrapper" id="concept">
                <div>
                    <h2 class="section-title">CONCEPT</h2>
                    <div class="img-text">
                        <p class="scrollLeft">
                            ALL Coffee Roastersは「日々の生活に特別な時間を」をコンセプトに、2021年から営業しております。<br>
                            コーヒー好きの方はもちろん、そうでないかたでも心地のいい空間で羽を休めることができるカフェになっております。<br>
                            他では味わえない厳選されたシングルオリジンコーヒーをこだわり抜いた焙煎で提供しています。
                        </p>
                        <img class="scrollRight" src="img/shop.jpg" alt="コーヒーショップ">
                    </div>
                </div>
            </section>

            <section class="section wrapper" id="beans">
                <div>
                    <h2 class="section-title">BEANS</h2>
                    <div class="img-text" id="img-beans">
                        <p class="scrollRight">ルワンダ、グァテマラ、エチオピアなど、現地のコーヒー農園まで足を運んで買付けています。<br>
                            現地でカッピングから買付けを行なっているので、納得したコーヒーだけを店頭に並べています。
                        </p>
                        <img class="scrollLeft" src="img/coffee-cherry.jpg" alt="コーヒーチェリー">
                    </div>
                </div>
            </section>

            <section class="section wrapper pp-scrollable" id="shopify">
                <div class="flexbox">
                    <img src="img/coffee-product.jpg" alt="Ethiopia Alaka Washed" class="scrollUp">
                    <div class="text scrollUp timing">
                        <h3>Ethiopia Alaka Washed</h3>
                        <p>¥2,000~</p>
                        <div id='product-component-1660957754727'></div>
                        <p class="details"><b>DETAILS</b><br>Origin: Ethiopia<br>Variety: chiroso<br>Process: washed<br>Producer: John Alexander Bermudez<br>Relationship length: since 2019</p>
                    </div>
                </div>
            </section>

            <section class="section wrapper pp-scrollable" id="shopify2">
                <div class="flexbox">
                    <img src="img/coffee-product2.jpg" alt="Airumá Pulped Natural" class="scrollUp">
                    <div class="text scrollUp timing">
                        <h3>Brazil Airumá Pulped Natural</h3>
                        <p>¥1,700~</p>
                        <div id='product-component-1660957941942'></div>
                        <p class="details"><b>DETAILS</b><br>Origin: Chapada Diamantina, Brazil<br>Variety: red catuaí<br>Process: pulped natural<br>Producer: Borré family<br>Relationship length: since 2015</p>
                    </div>
                </div>
            </section>


            <section class="section wrapper accordion-area" id="location">
                <h2 class="section-title">LOCATION</h2>
                <h3 class="titleKichijoji">KICHIJOJI<i class="fas fa-caret-down"></i></h3>
                <div class="location-text boxKichijoji">
                    <p>
                        東京都武蔵野市吉祥寺本町<br>
                        TEL. 000-0000-0000<br>
                        Open 10:00 - 17:00<br>
                        Closed Wednesdays<br>
                        <a href="https://maps.google.com?daddr=〒180-0004 東京都武蔵野市吉祥寺本町２丁目" target="_blank" rel="nofollow" class="btn bgleft"><span>吉祥寺店への行き方</span></a>
                    </p>
                    <img src="img/location-Kichijoji.jpg" alt="ALL Coffee Roasters 吉祥寺店">
                </div>
                <h3 class="titleKanazawa">KANAZAWA<i class="fas fa-caret-down"></i></h3>
                <div class="location-text boxKanazawa">
                    <p>
                        石川県金沢市新竪町3丁目<br>
                        TEL. 000-0000-0000<br>
                        Open 09:00 - 16:00<br>
                        Closed Mondays<br>
                        <a href="https://maps.google.com?daddr=〒920-0995 石川県金沢市新竪町３丁目" target="_blank" rel="nofollow" class="btn bgleft"><span>金沢店への行き方</span></a>
                    </p>
                    <img src="img/location-Kanazawa.jpg" alt="ALL Coffee Roasters 金沢店">
                </div>
            </section>

            <section class="section wrapper" id="workshop">
                <h2 class="section-title">WORK SHOP</h2>
                <p><span>
                        コーヒをより美味しく淹れるためのハンドドリップワークショップを開催しております。<br>
                        コーヒーの本場メルボルンで腕を磨いてきた店主が、その技術を余すことなくお伝えします。<br><br>
                    </span>
                    <a href="https://coffeemodify.myshopify.com/blogs/news/workshop" target=”_blank” rel="nofollow">詳しくはこちら</a>
                </p>
                <form action="form.php" method="post">
                    <dl>
                        <dt><label for="name">名前</label></dt>
                        <dd><input type="text" id="name" name="name" value="<?php if (isset($_SESSION['name'])) {
                                                                                echo h($_SESSION['name']);
                                                                            } ?>"></dd>
                        <dt><label for="email">メールアドレス</label></dt>
                        <dd><input type="email" id="email" name="email" value="<?php if (isset($_SESSION['email'])) {
                                                                                    echo h($_SESSION['email']);
                                                                                } ?>"></dd>
                        <dt><label for="date">予約日</label></dt>
                        <dd><input type="date" id="date" name="date" value="<?php if (isset($_SESSION['date'])) {
                                                                                echo h($_SESSION['date']);
                                                                            } ?>"></dd>
                        <dt><label for="message">お問い合わせ</label></dt>
                        <dd><textarea id="message" name="message"><?php if (isset($_SESSION['message'])) {
                                                                        echo h($_SESSION['message']);
                                                                    } ?></textarea></dd>
                    </dl>
                    <div class="button"><input id="submit" type="submit" value="送信"></div>
                    <input type="hidden" name="csrf" value="<?php echo $token ?>">
                </form>
            </section>
    </main>

    </div>

</body>

</html>