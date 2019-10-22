<?php

declare(strict_types=1);

namespace Pehapkari\Registration\Controller;

use Pehapkari\Training\Repository\TrainingTermRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TrainingRegistrationOverviewController extends AbstractController
{
    /**
     * @var TrainingTermRepository
     */
    private $trainingTermRepository;

    public function __construct(TrainingTermRepository $trainingTermRepository)
    {
        $this->trainingTermRepository = $trainingTermRepository;
    }

    /**
     * @Route(path="/prehled-registraci/", name="registration-overview", methods={"GET"})
     */
    public function run(): Response
    {
        return $this->render('registration/overview.twig', [
            'upcoming_training_terms' => $this->trainingTermRepository->getUpcoming(),
        ]);
    }
}
