<?php

for ($i = 0; $i < 500; $i ++) {
    if (file_exists("input/{$i}.png")) {
        continue;
    }
    system(sprintf("wget %s -O %s", escapeshellarg("https://ap.ece.moe.edu.tw/webecems/ChgValidateCode.aspx?refresh=080417cd-0c2a-4a62-ab51-a49b5aede1fd-1"), escapeshellarg("input/{$i}.png")));
}
