<?php

namespace zkracovacURL;

//config
define('website_name', '<span class="font-weight-normal" style="font-weight:100">caffey</span><span class="font-weight-bolder">.cz</span>');
define('website_url', 'https://caffey.cz');
define('website_description', 'Zkracovač URL adres, který vám umožní zkracovat URL adresy a sdílet je s ostatními.');
define('website_keywords', 'My, Website, Keywords');
define('website_author', 'Filip Skerik');
define('website_email', '<a href="https://skerik.me" class="text-dark">info@<span class="font-weight-bold">skerik.me</span></a>');

// class init
$zkracovac = new ZkracovacURL();

//init proměnné
$zkracovac->nazevSouboru = "zkracene.txt";

//init shortener
$zkracovac->shortener();

class ZkracovacURL
{
    public $nazevSouboru;

    //shortener
    public function shortener()
    {
        $this->welcome(website_name);
        $this->aktualniUrl();
        $this->footer();
    }

    //welcome
    public function welcome($nazevStranky)
    {
        //echo "<h1>" . $nazevStranky . "</h1>";
        $this->vytvoreniSouboru($this->nazevSouboru);
    }

    //website footer - info
    public function footer()
    {
        echo "<hr>";
        echo "<p class='text-center'>" . website_name . " - " . website_description . "</p>";
        echo "<p class='text-center'>Created by <a href='https://skerik.me' target='_blank' class='text-danger'>Filip Skerik</a></p>";
    }

    //vrátí aktuální url webu
    public function aktualniUrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace(website_url . "/", "", $url);
        $url = str_replace("/", "", $url);
        if (strlen($url) > 0) {
            //echo $url;
            $this->ziskatUrlZeSouboru($this->nazevSouboru, $url);
        } else {
            $this->zkratitUrlForm();
        }
    }

    //form na zkrácení URL
    public function zkratitUrlForm()
    {
        if (isset($_POST['zkratit'])) {
            $this->zkratitUrl($_POST['url']);
        } else {
            //form
            echo "<form method=\"post\" class='my-5'>
            <div class=\"mb-3\">
                <label for=\"url\" class=\"form-label\">Vložte dlouhou URL adresu pro zkrácení</label>
                <input type=\"url\" class=\"form-control form-control-lg\" name=\"url\" id=\"url\" aria-describedby=\"helpId\" placeholder=\"https://\" autofocus required>
                <small id=\"helpId\" class=\"form-text text-muted\">Po vložení bude vygenerován zkrácený tvar adresy.</small>
            </div>
            <input type='submit' name='zkratit' value='Zkrátit URL Adresu' class='btn btn-dark'>
            </form>";
        }
    }

    //zkrácení url - server
    public function zkratitUrl($url)
    {
        $novaUrl = $this->vygenerovatUrl();
        $this->zapsatDoSouboru($this->nazevSouboru, $url, $novaUrl);
        //echo "        <p>URL zkrácena na: <a href=\"" . website_url . "/" . $novaUrl . "\">" . website_url . "/" . $novaUrl . "</a></p>";
        echo "
        <input type=\"text\" value=\"" . website_url . "/" . $novaUrl . "\" id=\"myInput\" class='form-control form-control-lg mt-4'>
        <button onclick=\"myFunction()\" class=\"btn btn-lg btn-dark form-control my-3\">Kopírovat URL</button>
        <p><a href='" . website_url . "'>Zkrátit další URL</a></p>";
    }



    //funkce pro generování URL
    public function vygenerovatUrl()
    {
        $znaky = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $url = "";
        for ($i = 0; $i < 5; $i++) {
            $url .= $znaky[rand(0, strlen($znaky) - 1)];
        }
        return $url;
    }

    //if there is string in end of url, get it from file and redirect to it
    public function ziskatUrlZeSouboru($nazevSouboru, $url)
    {
        $soubor = fopen($nazevSouboru, "r");
        while (!feof($soubor)) {
            $radek = fgets($soubor);
            $radek = explode(",", $radek);
            if (!empty($radek[0]) && !empty($radek[1])) {
                //if $radek[1] contains $url then redirect to $radek[0]
                if (strpos($radek[1], $url) !== false) {
                    echo "<p class='lead font-weight-bold py-4'>Budete přesměrován/a na: <a href='" . $radek[0] . "'>" . substr($radek[0], 0, 40) . "...</a></p>";
                    echo "
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            window.location.href = '" . $radek[0] . "';
                        }, 3000);
                    });
                    </script>
                    ";
                }
            }
        }
        fclose($soubor);
    }


    //funkce pro zápis do souboru
    public function zapsatDoSouboru($nazevSouboru, $obsah, $novaUrl)
    {
        file_put_contents($nazevSouboru,  $obsah . "," . $novaUrl . "\n", FILE_APPEND);
    }

    //funkce pro vytvoření souboru
    public function vytvoreniSouboru($nazevSouboru)
    {
        if (!file_exists($nazevSouboru)) {
            $vytvorenySoubor = fopen($nazevSouboru, "wb");
            fwrite($vytvorenySoubor, "URL,zkraceny_link" . PHP_EOL);
            fclose($vytvorenySoubor);
            chmod($nazevSouboru, 0777);
        }
    }
}
