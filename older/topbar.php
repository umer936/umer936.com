<div id="top">
    <?php
    $cur_dir = explode('\\', getcwd());
    $dir = basename(end($cur_dir));
    $homeActive = "";
    $stuffActive = "";
    $blogActive = "";
    $aboutActive = "";

    if ($dir === "stuff") {
        $stuffActive = "active";
    } elseif ($dir === "blog") {
        $blogActive = "active";
    } elseif ($dir === "about") {
        $aboutActive = "active";
    } else {
        $homeActive = "active";
    }
    ?>

    <a href="/">
        <img src="/images/logoh.png" width="48" height="48" alt="umer936 Logo">
        <div id="name">
            Umer Salman
            <br/>
            Umer936
        </div>
    </a>

    <div class="nav-bar" id="nav">
        <a class="<?= $homeActive ?>" href="/older/">Home</a> |
        <a class="<?= $stuffActive ?>" href="/older/stuff">What I do</a> |
        <a class="<?= $blogActive ?>" href="/older/blog">How I do it</a> |
        <a class="<?= $aboutActive ?>" href="/older/about">About Me</a>
    </div>

    <phonenav>
        <ul>
            <li id="phonenav"><a href="#">&#9776; Menu</a>
                <ul id="actualphonenav">
                    <li><a class="<?= $homeActive ?>" href="/older/">Home</a></li>
                    <li><a class="<?= $stuffActive ?>" href="/older/stuff">What I do</a></li>
                    <li><a class="<?= $blogActive ?>" href="/older/blog">How I do it</a></li>
                    <li><a class="<?= $aboutActive ?>" href="/older/about">About Me</a></li>
                </ul>
            </li>
        </ul>
    </phonenav>
</div>

<footer>
    ©2014-2023 Umer Salman. Last updated: 06/15/2023 |
    <a href="javascript:alert('Privacy is dead');">Privacy Policy</a>
    <span
        id="destroy"
        onclick="
        var KICKASSVERSION='2.0';var s = document.createElement('script');
        s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';
        void(0);">
        Destroy this page
    </span>
</footer>

