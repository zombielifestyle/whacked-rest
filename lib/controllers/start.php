<?php

return function($Response, $Params) {
    $Response->body = 'I '.$Params->info('what').' your ponyness!';
};
