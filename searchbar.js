
        // Function to start voice search
        function startVoiceSearch() {
            const recognition = new webkitSpeechRecognition();
            recognition.lang = 'en-US';
            recognition.start();

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                document.getElementById('searchInput').value = transcript;
                performSearch(transcript);
            };
        }

        

        

        // Function to start image search
        function startImageSearch(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imageData = e.target.result;
                performImageSearch(imageData);
            };

            reader.readAsDataURL(file);
        }

        function performImageSearch(imageData) {
    gapi.load('client', () => {
        gapi.client.init({
            apiKey: 'AIzaSyBy7BBULtWvrA8A89XyItUyH1_A6Zq63Fs'
        }).then(() => {
            // Load the vision API library explicitly
            gapi.client.load('vision', 'v1', () => {
                const base64Data = imageData.replace(/^data:image\/(png|jpeg);base64,/, '');
                const request = {
                    requests: [
                        {
                            image: {
                                content: base64Data
                            },
                            features: [
                                {
                                    type: 'TEXT_DETECTION'
                                }
                            ]
                        }
                    ]
                };

                gapi.client.vision.images.annotate(request)
                    .then((response) => {
                        const extractedText = response.result.responses[0].fullTextAnnotation.text;
                        document.getElementById('extractedText').textContent = "Extracted Text: " + extractedText;
                        performSearch(extractedText);
                    })
                    .catch((error) => {
                        console.error('Error processing image:', error);
                    });
            });
        });
    });
}