<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kursy walut</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Kursy walut</h1>
        <?php
            function get_exchange_rate($currency){
                $url = "https://api.nbp.pl/api/exchangerates/rates/a/{$currency}?format=json";
                $json = file_get_contents($url, TRUE);
                $data = json_decode($json, true);
                $rate = $data["rates"][0]['mid'];
                return $rate;
            }

            $db = new mysqli("localhost", "root", "", "exchange");

            $currencies = ["chf", "eur", "usd"];

            foreach($currencies as $curr){
                $value = get_exchange_rate($curr);
                $db->query("INSERT INTO exchange_rates (currency_code, rate) VALUES ('$curr', '$value')");
            }

            $result = $db->query("SELECT DISTINCT currency_code FROM exchange_rates");
            $currency_codes = $result->fetch_all(MYSQLI_NUM);

            $db->close();
        ?>

        <form method="GET">
            <input type="number" id="currency_value" name="currency_value" step="0.01" placeholder="Kwota w PLN"> 
            <select name="currency_codes" id="currency_codes">
                <?php
                    foreach($currency_codes as $code){
                        echo("<option value=\"{$code[0]}\">{$code[0]}</option>");
                    }
                ?>
            </select>
            <input type="button" value="Oblicz" onclick="calculate()">
        </form>

        <div>
            <span id="rate"></span>
        </div>

        <script>
            async function calculate() {
                let currency = document.querySelector("#currency_codes").value;
                let pln = parseFloat(document.querySelector("#currency_value").value);

                if (!pln || pln <= 0) {
                    document.querySelector("#rate").innerText = "Podaj poprawną kwotę.";
                    return;
                }
                
                let response = await fetch(`https://api.nbp.pl/api/exchangerates/rates/a/${currency}?format=json`);
                let data = await response.json();
                let rate = data.rates[0].mid;

                let result = (pln / rate).toFixed(2);
                document.querySelector("#rate").innerText = `Wartość w ${currency.toUpperCase()}: ${result}`;
            }
        </script>
    </body>
</html>
