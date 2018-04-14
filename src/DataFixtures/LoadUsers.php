<?php
namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class LoadUsers extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // create objects
        $userUser = $this->createUser('user', 'user', ['ROLE_USER']);
        $userAdmin = $this->createUser('admin', 'admin', ['ROLE_ADMIN']);
        $userJoey = $this->createUser('joey', 'tierney', ['ROLE_SUPER_ADMIN']);
        $userMatt = $this->createUser('matt', 'smith', ['ROLE_SUPER_ADMIN']);

        // store to DB
        $manager->persist($userUser);
        $manager->persist($userAdmin);
        $manager->persist($userJoey);
        $manager->persist($userMatt);
        $manager->flush();
    }

    /**
     * @param       $username
     * @param       $plainPassword
     * @param array $roles // default to ROLE_USER if no ROLE supplied
     *
     * @return Users
     */
    private function createUser($username, $plainPassword, $roles = ['ROLE_PUBLIC']):Users
    {
        $user = new Users();
        $user->setUsername($username);
        $user->setRoles($roles);

        // password - and encoding
        $encodedPassword = $this->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);

        return $user;
    }

    private function encodePassword($user, $plainPassword):string
    {
        $encodedPassword = $this->encoder->encodePassword($user, $plainPassword);
        return $encodedPassword;
    }
}