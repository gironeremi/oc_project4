<?php
namespace App\Controller;
use App\Model\PostManager;
class ErrorsController extends Controller
{
    public function error(\Exception $exception)
    {
        require('View/errorsView.php');
    }
}