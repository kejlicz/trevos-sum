<?php
// U tohoto příkladui jsem si moc nebyl jistý řešením, tak jsem se pokusil nasimulovat sčítání pod sebe (nebo jak se to jmenuje)
// Pokud jsou vstupní čísla mimo rozsah běžných datových typů, je třeba zadávat jako string

echo summationBigNumbers(1500,"484" );

function summationBigNumbers(string $a, string $b)
{
    if(!is_numeric($a))
    {
        throw new Exception("První vstup není číslo");
    }

    if(!is_numeric($b))
    {
        throw new Exception("Druhý vstup není číslo");
    }

    $sum = "";
    $aString = (string)$a;
    $bString = (string)$b;

    $aReversedString = strrev($aString);
    $bReversedString = strrev($bString);

    if (strlen($aReversedString) >= strlen($bReversedString)) {
        $iterator = strlen($aReversedString);
    } else {
        $iterator = strlen($bReversedString);
    }

    $add = 0;
    for ($i = 0; $i < $iterator; $i++) {

        if(isset($aReversedString[$i]) && isset($bReversedString[$i]))
        {
            $temp =  $aReversedString[$i] + $bReversedString[$i] + $add;
        }elseif (!isset($bReversedString[$i]))
        {
            $temp =  $aReversedString[$i] + $add;
        }else
        {
            $temp =  $bReversedString[$i] + $add;
        }

        if ($temp > 9) {
            $temp = $temp % 10;
            $add = 1;
        } else {
            $add = 0;
        }
        $sum = $sum . $temp;
    }

    if($add > 0)
    {
        $sum = $sum . $add;
    }

    return strrev($sum);
}
