<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     * @route ("/blog/{slug}", requirements={"slug"="[a-z0-9\-]+"}, methods={"GET"}, name="blog_show")
     */
    public function show($slug = "article-sans-titre")
    {
        $slug = str_replace("-", " ", $slug);
        $slug = ucwords($slug);
        return $this->render('blog/index.html.twig', ['slug' => $slug]);
    }
}