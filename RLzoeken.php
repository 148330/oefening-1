<?php
 
include_once "nietMeerOpGrid.php";
foreach($woorden as $w) 
{
    RLzoeken($ruweWoordzoeker, $w);
}
    function RLzoeken(Array $ruweWoordzoeker, $w) 
        {
        global $classInformatie;
        $woordArray = str_split(trim($w));
        foreach($ruweWoordzoeker as $x => $rij) 
            {
            foreach($rij as $y => $letter) 
                {
                if ($letter == $woordArray[0]) 
                    {
                    if (isHetRLwoordDaar($x, $y, $ruweWoordzoeker, $woordArray)) 
                        {
                        foreach($woordArray as $k => $letter)
                            {
                            $classInformatie[$x][$y - $k][] = $w;
                            }
                        }
                    }
                }
            }        
        } 
    function isHetRLwoordDaar($x, $y, $ruweWoordzoeker, $woordArray) 
        {
            foreach($woordArray as $k => $letter) 
                {
                if (nietMeerOpGrid($ruweWoordzoeker, $x, $y - $k)) 
                    {
                    return false;
                    }
                if ($letter != $ruweWoordzoeker[$x][$y-$k])
                    return false;
                }
            return true;
        }