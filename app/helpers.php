<?php

use Illuminate\Support\Facades\Auth;

    function isAdmin() {
        if (Auth::user()) {
            if (Auth::user()->admin == 1) {
                return true;
            }
        }
        return false;
    }
?>
