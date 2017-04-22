<?php

namespace AppBundle\Services;

use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class UserService
 * @package AppBundle\Services
 * 
 */
class UserService
{
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     *
     * @return bool
     */
    public function isAdmin()
    {
        $roles = array();
        $token = $this->container->get('security.token_storage')->getToken();
        if ($token !== null) {
            /** @var User $user */
            $user = $token->getUser();
            if ($user !== 'anon.') {
                $roles = $user->getRoles();
            }
        }

        if (in_array('ROLE_ADMIN', $roles)) {
            return true;
        }

        return false;
    }
}