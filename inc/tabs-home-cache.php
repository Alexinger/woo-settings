<?php /*$list = list_files(WP_CONTENT_DIR . '/cache', 3); */?>

<div class="card-group bg-white border rounded p-3 my-2">

    <<!--div class="mt-2 w-100">
        --><?php
/*        $mb = recurse_dirsize(WP_CONTENT_DIR . '/cache');
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

        */?>
    </div>
    <div>
    </div>
</div>

<?php

function RemoveDir($path)
{
    if(file_exists($path) && is_dir($path))
    {
        $dirHandle = opendir($path);
        while (false !== ($file = readdir($dirHandle)))
        {
            if ($file!='.' && $file!='..')// исключаем папки с названием '.' и '..'
            {
                $tmpPath=$path.'/'.$file;
                chmod($tmpPath, 0777);
                if (is_dir($tmpPath))
                {  // если папка
                    RemoveDir($tmpPath);
                }
                else
                {
                    if(file_exists($tmpPath))
                    {
                        // удаляем файл
                        unlink($tmpPath);
                    }
                }
            }
        }
        closedir($dirHandle);
        // удаляем текущую папку
        /*if(file_exists($path))
        {
            rmdir($path);
        }*/
    }
    else
    {
        echo "Удаляемой папки не существует или это файл!";
    }
}

// путь от корня сайта
/*$DeletedFolder='/trest';*/
/*RemoveDir($_SERVER['DOCUMENT_ROOT'].$DeletedFolder);*/

?>

<!--<button onclick="<?php /*RemoveDir($_SERVER['DOCUMENT_ROOT'].$DeletedFolder) */?>" class="btn btn-danger btn-md">Удалить файлы</button>-->

<?php

/*1. Добавить автоматическую очистку */
/*2. Вывести файлы из папки */
/*2. Показать размер папки */
