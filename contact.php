<?php
$successMsg = "Your message has been sent successfully!";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $firstName = $_POST["firstNameInput"];
    $lastName = $_POST["lastNameInput"];
    $email = $_POST["emailInput"];
    $comments = $_POST["commentsInput"];

    // Validate form data (you should add more validation)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($comments)) {
        $message = "Please fill out all fields.";
    } else {
        $subject = "Contact Form Submission from $firstName $lastName";
        $message = "Name: $firstName $lastName\n";
        $message .= "Email: $email\n";
        $message .= "Comments:\n$comments";

        $to = "umer936@gmail.com";

        // Send the email
        if (mail($to, $subject, $message)) {
            $message = $successMsg;
        } else {
            $message = "Sorry, there was an error sending your message.";
        }
    }
}
?>

<div class="container rounded w-75 m-auto text-break" id="contact">
    <?php if (isset($message)) { ?>
        <div class="alert <?= ($message === $successMsg) ? 'alert-success' : 'alert-danger' ?>">
            <?= $message ?>
        </div>
    <?php } ?>
    <form action="/#contact" method="post">
        <div class="row p-3">
            <div class="col-md-8 ps-0">
                <div class="row g-2 mb-3 pt-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input class="form-control" id="firstNameInput"
                                   name="firstNameInput" placeholder="First name">
                            <label for="firstNameInput">First name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input class="form-control" id="lastNameInput"
                                   name="lastNameInput" placeholder="Last name">
                            <label for="lastNameInput">Last name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="emailInput"
                           name="emailInput" placeholder="Email address">
                    <label for="emailInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="commentsInput"
                          name="commentsInput"
                          style="height: 120px"></textarea>
                    <label for="commentsInput">Comments</label>
                </div>

            </div>
            <div class="col-md-4 my-3">
                <div class="border rounded py-4 px-3 mb-2">
                    <div class="pb-2">
                <span class="text-uppercase">
                    ✉ Email Address
                </span>
                        <br>
                        umer936@umer936.com
                    </div>

                    <div class="py-2">
                <span class="text-uppercase">
                    📱 Phone Number
                </span>
                        <br>
                        +1 (936) 463-8626
                    </div>

                    <div class="pt-2">
                        <span class="text-uppercase">
                            🖥️ Find Me
                        </span>
                        <br>
                        <div class="row">

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://instagram.com/umer936?ref=badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/132px-Instagram_logo_2016.svg.png"
                                         alt="Instagram" class="img-fluid"></a>
                            </div>

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://stackoverflow.com/users/2646359/umer936">
                                    <img src="https://www.vectorlogo.zone/logos/stackoverflow/stackoverflow-icon.svg"
                                         alt="Stack Overflow" class="img-fluid"></a>
                            </div>

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://7cupsoftea.com/@umer936/">
                                    <img src="https://d37v7cqg82mgxu.cloudfront.net/img/link-to-us/square/7cups-logo-text-tile.png"
                                         alt="7 Cups of Tea" class="img-fluid"></a>
                            </div>

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://www.reddit.com/user/Umer936/">
                                    <img src="https://upload.wikimedia.org/wikipedia/en/b/bd/Reddit_Logo_Icon.svg" alt="Reddit"
                                         class="img-fluid"></a>
                            </div>

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://github.com/umer936">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/240px-GitHub_Invertocat_Logo.svg.png"
                                         alt="GitHub" class="img-fluid"></a>
                            </div>

                            <div class="col-xxs-2 col-3 col-sm-2 col-md-4 col-lg-3 col-xl-2">
                                <a href="https://socialcu.be/@umer936">
                                    <img src="https://socialcu.be/Images/cube_icon_web_min.svg" alt="SocialCube"
                                         class="img-fluid"></a>
                            </div>

                        </div>
                    </div>
                </div>
                <button class="btn btn-site" type="submit">➡️ Send</button>
            </div>
        </div>
    </form>
</div>
