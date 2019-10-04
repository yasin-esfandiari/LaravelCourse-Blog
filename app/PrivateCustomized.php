<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 7/16/2018
 * Time: 2:40 PM
 */

namespace App;
use Illuminate\Support\Facades\File;


class PrivateCustomized
{
    /**
     * Deletes the specified file if exists.
     *
     * @param  string  $file e.g.=http://127.0.0.1:8000/uploads/posts/1531741857td-deep-learning.jpg
     *         -> C:\wamp64\www\blog\public\/uploads/posts/1531741890td-deep-learning.jpg
     * @return null
     */
    public static function file_delete($file)
    {
        $start = 0;

        if (strpos($file, $_SERVER['HTTP_HOST']))
        {
            $start = strpos($file, $_SERVER['HTTP_HOST'])+strlen($_SERVER['HTTP_HOST']);
        }

        $file_addr = substr($file, $start);
        $file_public_addr = public_path($file_addr);

        if (File::exists($file_public_addr))
        {
            unlink($file_public_addr);
        }
/*        else
        {
            echo 'not exists';
        }*/
    }
}