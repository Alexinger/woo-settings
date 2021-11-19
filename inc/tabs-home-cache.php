<?php $list = list_files(WP_CONTENT_DIR . '/cache', 3); ?>

<div class="card-group bg-white border rounded p-3 my-2">

    <div class="mt-2 w-100">
        <?php
        $mb = recurse_dirsize(WP_CONTENT_DIR . '/cache');
        $s = 0;
        $path = ABSPATH . 'wp-content/cache/autoptimize/index.html';
        unlink($path);
        if ($list[0]) {
            foreach ($list as $item) {
                $s++;
                $str = explode('/', $item);
                $filename = array_pop($str);
                wp_delete_file(trim($item));
                echo $path . '<br>';
            }
        } else {
            echo '<p class="text-monospace text-info">Нет загруженных файлов или они были удалены по сроку хранения!</p>';
        }

        echo '<div class="text-right border-top mt-2">Размер папки: ' . number_format($mb / (1024 * 1024), 1) . ' MB' . '</div>';

        ?>
    </div>
    <div>
    </div>
</div>
<div>
    <h3>Удаление файлов из папки</h3>
    <div>

    </div>
</div>

<?php

$files = glob($_SERVER['DOCUMENT_ROOT'] . 'wp-content/cache/autoptimize/*.*');
$dir = $_SERVER['DOCUMENT_ROOT'] . 'wp-content/cache/autoptimize';
/*$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
foreach ( $ri as $file ) {
    $file->isDir() ?  rmdir($file) : unlink($file);
    echo $file . '<br>';
}*/


foreach (new DirectoryIterator($dir) as $fileInfo) {
    if(!$fileInfo->isDot()) {
        /*unlink($fileInfo->getPathname());*/
        echo $fileInfo->isDot() . "<br>";
    }
}


