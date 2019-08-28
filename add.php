<?php
require_once 'app/init.php';

if(!empty($_POST)){
    if(isset($_POST['title'], $_POST['body'], $_POST['keywords'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $keywords = explode(',', $_POST['keywords']);

        $indexed = $client->index([
            'index' => 'articles',
            'type' => 'article',
            'body' => [
                'title' => $title,
                'body' => $body,
                'keywords' => $keywords
            ]
        ]);

//        if($indexed) {
//            print_r($indexed);
//            exit;
//        }

    }
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add | ES</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
    <form action="add.php" method="post" autocomplete="off">
        <label for="title">
            Title
            <input type="text" name="title">
        </label>
        <label for="body">
            Body
            <textarea name="body"  rows="10"></textarea>
        </label>
        <label for="keywords">
            Keywords
            <input type="text" name="keywords" placeholder="Comma separated text">
        </label>
        <input type="submit" value="Add">
    </form>

    </body>
</html>
