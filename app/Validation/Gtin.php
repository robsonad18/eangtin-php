<?php 

namespace App\Validation;

/**
 * Responsavel por validar gtin de 13 digitos
 */
class Gtin
{
    /**
     * Metodo responsavel por verificar se um codigo gtin é valido
     *
     * @param string $gtin
     * @return boolean
     */
    public static function isValid(string $gtin):bool
    {
        // obtem apenas os numeros do codigo gtin
        $gtin = preg_replace("/\D/","", $gtin);

        if (strlen($gtin) != 13) return false;

        // digito verificador
        $gtinValidation = substr($gtin, 0, 12);
        $gtinValidation .= self::getDigit($gtinValidation);

        return $gtinValidation == $gtin;
    }



    /**
     * Metodo responsavel por calcular o digito verificador de um codigo GTIN de 13 digitos
     *
     * @param string $base
     * @return integer
     */
    public static function getDigit(string $base):int
    {
        $sum = 0;

        for($i = 0; $i < strlen($base); $i++)
        {
            $sum += ($i % 2 == 0) ? $base[$i] : ($base[$i] * 3);
        }
        // busca digito verificador
        for($i = 0; $i <= 9; $i++)
        {
            if (($sum + $i) % 10 == 0) return $i;
        }

    }

}