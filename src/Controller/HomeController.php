<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 29/10/18
 * Time: 11:34
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @route ("/")
     * @return Response
     */
    public function index()
    {
        return $this->render('home/home.html.twig');
    }
}