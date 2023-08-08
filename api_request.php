<?php
$partners = array(
    "Danville Community College" => "7d3eb95f-0238-43b8-9027-7856f16b610c",
    "Job Corp" => "aec4d986-89ae-4537-902d-0bbe6a92da74",
    "Danville Police Department" => "6270eaa2-0345-4805-8332-4c3abfae587d",
    "Anthem Insurance aka Elevance Health" => "d810ff78-d587-486e-ad69-c2b1d0903889",
    "The Institute for Advanced Learning and Research" => "95a75e75-d77d-4cc8-b287-e7966df3fd1c"
);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST["partner"])) {
        $selectedPartner = $_POST["partner"];
        if (array_key_exists($selectedPartner, $partners)) {
            $atmsKey = $partners[$selectedPartner];

            if (isset($_POST["endpoint"])) {
                $endpoint = $_POST["endpoint"];
                switch($endpoint) {
                    case "scrapedetails":
                        $apiEndpoint = "http://localhost:3000/scraping/scrapedetails/{$atmsKey}";
                        break;
                    case "scrapejobs":
                        $apiEndpoint = "http://localhost:3000/scraping/scrapejobs/{$atmsKey}";
                        break;
                    case "scraperesources":
                        $apiEndpoint = "http://localhost:3000/scraping/scraperesources/{$atmsKey}";
                        break;
                    case "scrapecontacts":
                        $apiEndpoint = "http://localhost:3000/scraping/scrapecontacts/{$atmsKey}";
                        break;
                    default:
                        echo "Invalid Endpoint Selection";
                        exit;
                }

                echo "API Endpoint: " . $apiEndpoint;
                //Make API Request to Endpoint
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                echo $response;
                

            } else {
                echo "No Endpoint Selected.";
            }
        } else {
            echo "Invalid partner selection.";
        }
    } else {
        echo "No partner selected.";
    }
}

?>