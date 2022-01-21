<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\DashboardBundle\Entity\Dashboard;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD controller for the Dashboard entity.
 * @Route("/dashboard")
 */
class DashboardController extends \Oro\Bundle\DashboardBundle\Controller\DashboardController
{
    /**
     * @param Request $request
     * @param Dashboard $dashboard
     *
     * @Route(
     *      "/view/{id}",
     *      name="oro_dashboard_view",
     *      requirements={"id"="\d+"},
     *      defaults={"id" = "0"}
     * )
     * @return Response
     */
    public function viewAction(Request $request, Dashboard $dashboard = null)
    {
        $this->addFlash('warning', 'This is an overridden controller, but I won\'t be overriding long');
        return parent::viewAction($request, $dashboard);
    }
}
