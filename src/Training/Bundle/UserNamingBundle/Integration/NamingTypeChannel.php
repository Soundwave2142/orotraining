<?php

namespace Training\Bundle\UserNamingBundle\Integration;

use Oro\Bundle\IntegrationBundle\Provider\ChannelInterface;
use Oro\Bundle\IntegrationBundle\Provider\IconAwareIntegrationInterface;

/**
 * @author Soundwave2142
 */
class NamingTypeChannel implements ChannelInterface, IconAwareIntegrationInterface
{
    /** @var string */
    const TYPE = 'naming_type';

    /**
     * {@inheritDoc}
     */
    public function getLabel(): string
    {
        return 'training.usernaming.integration.label';
    }

    /**
     * {@inheritDoc}
     */
    public function getIcon(): string
    {
        return 'bundles/trainingusernaming/img/naming-integration-icon.png';
    }
}