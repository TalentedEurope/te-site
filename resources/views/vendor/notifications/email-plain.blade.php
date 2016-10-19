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

echo 'Regards,', "\n";
echo config('app.name'), "\n";

echo 'DISCLAIMER: This message is intended exclusively for its address and may contain information that is CONFIDENTIAL, and protected by professional privilege. If you are not the intended recipient you are hereby notified that any dissemination, copy or disclosure of this communication is strictly prohibited by law. If this message has been received in error, please immediately notify us via e-mail to TALENTED EUROPE and delete it.';
