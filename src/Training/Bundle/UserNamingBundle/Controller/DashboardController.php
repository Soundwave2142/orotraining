<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\DashboardBundle\Controller\DashboardController as FatherDashboardController;
use Oro\Bundle\DashboardBundle\Entity\Dashboard;
use Oro\Bundle\DashboardBundle\Model\WidgetConfigs;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD controller for the Dashboard entity.
 * @Route("/dashboard")
 */
class DashboardController extends FatherDashboardController
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

    /**
     * @Route("/dashboard/user-information", name="training_user_dashboard_user_information", options={"expose"=true})
     * @Template("TrainingUserNamingBundle:UserNaming:dashboardUserInformation.html.twig")
     * @param WidgetConfigs $widgetConfigs
     * @return array
     */
    public function dashboardUserInformationAction(WidgetConfigs $widgetConfigs): array
    {
        $data = $widgetConfigs->getWidgetAttributesForTwig('current_user_information');
        $data['currentUser'] = $this->getUser();
        return $data;
    }
}
