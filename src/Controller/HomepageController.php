<?php

declare(strict_types=1);

namespace Pehapkari\Controller;

use Pehapkari\Meetup\DataProvider\NearestMeetupProvider;
use Pehapkari\Statie\OragnizerProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomepageController extends AbstractController
{
    /**
     * @var OragnizerProvider
     */
    private $oragnizerProvider;

    /**
     * @var NearestMeetupProvider
     */
    private $nearestMeetupProvider;

    public function __construct(OragnizerProvider $oragnizerProvider, NearestMeetupProvider $nearestMeetupProvider)
    {
        $this->oragnizerProvider = $oragnizerProvider;
        $this->nearestMeetupProvider = $nearestMeetupProvider;
    }

    /**
     * @Route(path="/", name="homepage")
     */
    public function __invoke(): Response
    {
        return $this->render('homepage/homepage.twig', [
            'organizers' => $this->oragnizerProvider->provide(),
            'nearest_meetup' => $this->nearestMeetupProvider->provide(),
        ]);
    }
}
