<?php
include( "fileCache.php" );
$cache = new cache(30);
$cache->cacheCheck();
echo date("Y-m-d H:i:s");
$cache->caching();