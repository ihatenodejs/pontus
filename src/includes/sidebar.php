<?php
$current_page = $_SERVER['REQUEST_URI'];

function isCurrentPage($link) {
    global $current_page;

    if ($current_page === $link || $current_page === $link . '/') {
        return true;
    }

    return false;
}

function renderLink($href, $text) {
    if (isCurrentPage($href)) {
        echo '<b>' . $text . '</b>';
    } else {
        echo '<a href="' . $href . '">' . $text . '</a>';
    }
}
?>

<div class="sidebar">
    <div class="sb-itm">
        <h1 style="font-size: medium;">menu</h1>
        <?php renderLink('/', 'home'); ?>
        <?php renderLink('/links', 'links'); ?>
    </div>
    <div class="sb-itm">
        <h1 style="font-size: medium;">archives</h1>
        <?php renderLink('/archives/android/modules/', 'android magisk modules'); ?>
        <?php renderLink('/archives/ads/political', 'political advertising'); ?>
        <?php renderLink('/archives/ads/college', 'college advertising'); ?>
        <?php renderLink('/archives/videos/short-form/', 'short-form videos'); ?>
        <?php renderLink('/archives/videos/long-form/', 'long-form videos'); ?>
        <?php renderLink('/archives/android/apps/', 'android apps'); ?>
        <?php renderLink('/archives/iso/', 'iso images'); ?>
        <?php renderLink('/archives/updates/', 'updates'); ?>
        <?php renderLink('/archives/img/', 'images'); ?>
    </div>
    <div class="sb-itm">
        <h1 style="font-size: medium;">other stuff</h1>
        <a href="https://disfunction.blog">blog</a>
        <a href="https://aidxn.cc">main site</a>
        <a href="https://aidxn.fun">alternate site</a>
        <a href="https://tilde.club/~lxu">tilde.club page</a>
        <a href="https://androidintegrity.org">android integrity</a>
    </div>
    <div class="bt-section">
        <img src="/img/blinkies/cantlivewithout.gif" class="contained-blinkie" style="padding-top: 15px;" alt="I can't live without a computer">
        <img src="/img/buttons/1advise.gif" alt="Parental Advisory: I say fuck a lot">
        <a href="https://www.mozilla.org/en-US/firefox/"><img src="/img/buttons/firefoxnow.gif" alt="Firefox Now"></a>
        <img src="/img/buttons/1chrome.gif" alt="Google Chrome is Evil">
        <a href="https://debian.org/"><img src="/img/buttons/debian.gif" class="contained-button" alt="Powered by Debian"></a>
        <img src="/img/buttons/bestviewedcomp.gif" alt="Best viewed with a computer">
        <img src="/img/buttons/pdmark.png" class="contained-button" alt="Public domain">
        <a href="https://t.me/iusearchbtw42"><img src="/img/buttons/telegram.png" class="contained-button" alt="Telegram"></a>
        <img src="/img/buttons/gentoo-button.png" class="contained-button" alt="Public domain">
    </div>
</div> 