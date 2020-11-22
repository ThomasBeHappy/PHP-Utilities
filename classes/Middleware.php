<?php

class Middleware {
    public static function auth() {
        if(!Auth::check()) {
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        return false;
    }
}