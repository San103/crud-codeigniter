<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('style.css') ?>">
    <title>News Report</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/news">ABS-CBN News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">News Today</a>
                    <a class="nav-item nav-link" href="#">Hot News</a>
                    <a class="nav-item nav-link" href="#">Inter Galactic News</a>
                </div>
            </div>
            <nav class="navbar navbar-light ">
                <div class="autocomplete">
                    <!-- Add a search form -->
                    <form action="<?= site_url('news/search') ?>" method="get" class="form-inline" style="padding:0px 5rem; display:flex;">
                        <input class="form-control" style="margin-right:1rem" type="text" name="keyword" placeholder="Search news...">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <div id="search-results"></div>
                </div>
                    <!-- Display the news -->


            </nav>
        </div>
    </nav>