<?php

namespace Jmoati\HelperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SensioController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller extends SensioController
{
    /**
     * @return Doctrine\ORM\EntityManager
     */
    protected function em() : Doctrine\ORM\EntityManager
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @param  string                        $repository
     * @return Doctrine\ORM\EntityRepository
     */
    protected function getRepository(string $repository) : Doctrine\ORM\EntityRepository
    {
        return $this->em()->getRepository($repository);
    }

    /**
     * @param  object     $entity
     * @return Controller
     */
    protected function remove($entity)
    {
        $this->em()->remove($entity);

        return $this;
    }

    /**
     * @param  object     $entity
     * @return Controller
     */
    protected function persist($entity)
    {
        $this->em()->persist($entity);

        return $this;
    }

    /**
     * @param  object     $entity
     * @return Controller
     */
    protected function flush($entity = null)
    {
        if (!is_null($entity)) {
            $this->em()->persist($entity);
        }
        $this->em()->flush($entity);

        return $this;
    }

    /**
     * @param  string              $dql
     * @return \Doctrine\ORM\Query
     */
    protected function createQuery($dql)
    {
        return $this->em()->createQuery($dql);
    }

    /**
     * @param integer $page
     * @param integer $step
     * @return
     */
    protected function paginate($entities, $page = null, $step = false)
    {
        if (!$step) {
            if ($this->hasParameter('pagination_step')) {
                $step = $this->getParameter('pagination_step');
            } else {
                $step = 10;
            }
        }

        if (is_null($page)) {
            $page = $this->getRequest()->query->get('page', 1);
        }

        return $this->get('knp_paginator')->paginate($entities, $page, $step);
    }

    /**
     * @param  string     $message
     * @return Controller
     */
    protected function successFlash($message)
    {
        $this->get('session')->getFlashBag()->add(self::FLASH_SUCCESS, $message);

        return $this;
    }

    /**
     * @param  string     $message
     * @return Controller
     */
    protected function errorFlash($message)
    {
        $this->get('session')->getFlashBag()->add(self::FLASH_ERROR, $message);

        return $this;
    }

    /**
     * @param  string     $event
     * @return Controller
     */
    protected function dispatch($event)
    {
        $this->get('event_dispatcher')->dispatch($event);

        return $this;
    }

    /**
     * @return Form
     */
    protected function createDeleteForm()
    {
        return $this->createEmptyForm();
    }

    /**
     * @return Form
     */
    protected function createEmptyForm()
    {
        return $this->createFormBuilder()->getForm();
    }

    /**
     * @param  string $string
     * @param  array  $args
     * @return string
     */
    protected function translate($string, $args = array())
    {
        return $this->get('translator')->trans($string, $args);
    }

    /**
     * @return string
     */
    protected function getEnv()
    {
        return $this->container->getParameter('kernel.environment');
    }

    /**
     * @return string
     */
    protected function isDebug()
    {
        return $this->container->getParameter('kernel.debug');
    }

    /**
     * @param  Form    $form
     * @return boolean
     */
    protected function processForm(Form $form)
    {
        $request = $this->getRequest();

        if (!$request->isMethodSafe()) {

            $form->bind($request);

            if (true === $form->isValid()) {
                return true;
            } else {
                $this->errorFlash('flash.form.error');
            }
        }

        return false;
    }

    /**
     *
     * @param  array|string $url
     * @param  integer      $status
     * @return Response
     */
    public function redirect($url, $status = 302)
    {
        if (is_array($url)) {
            if (!isset($url[1])) {
                $url[1] = array();
            }
            $url = $this->generateUrl($url[0], $url[1]);
        }

        return parent::redirect($url, $status);
    }

    /**
     * @return string
     */
    protected function getLocale()
    {
        return $this->getRequest()->attributes->get('_locale');
    }

    /**
     * @param  string $parameter
     * @return string
     */
    protected function getParameter($parameter)
    {
        return $this->container->getParameter($parameter);
    }

    /**
     *
     * @param  string  $parameter
     * @return boolean
     */
    protected function hasParameter($parameter)
    {
        return $this->container->hasParameter($parameter);
    }

}
