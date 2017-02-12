<?php


class OmneKontroler extends Kontroler
{

    function zpracuj($parametry)
    {
        $this->pohled="veznikuvPribeh";
        $this->hlavicka['titulek'] = "Moje cesta ke copywritingu | Kouzlím (se) slovy";
        $this->hlavicka['popis'] = "Jak jsem se dostal ke copywritingu? Klikatě. Ale
                                    kvalitní četba, zapálené psaní, tvorba webů a proud myšlenek při
                                     běhání mě k psaní textů, které prodávají, nakonec přivedly.";
    }
}