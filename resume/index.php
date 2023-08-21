<?php
include_once '../header.php';
?>

<div id="pdf-container">
    <iframe id="pdf-iframe"
            src="2020_Resume.pdf"
            class="w-100"
            style="height: 175vh">
    </iframe>
</div>

<div id="pdf-error-message" class="d-none">
    <p>There was an issue loading the PDF. You can <a href="2020_Resume.pdf">download it here</a>.</p>
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
