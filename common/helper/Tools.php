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

    public static function subWordLength($stringText, $space = 220, $add = '...') {
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

    public static function subWordContent($stringText, $space = 50, $add = '...') {
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

    public static function convertTitle($text)
    {
        $text = trim(strip_tags($text));
        $text = htmlspecialchars($text);

        $CLEAN_URL_REGEX = '*([\s$+,/:=\?@"\'<>%{}|\\^~[\]`\r\n\t\x00-\x1f\x7f]|(?(?<!&)#|#(?![0-9]+;))|&(?!#[0-9]+;)|(?<!&#\d|&#\d{2}|&#\d{3}|&#\d{4}|&#\d{5});)*s';
        $text = preg_replace($CLEAN_URL_REGEX, '-', strip_tags($text));
        $text = trim(preg_replace('#-+#', '-', $text), '-');

        $code_entities_match = array('\\', '&quot;', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', '', ';', "'", ',', '.', '_', '/', '*', '+', '~', '`', '=', ' ', '---', '--', '--');
        $code_entities_replace = array('', '', '-', '-', '', '', '', '-', '-', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '-', '', '-', '-', '', '', '', '', '', '-', '-', '-', '-');
        $text = str_replace($code_entities_match, $code_entities_replace, $text);

        $chars = array("a", "A", "e", "E", "o", "O", "u", "U", "i", "I", "d", "D", "y", "Y");
        $uni[0] = array("á", "à", "ạ", "ả", "ã", "â", "ấ", "ầ", "ậ", "ẩ", "ẫ", "ă", "ắ", "ằ", "ặ", "ẳ", "� �", "ả", "á", "ặ");
        $uni[1] = array("Á", "À", "Ạ", "Ả", "Ã", "Â", "Ấ", "Ầ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ắ", "Ằ", "Ặ", "Ẳ", "� �");
        $uni[2] = array("é", "è", "ẹ", "ẻ", "ẽ", "ê", "ế", "ề", "ệ", "ể", "ễ", "ệ");
        $uni[3] = array("É", "È", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ế", "Ề", "Ệ", "Ể", "Ễ");
        $uni[4] = array("ó", "ò", "ọ", "ỏ", "õ", "ô", "ố", "ồ", "ộ", "ổ", "ỗ", "ơ", "ớ", "ờ", "ợ", "ở", "� �");
        $uni[5] = array("Ó", "Ò", "Ọ", "Ỏ", "Õ", "Ô", "Ố", "Ồ", "Ộ", "Ổ", "Ỗ", "Ơ", "Ớ", "Ờ", "Ợ", "Ở", "� �");
        $uni[6] = array("ú", "ù", "ụ", "ủ", "ũ", "ư", "ứ", "ừ", "ự", "ử", "ữ", "ù");
        $uni[7] = array("Ú", "Ù", "Ụ", "Ủ", "Ũ", "Ư", "Ứ", "Ừ", "Ự", "Ử", "Ữ");
        $uni[8] = array("í", "ì", "ị", "ỉ", "ĩ");
        $uni[9] = array("Í", "Ì", "Ị", "Ỉ", "Ĩ");
        $uni[10] = array("đ");
        $uni[11] = array("Đ");
        $uni[12] = array("ý", "ỳ", "ỵ", "ỷ", "ỹ");
        $uni[13] = array("Ý", "Ỳ", "Ỵ", "Ỷ", "Ỹ");

        for ($i = 0; $i <= 13; $i++) {
            $text = str_replace($uni[$i], $chars[$i], $text);
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz-';
        $textReturn = '';
        for ($i = 0; $i <= strlen($text); $i++) {
            if (isset($text[$i])) {
                if (preg_match("/{$text[$i]}/i", $characters)) {
                    $textReturn .= $text[$i];
                }
            }
        }

        $textReturn = strtolower($textReturn);
        return $textReturn;
    }

    public static function create_slug($string) 
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
          );
          $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
          );
          $string = preg_replace($search, $replace, $string);
          $string = preg_replace('/(-)+/', '-', $string);
          $string = strtolower($string);
          return $string;
    }
}
