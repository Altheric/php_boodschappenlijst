<?php
    class Validator {
        //I'll be entirely honest, I wrote these functions before assignment 15 and wasn't feeling like refactoring the entire code.
        function validateStrInput($postStrInput){
            //Validate str input.
            $cleanStr = '';
            //First, check if the input was empty.
            if(empty($postStrInput)){
                return ["Is niet ingevuld!", false];
            } else {
                //Now make sure the usual suspects of malicious code are out of the way.
                $cleanStr = stripslashes(trim(htmlspecialchars($postStrInput)));
            } if (!preg_match("/^[a-zA-Z-' ]*$/",$cleanStr)){
                //Now validate the character usage.
               return ["Gebruik alleen gewone tekst-symbolen!", false];
            } else if(strlen($cleanStr) > 254){
                //Check the length aswell.
                return ["De tekst is te lang!", false];
            } else {
                return [$cleanStr, true];
            }
        }
        function validateIntInput($postIntInput, $minAmount, $maxAmount){
            //Validate int input.
            $cleanInt = 0;
            if(empty($postIntInput)){
                return ["Is niet ingevuld!", false];
            } else {
                //Sanitize the input
                $cleanInt = filter_var($postIntInput, FILTER_SANITIZE_NUMBER_INT);
            } if ($cleanInt > $maxAmount){
                //Now validate the ranges
                return ["Je bestelt te veel!", false];
            } else if ($cleanInt < $minAmount){
                return ["Je bestelt niks!", false];
            } else {
                return [$cleanInt, true];
            }
        }
        function validateFloatInput($postFloatInput, $minAmount, $maxAmount){
            //Validate float input.
            $cleanFloat = 0.0;
            if(empty($postFloatInput)){
                return ["Is niet ingevuld!", false];
            } else {
                //Sanitize the input
                $cleanFloat = filter_var($postFloatInput, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } if ($cleanFloat > $maxAmount){
                //Now validate the ranges
                return ["De prijs is the hoog!", false];
            } else if ($cleanFloat < $minAmount){
                return ["Ze gaan je niet geld betalen!", false];
            } else {
                return [$cleanFloat, true];
            }
        }
    }

?>