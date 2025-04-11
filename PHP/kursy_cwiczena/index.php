<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Kursy walut</h1>
        <?php
            function get_exchange_rate($currency){
            $url = "https://api.nbp.pl/api/exchangerates/rates/a/{$currency}?format=json";
            $json = file_get_contents(($url), TRUE);
            $rate = $data["rates"][0]['mid'];
            return($rate);
        }

        $db = new mysqli("localhost", "root", "", "exchange");
        print_r(get_exchange_rate("eur"));

        $currencies = ["chf", "eur", "usd"];

        foreach($currencies as $curr){
            $value = get_exchange_rate($curr);
            $db -> query("INSERT INTO exchange_rates (currency, rate) VALUES ('$curr', '$value')");
        }
        $currency_codes =  $db->query("SELECT DISTINCT currency_codes FROM exchange_rates")->fetch_all()[1];
        print_r($currency_codes);
        $db->close();
        ?>

        <form>
            <input type="number" id ="currency_value" name = "currency_value" step = "0.01"> 
            <select name="currency_codes" id="currency_codes">
            <?php
                foreach($currency_codes as $code){
                    echo("<option value=\"{$code[1]}\">{$code[0]}</option>");
                }
            ?>
            </select>
            <input type="submit" value="Oblicz" onclick="calculate()">
        </form>

        <div>
            <span id = "#rate"></span>
        </div>
        <script>
            function calculate(){
                let rate = document.querySelector("#currency_code").value;
                let currency_value = document.querySelector("#currency_value").value;
                let  = document.querySelector("#rate").innerText = 'Wartosc przeliczona: ${currency_value * rate}';
            }
        </script>
    </body>
</html>