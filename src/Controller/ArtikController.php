<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtikController extends AbstractController
{
    /**
     * @Route("/artik", name="artik")
     */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        foreach ($categories as $category)
        {
            $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['category' => $category->getId()]);
            foreach ($articles as $article)
            {
                $category->addArticle($article);
            }

            $resultats[] = $category->getArticles();
        }


        return $this->render('artik/index.html.twig', [
            'controller_name' => 'ArtikController',
            'categories' => $categories,
            'resultats' => $resultats
        ]);
    }

    /**
     * @Route("article/{article}", name="article_show")
     * @param Article $article
     * @return Response
     */
    public function showArticle(Article $article): Response
    {
        $tags = $article->getTags();
        return $this->render('artik/show.html.twig', [
            'tags' => $tags,
            'article' => $article
        ]);
    }
}