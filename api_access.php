<!DOCTYPE html>
<html>
<head>
    <title>API Access Page</title>
    <link rel="stylesheet" href="./styles/api-access-styles.css">
</head>
<body>

<div class="container">
    <h1 class="title">KPCollector API Access</h1>
    <!--Select Partner Dropdown Menu-->
    <form id="partner-form">
        <label for="partner-list">Select A Partner</label>
        <select name="partner" id=partner-list>
            <?php
            //Dynamically Generate Partner Choice
            include './api_request.php';
            foreach ($partners as $partnerName => $atmsKey){
                echo "<option value=\"$partnerName\">$partnerName</option>";
            }
            ?>
        </select>
        <input style="display: none" type="submit" value="Submit" onclick="submitForm()">
    </form>
    <!-- Buttons for Each Endpoint -->
    <div class="buttons">
            <button onclick="callAPI('scrapedetails')">Scrape Details</button>
            <button onclick="callAPI('scrapejobs')">Scrape Jobs</button>
            <button onclick="callAPI('scraperesources')">Scrape Resources</button>
            <button onclick="callAPI('scrapecontacts')">Scrape Contacts</button>
    </div>
    <div class="response-container">
        <div id="response">
            <!-- Response from API  -->
        </div>
    </div>
</div>



<script>
    function submitForm() {
        var partnerForm = document.getElementById("partner-form");
        var formData = new FormData(partnerForm);
        fetch("api_request.php", {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => document.getElementById('response').innerText = data)
        .catch(error => console.error('Error:', error));
    }

    function callAPI(endpoint) {
        var selectedPartner = document.getElementById("partner-list").value;
        if (selectedPartner !== ""){
            var formData = new FormData();
            formData.append("partner", selectedPartner);
            formData.append("endpoint", endpoint);
            fetch('api_request.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => document.getElementById('response').innerText = data)
            .catch(error => console.error('Error:', error));
        } else {
            alert("Please select a partner first")
        }
    }

    </script>


</body>
</html>






