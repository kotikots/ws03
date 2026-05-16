<?php

namespace App\Controllers;

class ErrorController
{
/**
 * error 404 not found 
 * 
 * @return void
 */
    public static function  notFound($mesage = 'Page Not found')
    {
        http_response_code(404);

        loadview ('error', [
            'status' => 404,
            'message' => $mesage
        ]);
    }
    /**
 * error 403 not anauthorized error
 * 
 * @return void
 */
    public static function unauthorized($mesage = 'You are not authorized to view this page')
    {
        http_response_code(403);

        loadview ('error', [
            'status' => 403,
            'message' => $mesage
        ]);
    }
} 
