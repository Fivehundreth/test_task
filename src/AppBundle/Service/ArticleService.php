<?php
namespace AppBundle\Service;

use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.11.2018
 * Time: 12:27
 */
class ArticleService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create($header, $text){
        $article = new Article();
        $article->setHeader($header);
        $article->setText($text);
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        return true;
    }
}