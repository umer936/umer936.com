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

<div class="container rounded w-75 m-auto" id="contact">
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
                    🖥️ Website
                </span>
                        <br>
                        umer936.com
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">➡️ Send</button>
            </div>
        </div>
    </form>
</div>
