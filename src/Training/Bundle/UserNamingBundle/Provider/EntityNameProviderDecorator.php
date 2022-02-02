<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * @author Soundwave2142
 */
class EntityNameProviderDecorator implements EntityNameProviderInterface
{
    /** @var EntityNameProviderInterface */
    private EntityNameProviderInterface $originalProvider;

    /** @var UserFullNameProvider */
    private UserFullNameProvider $fullNameProvider;

    /**
     * @param EntityNameProviderInterface $originalProvider
     * @param UserFullNameProvider $fullNameProvider
     */
    public function __construct(EntityNameProviderInterface $originalProvider, UserFullNameProvider $fullNameProvider)
    {
        $this->originalProvider = $originalProvider;
        $this->fullNameProvider = $fullNameProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function getName($format, $locale, $entity)
    {
        if ($entity instanceof User) {
            if ($namingType = $entity->getNamingType()) {
                return $this->fullNameProvider->getFullName($entity, $namingType->getFormat());
            }

            return sprintf('%s "%s" %s', $entity->getFirstName(), $entity->getMiddleName(), $entity->getLastName());
        }

        return $this->originalProvider->getName($format, $locale, $entity);
    }

    /**
     * {@inheritdoc}
     */
    public function getNameDQL($format, $locale, $className, $alias)
    {
        return $this->originalProvider->getNameDQL($format, $locale, $className, $alias);
    }
}