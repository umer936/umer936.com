<!DOCTYPE html>
<link rel="manifest" href="manifest.json"/>
<?php
if (isset($_POST['action'])) {
    $to = "umer936@gmail.com";
    $from = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    // $subject2 = "Copy of your form submission";
    $message = "$first_name $last_name : {$_POST['email']} wrote the following:\n\n{$_POST['message']}";
    // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "<script>alert('Message Sent. Thank you $first_name');</script>";
    $_POST = [];
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Umer Salman</title>
    <meta name="description" content="Umer Salman">
    <meta name="author" content="umer936">

    <link rel="stylesheet" href="css/main.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Roboto:100,300,400,500,700" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.0/dist/css/materialize.min.css"
          integrity="sha256-hIo0cjpRd79soLFBo6oeHV99lpzRiZk0/awwi3XhXI0="
          crossorigin="anonymous">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body class="color1">

<div class="row" id="navbar">
    <div class="col s12 z-depth-2">
        <ul class="tabs">
            <li class="tab col s1"></li>
            <li class="tab col s2"><a href="#home">Home</a></li>
            <li class="tab col s2"><a href="#about">About</a></li>
            <li class="tab col s2"><a href="#work">Work</a></li>
            <li class="tab col s2"><a href="#blog">Blog</a></li>
            <li class="tab col s2"><a href="#contact">Contact</a></li>
            <li class="tab col s1"></li>
        </ul>
    </div>
</div>

<div id="home" class="col s12 scrollspy">
    <div class="intro blue lighten-2 z-depth-1 center">
        <h1 class="grey-text text-lighten-5">Umer Salman</h1>
        <h2 class="grey-text text-lighten-5">umer936</h2>
        <h5 class="grey-text text-darken-1">coder. programmer. designer.</h5>
        <hr>
        <span id="wordsforcoloring">
		  Too bright for your eyes?
		  </span>
        <br/>
        <a class="waves-effect waves-light black btn hoverable" id="themeswitcher">Make it
            <span id="colorword">dark</span></a>
    </div>
</div>
<div id="about" class="col s12 scrollspy">
    <div class="container about center">
        <h5>about me</h5>
        <hr class="small-hr">
        <div class="row">
            <div class="col s12 m4 l4">
                <h6>Me</h6>
                <p>I've done quite a few things! Check out my <a
                            href="https://raw.githubusercontent.com/umer936/My-CV/master/output_pdfs/2020_Resume.pdf">résumé</a>
                    and my <a href="https://github.com/umer936">GitHub</a> to see what I've been up to! </p>
            </div>
            <div class="col s12 m4 l4">
                <h6>Profile</h6>
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">
                        <img src="/images/logoh.png" width="64" height="64" alt="my logo">
                        <p>Find me online @</p>
                    </div>
                    <div class="card-action">
                        <a href="https://google.com/+UmerSalman">Google+</a>
                        <a href="https://instagram.com/umer936?ref=badge">Instagram</a>
                        <a href="https://github.com/umer936">GitHub</a>
                        <a href="https://facebook.com/umer936">Facebook</a>
                        <a href="https://reddit.com/u/Umer936/">Reddit</a>
                        <a href="https://forum.xda-developers.com/member.php?u=4704799">XDA Developers</a>
                        <a href="https://socialcu.be/@umer936">Socialcu.be</a>
                        <a href="https://7cupsoftea.com/@umer936/">7 Cups of Tea</a>
                        <a href="https://twitter.com/umer936">Twitter</a>
                        <a href="https://stackoverflow.com/users/2646359/umer936">StackOverflow</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <h6>works in progress</h6>
                <ul class="collapsible">
                    <li class="active">
                        <div class="collapsible-header"><i class="md-dark material-icons">web</i>Designer</div>
                        <div class="collapsible-body"><p>Well I'm always working on this website. Also check out
                                <a href="https://satxresist.com">SATXResist.com</a></p></div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="md-dark material-icons">format_align_justify</i>Developer
                        </div>
                        <div class="collapsible-body"><p>I should probably put stuff here.</p></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="work" class="col s12 scrollspy">
    <div class="container portfolio">
        <h5 class="center">portfolio</h5>
        <h6 class="center">FINISHED PROJECTS</h6>
        <hr class="small-hr">
        <div class="row">
            <div class="col s12 m12 l12 portfolio-holder">
                <div class="col s3">
                    <div class="card sticky-action">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="https://umer936.com/images/source.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 left-align">Simple Source Viewer
                                <i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-action left-align">
                            <a href="http://apps.microsoft.com/windows/en-us/app/simple-source-viewer/6722f6a7-bb5c-46f5-aa1f-92f673e95c6b">Link
                                to webstore</a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 left-align">Simple Source Viewer
                                <i class="material-icons right">close</i></span>
                            <p>
                            <ul class="left-align">
                                <li>Lets you see the source code of any public webpage</li>
                                <li>Just type in the URL and hit enter</li>
                                <li>Windows 8, Windows 8.1, and Windows RT</li>
                                <li>Fast, small, simple, and easy</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card sticky-action">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://umer936.com/images/Cygwin.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 left-align">Cygwin Here
                                <i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-action left-align">
                            <a href="https://github.com/umer936/CygwinHere">Link to GitHub</a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 left-align">Cygwin Here
                                <i class="material-icons right">close</i></span>
                            <p>
                            <ul class="left-align">
                                <li>Small registry edit to allow opening of Cygwin by right clicking, similar to Shift +
                                    RtClick &gt; Open Command Window Here
                                </li>
                                <li>Windows XP or later</li>
                                <li>32-bit and 64-bit support</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col s3">
                    <div class="card sticky-action">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://umer936.com/images/nlogo.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 left-align">SATXResist Website
                                <i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-action left-align">
                            <a href="http://satxresist.com/">Link to website</a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 left-align">SATXResist Website
                                <i class="material-icons right">close</i></span>
                            <p>
                            <ul class="left-align">
                                <li>Ingress tips and tricks</li>
                                <li>Community roster</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col s3">
                    <div class="card sticky-action">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://umer936.com/images/TNTPUClogo.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 left-align">Designed logo
                                <i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-action left-align">
                            <a href="http://totsnteenspediatric.com/">Link to website</a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 left-align">Designed logo
                                <i class="material-icons right">close</i></span>
                            <p>
                            <ul class="left-align">
                                <li>Designed logo for Tots N Teens Pediatric Urgent Care (helped by CJ101)</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col s3">
                    <div class="card sticky-action">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://umer936.com/images/Compass.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 left-align">Social Network Website
                                <i class="material-icons right">more_vert</i></span>
                        </div>
                        <!-- <div class="card-action left-align">
                            <a href="/compass">Link to website</a>
                        </div> -->
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 left-align">Social Network Website
                                <i class="material-icons right">close</i></span>
                            <p>
                            <ul class="left-align">
                                <li>Dead social network created by me</li>
                                <li>Currently disconnected from database</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blog" class="col s12 scrollspy">
    <div class="container blog">
        <h5 class="center">blog</h5>
        <hr class="small-hr">
        <div class="row">
            <?php include '../markdown-blog/postListRenderer.php'; ?>
        </div>
    </div>
</div>
<div id="contact" class="col s12 scrollspy">
    <div class="container contact">
        <h5 class="center">contact</h5>
        <h6 class="center">find me</h6>
        <hr class="small-hr">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="row">
                    <form method="POST" id="contact" class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" name="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" name="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                                <span class="helper-text" data-error="Enter a valid email"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="emailmessage" class="materialize-textarea" name="message"
                                          required></textarea>
                                <label for="emailmessage">Your Message</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" value="submit" name="action">Submit
                            <i class="md-dark material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col s12 m6 l6 contact-holder">
                <h6><i class="md-dark material-icons">email</i> Email Address</h6>
                <p>umer936@umer936.com</p>
                <h6><i class="md-dark material-icons">phone_android</i> Phone Number</h6>
                <p>+1 (936) 463-8626</p>
                <h6><i class="md-dark material-icons">open_in_browser</i> Website</h6>
                <p>umer936.com</p>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-copyright">
        <div class="container">
            © 2015-2023 Umer936
            <span class="right"><a href="javascript:alert('Privacy is dead');">Privacy Policy</a></span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.0/dist/js/materialize.min.js"
        integrity="sha256-7QGNN7G3vdWisSp/mwyH3+F5CYkrwRN1GDq0bc0s2s4="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/main.min.js"></script>

</body>
</html>
