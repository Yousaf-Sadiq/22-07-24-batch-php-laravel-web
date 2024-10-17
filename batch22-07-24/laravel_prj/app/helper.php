<?php

use Illuminate\Support\Str;

if (!function_exists("FIleUpload")) {
    function FIleUpload($req, $input, $to)
    {
        $file = $req->file($input);

        $file_name = Str::random(5) . "_" . $file->getClientOriginalName();

        $destination = $to;
        // abc.png
        if ($file->move($destination, $file_name)) {

            return ($destination . "/" . $file_name);  // upload/qsery_abc.png
        } else {
            return false;
        }

    }
}

?>
