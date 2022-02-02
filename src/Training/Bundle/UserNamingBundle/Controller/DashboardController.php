<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\DashboardBundle\Entity\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD controller for the Dashboard entity.
 * @Route("/dashboard")
 */
class DashboardController extends \Oro\Bundle\DashboardBundle\Controller\DashboardController
{
    /**
     * {@inheritdoc}
     */
    public function viewAction(Request $request, Dashboard $dashboard = null)
    {
        $this->addFlash('warning', 'This is an overridden controller, but I won\'t be overriding long');
        return parent::viewAction($request, $dashboard);
    }

    /**
     * {@inheritdoc}
     * @Template("@OroDashboard/Dashboard/index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
}
