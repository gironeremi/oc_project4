<?php
namespace App\Controller;
class MembersController extends Controller
{
    public function memberPanel()
    {
        require('View/frontend/memberView.php');
    }
}