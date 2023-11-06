<!-- HTML5 - QRCODE API -->
<script src="https://unpkg.com/html5-qrcode"></script>

<!-- MODAL -->
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">QR Scanner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Div to show the QR code scanner -->
                <div id="qr-reader" style="width:100%"></div>
                <div id="qr-reader-results"></div>
            </div>
        </div>
    </div>
</div>

<!-- JS Script for QR Input Handling -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;

    function onScanSuccess(decodedText, decodedResult) {
      if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        console.log(`Scan result AFTER IF LOOP ${decodedText}`, decodedResult)

        // Fill the form with the scanned data.
        document.getElementById('employee').value = decodedText;
        console.log(`Scan result DECODED TEXT IF LOOP ${decodedText}`, decodedResult);
      }
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
      "qr-reader", { fps: 32, qrbox: 250 }
    );

    $('#qrModal').on('shown.bs.modal', function () {
      html5QrcodeScanner.render(onScanSuccess);
    });
})
</script>
</body>
</html>