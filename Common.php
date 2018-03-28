<?php
namespace MVC;
class Common{

    public static function normalize($data, $types){
        $types = explode('|', $types);
        if(is_array($types)){
            foreach($types as $v){
                if($v=='int'){
                    $data=(int)$data;
                }
                if($v=='floar'){
                    $data=(float)$data;
                }
                if($v=='double'){
                    $data=(double)$data;
                }
                if($v=='bool'){
                    $data=(bool)$data;
                }
                if($v=='string'){
                    $data=(string)$data;
                }
                if($v=='trim'){
                    $data=trim($data);
                }
                if($v=='xss'){
                    $data=self::xss_clean($data);
                }
            }
        }
        return $data;
    }

    public static function headerStatus($code){
        $codes = array(
            100 => 'Continue' ,
            101 => 'Switching Protocols' ,
            102 => 'Processing' ,
            200 => 'OK' ,
            201 => 'Created' ,
            202 => 'Accepted' ,
            203 => 'Non Authoritative Information' ,
            204 => 'No Content' ,
            205 => 'Reset Content' ,
            206 => 'Partial Content' ,
            207 => 'Multi Status' ,
            300 => 'Multiple Choices' ,
            301 => 'Moved Permanently' ,
            302 => 'Found' ,
            303 => 'See Other' ,
            304 => 'Not Modified' ,
            305 => 'Use Proxy' ,
            307 => 'Temporary Redirect ' ,
            400 => 'Bad Request' ,
            401 => 'Unauthorized' ,
            402 => 'Payment Required' ,
            403 => 'Forbidden' ,
            404 => 'Not Found' ,
            405 => 'Method Not Allowed' ,
            406 => 'Not Acceptable' ,
            407 => 'proxy Authentication required' ,
            408 => 'Request Timeout' ,
            409 => 'Conflict' ,
            410 => 'Gone' ,
            411 => 'Length Required' ,
            412 => 'Precondition Failed' ,
            413 => 'Request Entity Too Large' ,
            414 => 'Request URI Too Long' ,
            415 => 'Unsupported Media Type' ,
            416 => 'Requested Range Not Satisfiable' ,
            417 => 'Expectation Failed' ,
            422 => 'Unprocessable Entity' ,
            423 => 'Locked' ,
            424 => 'Failed Dependancy' ,
            426 => 'Upgrade Required' ,
            500 => 'Internal Server Error' ,
            501 => 'Not Implemented' ,
            502 => 'Bad Gateway' ,
            503 => 'Service Unavailable' ,
            504 => 'Gateway Timeout' ,
            505 => 'HTTP Version Not Supported' ,
            506 => 'Variant Also Negotiable' ,
            507 => 'Insufficient Storage' ,
            509 => 'Bandwidth Limit Exceeded' ,
            510 => 'not Extended' ,
        );
        if(!$codes[$code]){
            $code = 500;
        }

        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $codes[$code], true, $code);

        return $codes[$code];

    }
}