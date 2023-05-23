<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Service\Technologie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/add', name: 'app_home_add')]
    public function add(Request $request): Response
    {
    $job = new Job();
//        $form = $this->createFormBuilder($job)
//            ->add('title', TextType::class)
//            ->add('place', TextType::class)
//            ->add('save', SubmitType::class)
//            ->getForm();

        $form = $this->createForm(JobType::class, $job, ['my_title' => 'Super developper']);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //dd($_POST['form']['title']);
            //dd($request->request->get('form')['title'];
            //dd($request->get('form')['title'];
//            dd($form->getData());
            dd($job);
        }
        return $this->render('home/add.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/backOrFront', name: 'app_ajax')]
    public function backOrFront(Request $request){
        $techno = $request->get('techno');
        $backOrFront = Technologie::backOrFront($techno);
        return new JsonResponse(['backOrFront' => $backOrFront]);
    }
}
