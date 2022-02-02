<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\UserBundle\Entity\User;

/**
 * @author Soundwave2142
 */
class UserFullNameProvider
{
    /**
     * @param User $user
     * @param $format
     * @return string
     */
    public function getFullName(User $user, $format)
    {
        return strtr($format, $this->getFormats($user));
    }

    /**
     * @param User $user
     * @return array
     */
    protected function getFormats(User $user)
    {
        return [
            'PREFIX' => $user->getNamePrefix(),
            'FIRST' => $user->getFirstName(),
            'MIDDLE' => $user->getMiddleName(),
            'LAST' => $user->getLastName(),
            'SUFFIX' => $user->getNameSuffix(),
        ];
    }
}