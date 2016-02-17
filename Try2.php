<?php
   $woordzoeker = [
    	['a', 'd', 'd', 'd', 'd', 'd', 'd', 'p', 'd'],
    	['d', 'a', 'd', 'd', 'd', 'd', 'd', 'a', 'd'],
    	['d', 'd', 'n', 'd', 'd', 'd', 'd', 'n', 'd'],
    	['d', 'd', 'd', 'b', 'd', 'd', 'd', 'd', 'd'],
    	['d', 'd', 'd', 'd', 'a', 'd', 'd', 'd', 'd'],
    	['d', 'd', 'd', 'd', 'b', 'k', 'd', 'd', 'd'],
    ];
    $words = [
        "aanbak",
        "pan"
    ];
    $xPos = 0;
    $yPos = 0;
    $wordPos = 0;
    foreach($woordzoeker as $line){
        foreach($line as $char){
            if(checkLetter($char, $wordPos, $words)){
                echo "$char at $xPos, $yPos; start word search\n";
                searchNeighBors($xPos, $yPos, $woordzoeker);
            }
            $yPos = $yPos + 1;
        }
        $xPos = $xPos + 1;
    }
    
    function searchNeighbors($xPos, $yPos, $woordzoeker){
        $neighbors = [
            [$xPos - 1  ,   $yPos + 0],    
            [$xPos - 1  ,   $yPos + 1],    
            [$xPos + 0  ,   $yPos + 1],   
            [$xPos + 1  ,   $yPos + 1],
            [$xPos + 1  ,   $yPos + 0],
            [$xPos + 1  ,   $yPos - 1],
            [$xPos + 0  ,   $yPos - 1],
            [$xPos - 1  ,   $yPos - 1],
        ];
        foreach($neighbors as $coords){
            $coordX = $coords[0];
            $coordY = $coords[1];
            if(isset($woordzoeker[$coordX][$coordY])){
                $letter = $woordzoeker[$coordX][$coordY];
                echo"$coordX, $coordY is $letter\n";
            }
        }
    }
    
    function checkLetter($char, $position, $words){
        foreach($words as $word){
            if($char == $word[$position]){
                return true;
            }
        }
        return false;
    }
?>