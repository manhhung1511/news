<?php

namespace common\helper;

class Tools
{
    public static function subWord($stringText, $space = 20, $add = '...') {
        $charters = array_map('trim', explode(" ", $stringText));
        if (count($charters) < $space) {
            return $stringText;
        }
        $str = [];
        for ($i = 0; $i < count($charters); $i++) {
            if ($i < $space) {
                $str[] = $charters[$i];
            }
        }
        return implode(' ', $str) . $add;
    }

    public static function subTitle($stringText, $space = 13, $add = '...') {
        $charters = array_map('trim', explode(" ", $stringText));
        if (count($charters) < $space) {
            return $stringText;
        }
        $str = [];
        for ($i = 0; $i < count($charters); $i++) {
            if ($i < $space) {
                $str[] = $charters[$i];
            }
        }
        return implode(' ', $str) . $add;
    }
}
