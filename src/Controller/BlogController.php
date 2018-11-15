<?php
namespace App\Controller;

use App\Entity\Category;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ArticleSearchType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{


    /**
     * Show all row from article's entity
     *
     * @Route("/blog", name="blog_index")
     * @return Response A response instance
     */
    public function index() : Response
    {


        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }


        $form = $this->createForm(
            ArticleSearchType::class,
            null,
            ['method' => Request::METHOD_GET]
        );

        return $this->render(
            'blog/index.html.twig', [
                'articles' => $articles,
                'form' => $form->createView(),
            ]
        );


    }

    /**
     * @Route("/category/{category}", name="blog_show_category")
     * @param string $category
     * @return Response
     */
    public function showByCategory(string $category) : Response
    {
        $categorie = $this->getDoctrine()->getRepository(Category::class)->findOneByName($category);
        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['category' => $categorie->getId()], ['id' => 'desc'], 3 );


        return $this->render('blog/category.html.twig', ['category' => $categorie, 'articles' => $articles]);
    }
}