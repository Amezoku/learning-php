<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
       return <<<FORM
<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt[]" />
    <input type="file" name="receipt[]" />
    <input type="file" name="myimage" />
    <button type="submit">Upload</button>
</form>
FORM;
    }

    public function upload()
    {
        echo '<pre>';
        var_dump($_FILES);

        foreach ($_FILES['receipt']['name'] as $index => $name) {
            if (!empty($name)) {
                $tmpName = $_FILES['receipt']['tmp_name'][$index];
                $filePath = STORAGE_PATH . '/' . $name;
                move_uploaded_file($tmpName, $filePath);
                var_dump(pathinfo($filePath));
            }
        }

        if (!empty($_FILES['myimage']['name'])) {
            $tmpName = $_FILES['myimage']['tmp_name'];
            $filePath = STORAGE_PATH . '/' . $_FILES['myimage']['name'];
            move_uploaded_file($tmpName, $filePath);
            var_dump(pathinfo($filePath));
        }
    }
}