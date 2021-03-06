<?php

namespace Training\Bundle\UserNamingBundle\Api\Processor\Get;

use Oro\Bundle\ApiBundle\Processor\Get\GetContext;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Training\Bundle\UserNamingBundle\Provider\UserFullNameProvider;

/**
 * @author Soundwave2142
 */
class NameExampleGetProcessor implements ProcessorInterface
{
    /** @var UserFullNameProvider */
    private UserFullNameProvider $fullNameProvider;

    /**
     * @param UserFullNameProvider $fullNameProvider
     */
    public function __construct(UserFullNameProvider $fullNameProvider)
    {
        $this->fullNameProvider = $fullNameProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context)
    {
        /** @var GetContext $context */

        $result = $context->getResult();

        if (is_array($result)
            && array_key_exists('format', $result)
            && !array_key_exists('nameExample', $result)
        ) {
            $result['nameExample'] = $this->fullNameProvider->getFullNameExample($result['format']);
        }

        $context->setResult($result);
    }
}