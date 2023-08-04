<?php
$partners = array(
    "Danville Community College" => "6270eaa2-0345-4805-8332-4c3abfae587d",
    "Job Corp" => "aec4d986-89ae-4537-902d-0bbe6a92da74",
    "Danville Police Department" => "6270eaa2-0345-4805-8332-4c3abfae587d",
    "Anthem Insurance aka Elevance Health" => "d810ff78-d587-486e-ad69-c2b1d0903889",
    "The Institute for Advanced Learning and Research" => "95a75e75-d77d-4cc8-b287-e7966df3fd1c"
);

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    if (isset($_GET["partner"])) {
        $selectedPartner = $_GET["partner"];
        if (array_key_exists($selectedPartner, $partners)) {
            $atmsKey = $partners[$selectedPartner];
            $apiEndpoint = "https://localhost:3000/scraping/scrapedetails/{$atmsKey}";

            //code to makae API Request using endpoint
            echo $apiEndpoint;
        
        } else {
            echo "Invalid partner selection.";
        }
    } else {
        echo "No partner selected.";
    }
}

?>