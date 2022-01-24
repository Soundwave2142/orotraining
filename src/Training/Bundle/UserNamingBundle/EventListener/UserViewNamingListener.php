<?php

namespace Training\Bundle\UserNamingBundle\EventListener;

use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * @author Soundwave2142
 */
class UserViewNamingListener
{
    /**
     * @param BeforeListRenderEvent $event
     * @return void
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function onUserView(BeforeListRenderEvent $event)
    {
        /** @var $user */
        if (!$user = $event->getEntity()) {
            return;
        }

        $template = $event->getEnvironment()->render(
            '@TrainingUserNaming/User/namingData.html.twig', ['entity' => $user]
        );

        $subBlockId = $event->getScrollData()->addSubBlock(0);
        $event->getScrollData()->addSubBlockData(0, $subBlockId, $template);
    }
}