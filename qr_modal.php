<!-- HTML5 - QRCODE API -->
<script src="scripts/html5-qrcode.js"></script>

<div id="qrModal">
    <div class="qr-scanner-header">
        <h8 class="qrModalLabel">Student ID QR Scanner</h8>
    </div>
    <div class="qr-scanner-body">
        <!-- Div to show the QR code scanner -->
        <div id="qr-reader" style="width:100%"></div>
        <div id="qr-reader-results"></div>
    </div>
</div>

<!-- JS Script for QR Input Handling -->
<script>
var html5QrcodeScanner = null;

document.addEventListener("DOMContentLoaded", function() {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;

    function onScanSuccess(decodedText, decodedResult) {
      if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;

        // Fill the form with the scanned data.
        document.getElementById('employee').value = decodedText;
        console.log(`Scan result DECODED TEXT IF LOOP ${decodedText}`, decodedResult);
      }
    }

    // Initialize the scanner when the DOM is ready
    if (html5QrcodeScanner === null) {
        html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 32, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    }
})
</script>