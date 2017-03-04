<?php
/**
 * Função para remover acentos, converter espaços em hífens e converter para minúsculos utilizando Regex, strtolower e strtr
 */

function complete_clean_string( $string ) {
    $new_clean_string = strtolower(  preg_replace("/[^a-zA-Z0-9_]/", "-", strtr($string, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇÑ-", "aaaaeeiooouucnAAAAEEIOOOUUCN-")) );

    return $new_clean_string;
}