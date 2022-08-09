<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'db.php';

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');


$twig = new \Twig\Environment($loader,[
    'cache'=>dirname(__DIR__) . '/cache',
]);


if(empty($_GET['image_id'])){ $_GET['image_id'] = false; }

$template = $_GET['image_id']? 'gallery.twig' :'index.twig';

$result = mysqli_query($link, "select * from gallery where 1 order by likes desc");

$data = [];


while ($row = mysqli_fetch_assoc($result)){
    $data[] =['path' =>$row['path'] , 'name'=> $row['name'], 'id'=>$row['id']];
}

$images = [];

$id = $_GET['image_id'] ?? null;
if ($id && is_numeric($id)) {
  $result = mysqli_query($link, 'select * from gallery where id=' . $id);
  $image = mysqli_fetch_assoc($result);
    if($image){
      $images[] = ['path' =>$image['path'] , 'name'=> $image['name']];
    }
}

echo $twig->render($template, [
    'result' => $data,
    'image' => $images
]);