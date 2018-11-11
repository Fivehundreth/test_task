<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.11.2018
 * Time: 22:42
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Article;
class ArticleController extends Controller
{
    /**
     * @Route("/news/{slug}", requirements={"page"="\d+"})
     */
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->find($slug);
        if (!$article) {
            throw $this->createNotFoundException(
                'No product found for id '.$slug
            );
        }
        return $this->render('news/show.html.twig', ['article'=>$article]);
    }
}