<?php
include_once '../analytics.php';
include_once '../topbar.php';
include_once '../include.php';
?>

<title>Work | Umer Salman</title>
<div style="text-align: center;">
    <div id="main">
        <?php
        function createWorkItem($imgSrc, $link, $description)
        {
            global $imgSide;
            if ($imgSide === 'left') {
                $imgSide = 'right';
                $imgOppSide = 'left';
            } else {
                $imgSide = 'left';
                $imgOppSide = 'right';
            }
            ?>

            <div class="<?= $imgSide ?>">
                <p style="float: <?= $imgSide ?>"><img src="<?= $imgSrc ?>" class="leftimg" alt="project"></p>
                <p style="float: <?= $imgOppSide ?>"><a href="<?= $link ?>"><?= $description ?></a></p>
            </div>
            <?php
        }

        createWorkItem(
            '/images/source.png',
            'https://apps.microsoft.com/store/detail/simple-source-viewer/9WZDNCRDXGHH',
            'Simple Source Viewer:<br/>
- Lets you see the source code of any public webpage<br/>
- Just type in the URL and hit enter<br/>
- Windows 8, Windows 8.1, and Windows RT<br/>
- Fast, small, simple, and easy');

        createWorkItem(
            '/images/Cygwin.jpg',
            'https://github.com/umer936/CygwinHere',
            'Cygwin Here:<br/>
- Small registry edit to allow opening of Cygwin by right-clicking, <br/>
similar to Shift+RtClick>OpenCommandWindowHere.<br/>
- Windows XP or later<br/>
- 32-bit and 64-bit support');

        createWorkItem(
            'https://commondatastorage.googleapis.com/ingress.com/img/Ingress_logo_512px.png',
            '',
            'Chromecast:<br/>
- Popcorn-Time');

        createWorkItem(
            '/images/ingress.jpg',
            'https://plus.google.com/s/SARDecoders',
            'Ingress:<br/>- RESISTANCE FTW<br/>
            - Currently L7<br/>
            - #SARDecoders');

        createWorkItem(
            '/images/nlogo.png',
            'http://satxresist.com',
            'San Antonio Resistance Website:<br/>
            - My best layout<br/>
            - Tips & tricks for Ingress<br/>
            - Guides to L8 and more<br/>
            - Community roster');

        createWorkItem(
            '/images/ee.png',
            '',
            'Debate:<br/>
- Extemp Engine<br/>
- Debate Record');
//        http://points.speechanddebate.org/points_application/studentprofile.php?id=10230645

        createWorkItem(
            '/images/TNTPUClogo.png',
            'http://totsnteenspediatric.com',
            'Tots N Teens Pediatric Urgent Care:<br/>
- I made the logo (with CJ101)<br/>
- Help out<br/>
- Manage website');

        createWorkItem(
            'https://commondatastorage.googleapis.com/ingress.com/img/Ingress_logo_512px.png',
            '',
            'Android:<br/>
- ROM<br/>
- Multiboot evita');

        createWorkItem(
            'https://commondatastorage.googleapis.com/ingress.com/img/Ingress_logo_512px.png',
            '',
            'Xposed:<br/>
- Super secret module');

        createWorkItem(
            '/images/cube1.png',
            'http://socialcu.be',
            'Socialcu.be:<br/>
- Active Social Networking site');

        createWorkItem(
            '/images/Compass.png',
            '',
            'Compass:<br/>
- Dead Social Networking site by me<br/>
- Best feed design<br/>
- Broke it so I have database room until I find a new host');
        ?>
    </div>
</div>
