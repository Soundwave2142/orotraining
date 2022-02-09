<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\IntegrationBundle\Entity\Transport;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @ORM\Entity(
 *     repositoryClass="Training\Bundle\UserNamingBundle\Entity\Repository\UserNamingIntegrationSettingsRepository"
 * )
 */
class UserNamingIntegrationSettings extends Transport
{
    /** @var string */
    const DATA_URL = 'url';

    /**
     * @ORM\Column(name="user_naming_url", type="string", length=255)
     */
    private $url;

    /**
     * @var ParameterBag
     */
    private $settings;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return ParameterBag
     */
    public function getSettingsBag()
    {
        if ($this->settings === null) {
            $this->settings = new ParameterBag([self::DATA_URL => $this->getUrl()]);
        }

        return $this->settings;
    }
}