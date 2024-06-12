<?php
// Funkcija za dohvaćanje trenutne vremenske prognoze
function getCurrentWeather() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && $data['cod'] == 200) {
        // Izvlačenje relevantnih podataka
        $weather = $data['weather'][0]['description'];

        // Formatiranje rezultata
        $result = "Vrijeme: $weather";
        return $result;
    } else {
        return "Nije moguće dohvatiti vremenske podatke za $city.";
    }
}
//Funkcija za dohvaćanje vlažnosti
function getHumidity() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && $data['cod'] == 200) {
        // Izvlačenje podataka o vlažnosti
        $humidity = $data['main']['humidity'];
        
        // Formatiranje rezultata
        $result = "Vlažnost: $humidity%";
        return $result;
    } else {
        return "Vlažnost nije dostupna.";
    }
}
// Funkcija za dohvaćanje temperature
function getTemperature() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && $data['cod'] == 200) {
        // Izvlačenje podataka o temperaturi
        $temperature = $data['main']['temp'];
        
        // Formatiranje rezultata
        $result = "Temperatura: $temperature °C";
        return $result;
    } else {
        return "Temperatura nije dostupna.";
    }
}

// Funkcija za dohvaćanje brzine vjetra
function getWindSpeed() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && $data['cod'] == 200) {
        // Izvlačenje podataka o brzini vjetra
        $windSpeed = $data['wind']['speed'];
        
        // Formatiranje rezultata
        $result = "Brzina vjetra: $windSpeed m/s";
        return $result;
    } else {
        return "Brzina vjetra nije dostupna.";
    }
}

// Funkcija za dohvaćanje tlaka zraka
function getPressure() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && $data['cod'] == 200) {
        // Izvlačenje podataka o tlaku zraka
        $pressure = $data['main']['pressure'];
        
        // Formatiranje rezultata
        $result = "Tlak zraka: $pressure hPa";
        return $result;
    } else {
        return "Tlak zraka nije dostupan.";
    }
}

// Funkcija za dohvaćanje UV indeksa
function getUVIndex() {
    $apiKey = 'a42286b9483e0e729cef81a906a48686'; // API Key
    $city = 'Zagreb';
    $apiUrl = "http://api.openweathermap.org/data/2.5/uvi?lat=45.8150&lon=15.9819&appid=$apiKey";

    // Dohvaćanje podataka iz API-ja
    $response = file_get_contents($apiUrl);

    // Dekodiranje JSON odgovora
    $data = json_decode($response, true);

    // Provjera jesu li podaci uspješno dohvaćeni
    if ($data && isset($data['value'])) {
        // Izvlačenje podataka o UV indeksu
        $uvIndex = $data['value'];
        
        // Formatiranje rezultata
        $result = "UV indeks: $uvIndex";
        return $result;
    } else {
        return "UV indeks nije dostupan.";
    }
}

// Poziv funkcija za dohvaćanje podataka
$currentWeather = getCurrentWeather();
$temperature = getTemperature();
$humidity = getHumidity();
$windSpeed = getWindSpeed();
$pressure = getPressure();
$uvIndex = getUVIndex();
?>

<!-- Prikaz vremenskih podataka na stranici -->
<h1>Trenutno vrijeme u Zagrebu</h1>
<table class="weather-table">
    <tr><td><?php echo $currentWeather; ?></td></tr>
    <tr><td><?php echo $temperature; ?></td></tr>
    <tr><td><?php echo $humidity; ?></td></tr>
    <tr><td><?php echo $windSpeed; ?></td></tr>
    <tr><td><?php echo $pressure; ?></td></tr>
    <tr><td><?php echo $uvIndex; ?></td></tr>
</table>
