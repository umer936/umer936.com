<?php
include_once '../header.php';
$resumePdf = '../resume-cv/Resume.pdf';
?>

<div id="pdf-container">
    <iframe id="pdf-iframe"
            src="<?= htmlspecialchars($resumePdf, ENT_QUOTES) ?>"
            class="w-100"
            style="height: 175vh">
    </iframe>
</div>

<div id="pdf-error-message" class="d-none">
    <p>There was an issue loading the PDF. You can <a href="<?= htmlspecialchars($resumePdf, ENT_QUOTES) ?>">download it here</a>.</p>
</div>

<script>
    const pdfIframe = document.getElementById("pdf-iframe");
    const pdfErrorMessage = document.getElementById("pdf-error-message");

    pdfIframe.addEventListener("load", () => {
        pdfErrorMessage.classList.add("d-none"); // Hide error message if PDF loads
    });

    pdfIframe.addEventListener("error", () => {
        pdfErrorMessage.classList.remove("d-none"); // Show error message if PDF fails to load
        pdfIframe.classList.add("d-none"); // Hide the iframe
    });
</script>

<?php
include_once '../footer.php';
?>
