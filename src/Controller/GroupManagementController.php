<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GroupManagementController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/group/manage", name="group_management")
     */
    public function showGroupManageAction() {

        $users = $this->listUsers();

        return $this->render('manage.html.twig',[
            'users' => $users,
        ]);
    }

    public function listUsers() {

        $users = $this->getDoctrine()->getRepository(User::class)->getUsersInGroup($this->getUser()->getCurrentGroup());

        return $users;
    }
}
