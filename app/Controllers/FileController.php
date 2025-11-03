<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FileController extends Controller
{
    public function show($folder, $filename)
    {
        $path = WRITEPATH . $folder . '/' . $filename;

        if (!file_exists($path)) {
            return $this->response->setStatusCode(404)
                                  ->setBody('File not found');
        }

        $mime = mime_content_type($path);
        return $this->response->setHeader('Content-Type', $mime)
                              ->setBody(file_get_contents($path));
    }
}
