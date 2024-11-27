<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerprint Capture</title>
</head>
<body>
    <h1>Fingerprint Capture</h1>
    <button id="capture-fingerprint">Capture Fingerprint</button>
    <canvas id="fingerprint-canvas" width="300" height="400" style="border: 1px solid #000;"></canvas>
    <form id="fingerprint-form" method="POST" >
        <input type="hidden" id="fingerprint-data" name="fingerprint_data">
        <input type="text" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken')?>">

        <button type="submit">Submit Fingerprint</button>
    </form>

    <script>
        const canvas = document.getElementById('fingerprint-canvas');
        const context = canvas.getContext('2d');
        const fingerprintDataInput = document.getElementById('fingerprint-data');
        const captureButton = document.getElementById('capture-fingerprint');

        captureButton.addEventListener('click', async () => {
            try {
                // Example: Using an API provided by the fingerprint scanner SDK
                const fingerprintImage = await captureFingerprintImage(); // This is a placeholder

                // Render fingerprint image to the canvas
                const image = new Image();
                image.onload = () => {
                    context.drawImage(image, 0, 0, canvas.width, canvas.height);
                };
                image.src = `data:image/png;base64,${fingerprintImage}`;

                // Send fingerprint image data to the server
                fingerprintDataInput.value = fingerprintImage;
            } catch (err) {
                console.error("Fingerprint capture failed:", err);
            }
        });

        // Placeholder function to simulate fingerprint capture
        async function captureFingerprintImage() {
            // This function should interact with the fingerprint scanner SDK
            // Replace with the actual function call to your fingerprint device API
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    // Simulated Base64 image (replace with actual data from the device)
                    resolve('BASE64_ENCODED_FINGERPRINT_IMAGE');
                }, 1000);
            });
        }
    </script>
</body>
</html>
