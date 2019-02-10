<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Link;
use App\Entity\Module;
use App\Entity\User;
use App\Form\GroupSelectorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NavigationController extends AbstractController
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    private function getModulesActionById($groupId)
    {
        $repo = $this->getDoctrine()->getRepository(Group::class);
        $group = $repo->find($groupId);

        if (!$group) {
            return new Response("error cooooonjo". $groupId);
        }
        return $this->getModulesAction($group);
    }

    public function getModulesAction(Group $group) {

        $modules = $group->getModules();
        $links = array();
        $testLink = new Link();
        $testLink->setPath("/group/manage");
        $testLink->setName("Manage Group");
        array_push($links, $testLink);

        if ($modules) {
            foreach ($modules as $module) {
                $link = new Link();
                $link->setName($module->getName());
                $link->setPath($this->getPathForModule($module));
                array_push($links, $link);
            }

            return $this->render('homepage/controlled_navigation.html.twig', array('links' => $links));
        }
        return $this->render('homepage/controlled_navigation.html.twig', array('links' => $links));
    }

    public function getModulesByUser() {
        $user = $this->getUser();
        $group = $user->getCurrentGroup();

        if ($group && (is_int($group) || is_string($group))) {
            return $this->getModulesActionById($group);
        }

        if ($group && $group instanceof Group) {
            return $this->getModulesAction($group);
        }

        return new Response("error".$group);

    }


    public function getPathForModule(Module $module) {

        $moduleId = $module->getName();

        switch ($moduleId) {
            case "streeplijst" :
                return "/streeplijst";
                break;
            case "recipies" :
                return "/recipies";
                break;

        }
    }
    //TODO: move to separate class?


    public function getGroupSelector() {

        $user = $this->getUser();

        $groups = $user->

        $form = $this->createForm(GroupSelectorType::class);


    }
}
