window.onload = function () {
    /*-------------------------------------------
    ロード画面
    -------------------------------------------*/
    const spinner = document.getElementById('loading');
    setTimeout(() => {
        spinner.classList.add('loaded');
    }, 500)

    /*-------------------------------------------
    ハンバーガーメニュー動作
    -------------------------------------------*/
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('.navi-sp');

    const hamburgerClick = () => {
        hamburger.classList.toggle('active');
        if (hamburger.classList.contains('active')) {
            nav.classList.add('active');
        } else {
            nav.classList.remove('active');
        }
    }
    hamburger.addEventListener('click', hamburgerClick);
    nav.addEventListener('click', hamburgerClick);

    /*-------------------------------------------
    ハンバーガーメニューナビアニメーション
    -------------------------------------------*/
    const page1 = document.querySelector('.page1')
    const page2 = document.querySelector('.page2')
    const page3 = document.querySelector('.page3')
    const page4 = document.querySelector('.page4')
    const page7 = document.querySelector('.page7')
    const page8 = document.querySelector('.page8')
    const page9 = document.querySelector('.page9')

    const pageList = [page1, page2, page3, page4, page7, page8, page9]

    // ハンバーガーメニュークリックでアニメーションクラス追加、削除
    hamburger.addEventListener('click', () => {
        for (let i = 0; i < pageList.length; i++) {
            pageList[i].classList.add('fadein');
        }
        if (!(hamburger.classList.contains('active'))) {
            for (let i = 0; i < pageList.length; i++) {
                pageList[i].classList.remove('fadein');
            }
        }
    });

    // ハンバーガーメニューナビクリックでアニメーションクラス削除
    nav.addEventListener('click', () => {
        if (!(nav.classList.contains('active'))) {
            for (let i = 0; i < pageList.length; i++) {
                pageList[i].classList.remove('fadein');
            }
        }
    });

    /*-------------------------------------------
    LOCATION表示非表示
    -------------------------------------------*/
    const titleKichijoji = document.querySelector('.titleKichijoji')
    const titleKanazawa = document.querySelector('.titleKanazawa')
    const boxKichijoji = document.querySelector('.boxKichijoji')
    const boxKanazawa = document.querySelector('.boxKanazawa')

    // h3タイトルクリックでactiveクラス追加、削除
    const openKichijojiBox = () => {
        if (boxKichijoji.classList.contains('active')) {
            boxKichijoji.classList.remove('active');
        } else {
            boxKichijoji.classList.add('active');
        }
    }
    const openKanazawaBox = () => {
        if (boxKanazawa.classList.contains('active')) {
            boxKanazawa.classList.remove('active');
        } else {
            boxKanazawa.classList.add('active');
        }
    }

    titleKichijoji.addEventListener('click', openKichijojiBox);
    titleKanazawa.addEventListener('click', openKanazawaBox);
}