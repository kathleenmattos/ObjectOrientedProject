<?php
namespace Kmattos1\ObjectOrientedProject;

require_once (dirname(__DIR__, 1) . "/Classes/Author.php");

use Ramsey\Uuid\Uuid;

$myAuthor = new Author("3763fd56-6453-478e-9b92-9a61587929d4", "hellotherehellotherehellothereyy", "www.authorAvatarUrlsAreUs.com", "iAmAnAuthor@gmail.com","hellothereerehtollehhellothereerehtollehhellothereerehtollehhellothereerehtollehhellothereerehtol", "JackLondon");

var_dump($myAuthor);