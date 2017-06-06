<?php

if (!empty($greeting)) {
    echo $greeting, "\n\n";
} else {
    echo $level == 'error' ? 'Whoops!' : 'Hello!', "\n\n";
}

if (!empty($introLines)) {
    echo implode("\n", $introLines), "\n\n";
}

if (isset($actionText)) {
    echo "{$actionText}: {$actionUrl}", "\n\n";
}

if (!empty($outroLines)) {
    echo implode("\n", $outroLines), "\n\n";
}

echo trans('email.regards'), "\n";
echo config('app.name'), "\n";

printf(trans('email.disclaimer_plain'), env('PUBLIC_MAIL_ADDRESS'));
