<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ArticleRepository;
use App\Entity\Article;


class BlogController extends AbstractController
{
    /** 
    * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(articleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    public function contact(Request $request, string $article = ""): Response
    {
        $name = $request->query->get('name');
        $articleForm = new Contact();
        $form = $this->createForm(ContactType::class, $articleForm);
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            dump('ajout du nouvelle article');
        }

        return $this->renderForm
        ('blog/index.html.twig',
        [
           'controller_name' => 'Controleur de Article',
           'id' => $id,
           'name' => $name,
           'form' => $form,
        ]
        );
    }
}

