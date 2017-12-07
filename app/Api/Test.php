<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;
use Illuminate\Http\UploadedFile;

class Test extends Api
{
    public function index( Request $request )
    {
        UploadedFile::fake();
    }
}