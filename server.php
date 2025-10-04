<?php

// ottieni i dati
$title = isset($_POST["title"]) ? $_POST["title"] : null;
$artist = isset($_POST["artist"]) ? $_POST["artist"] : null;
$cover_url = isset($_POST["cover-url"]) ? $_POST["cover-url"] : null;
$published_year = isset($_POST["published-year"]) ? $_POST["published-year"] : null;
$genre = isset($_POST["genre"]) ? $_POST["genre"] : null;

if (!$title || !$artist || !$cover_url || !$published_year || !$genre) {
    header("Location: ./index.php?error=missing_data");
    exit();
}

$json_text = file_get_contents('./discs.json');
$json = json_decode($json_text, true);

$json[] = [
    "title" => $title,
    "artist" => $artist,
    "cover_url" => $cover_url,
    "published_year" => intval($published_year),
    "genre" => $genre
];

$new_json_text = json_encode($json);
file_put_contents('./discs.json', $new_json_text);

header("Location: ./index.php");