<!DOCTYPE html>
<html>
<head>
    <title>API Access Page</title>
</head>
<body>
    <h1>KPCollector API Access</h1>
    <form action="api_request.php" method="get">
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
        <input type="submit" value="Submit">
    </form>
</body>
</html>






