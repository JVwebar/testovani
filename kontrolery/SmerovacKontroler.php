<?php

class SmerovacKontroler extends Kontroler
{

    protected $kontroler;

    public function zpracuj($parametry)
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);
        $urlkaArr = [
            "/uvodni-strana" => "homepage",
            "/sluzby-a-cenik"=> "sluzby",
            "/jak-pracuji"   => "lexikon",
            "/reference"     => "reference",
            "/blog"          => "blog",
            "/o-mne"         => "omne",
            "/kontakt"       => "kontakt",
            "/chyba"         => "chyba",
        ];

        $url = $urlkaArr[$parametry[0]];
        if (empty($naparsovanaURL[0]))
        {
            $this->presmeruj('uvodni-strana');
        }
        $tridaKontroleru = $this->pomlckyDoVelbloudiNotace($url) . 'Kontroler';
        if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
        {
            $this->kontroler = new $tridaKontroleru;
        }
        else
        {
            $this->presmeruj('chyba');
        }

        $footerAnchorNone = ["chyba","uvodni-strana","kontakt"];


        $this->kontroler->zpracuj($naparsovanaURL);
        $this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
        $this->data['popis'] = $this->kontroler->hlavicka['popis'];
        $this->data['klicova_slova'] = $this->kontroler->hlavicka['klicova_slova'];
        $this->pohled = 'rozlozeni';
        $this->data['page'] = $naparsovanaURL[0];
        $this->data['zpravy'] = $this->vratZpravy();
        $this->data['nahoru'] = $footerAnchorNone;



    }

    private function parsujURL($url)
    {
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL['path'] = ltrim($naparsovanaURL['path'], "/");
        $naparsovanaURL['path'] = trim($naparsovanaURL['path']);

        $rozdelenaCesta = explode("/", $naparsovanaURL['path']);
        return $rozdelenaCesta;
    }

    private function pomlckyDoVelbloudiNotace($text)
    {
        $veta = str_replace("-", " ", $text);
        $veta = ucwords($veta);
        $veta = str_replace(" ", "", $veta);
        return $veta;
    }
}