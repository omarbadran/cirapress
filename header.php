<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<!-- Head -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="profile" href="https://gmpg.org/xfn/11">    
    <?php wp_head(); ?>
</head>
        
<!-- Body -->
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
    
    <?php wp_body_open(); ?>

    <header class="nav-wrap bg-dark fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark px-lg-0">
                <a class="navbar-brand" href="#">MarketSpot</a>

                <div class="collapse navbar-collapse justify-content-between">
                    <ul class="navbar-nav">
                        <li class="nav-item swap-link">
                            <a href="index.html" class="nav-link">Home</a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item swap-link">
                            <a class="nav-link no-arrow btn btn-primary swap-link text-white" href="#">Sign up</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>