<?php

namespace App;


class Config
{
    const DOMAIN = 'mpstudio.com.ng';
    const DATABASE_URL = __DIR__ . "/../.database";
    static function mail_quota(): int
    {
        return  (int) env('MAIL_QUOTA', '20');
    }
    static function cpanel_api_user(): string
    {
        return env('CPANEL_API_USER', '');
    }
    static function cpanel_api_token(): string
    {
        return env('CPANEL_API_TOKEN', '');
    }
}
