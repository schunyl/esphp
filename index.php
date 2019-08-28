<?php
    require_once 'app/init.php';

    if(isset($_GET['q'])){
        $q = $_GET['q'];

        $query = $client->search([
                'body' => [
                        'query' =>  [
                                'bool' => [
                                        'should' => [
                                                'match' => ['title' => $q],
                                                'match' => ['body' => $q],
                                                'match' => ['keywords' => $q]
                                        ]
                                ]
                        ]
                ]
        ]);

        if($query['hits']['total'] >= 1) {
            $results = $query['hits']['hits'];
        }

    }


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Search | ES</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <form action="index.php" method="get" autocomplete="off">
            <label>
                Search for something
                <input type="text" name="q">
            </label>
            <input type="submit" value="Search">
        </form>

        <?php
        if(isset($results)){
            foreach($results as $r){
                ?>
                <div class="results">
                    <a href="<?php echo $r['_id']; ?>"><?php echo $r['_source']['title']; ?></a>
                    <div class="keywords"><?php echo implode(',', $r['_source']['keywords']); ?></div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    </body>
</html>
