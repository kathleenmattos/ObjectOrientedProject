<?php
namespace Kmattos1\ObjectOrientedProject;

require_once (dirname(__DIR__, 1) . "/Classes/Author.php");

use Ramsey\Uuid\Uuid;

$myAuthor = new Author("08f4424e402242578b44fc2038d5f71b", "hellotherehellotherehellothereyy", "www.authorAvatarUrlsAreUs.com", "iAmAnAuthor@gmail.com","hellothereerehtollehhellothereerehtollehhellothereerehtollehhellothereerehtollehhellothereerehtol", "JackLondon");

var_dump(myAuthor);