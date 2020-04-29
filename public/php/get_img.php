<?php
//get lastest img
$files_artist = scandir('images/artist', SCANDIR_SORT_DESCENDING);
$newest_artist_img = $files_artist[0];

$files_foundation = scandir('images/foundation', SCANDIR_SORT_DESCENDING);
$newest_foundation_img = $files_foundation[0];
?>
