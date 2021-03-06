<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use App\Form\PartnerType;
use App\Service\FileUploader;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/partners")
 * @IsGranted("ROLE_ADMIN")
 */
class PartnersController extends AbstractController
{
    /**
     * @Route("/", name="admin_partners_index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('admin/partners/index.html.twig', [
            'partners' => $this->getDoctrine()->getRepository(Partner::class)->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_partners_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $partner = new Partner();
        $partner->setName('');
        $partner->setDescription('');

        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (($logo = $form['logo']->getData())) {
                    $partner->setLogo($fileUploader->upload($logo, $this->getParameter('partners_logo_directory')));
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($partner);
                $em->flush();

                $this->addFlash('success', 'partners.success.create');

                return $this->redirectToRoute('admin_partners_index');
            } catch (Exception $e) {
                $this->addFlash('danger', 'partners.fail.create');

                return $this->render('admin/partners/new.html.twig', [
                    'partner' => $partner,
                    'form' => $form->createView(),
                ]);
            }
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            foreach ($form->getErrors() as $error) {
                $this->addFlash('danger', $error->getMessage().$error->getCause());
            }
        }

        return $this->render('admin/partners/new.html.twig', [
            'partner' => $partner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{uuid}/edit", name="admin_partners_edit", methods={"GET", "POST"}, requirements={"uuid"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Route("/{slug}/edit", name="admin_partners_edit_slug", methods={"GET", "POST"})
     */
    public function edit(Request $request, Partner $partner, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (($logo = $form['logo']->getData())) {
                    $partner->setLogo($fileUploader->upload($logo, $this->getParameter('partners_logo_directory')));
                }
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('success', 'partners.success.edit');

                return $this->redirectToRoute('admin_partners_edit', ['uuid' => $partner->getUuidAsString()]);
            } catch (Exception $e) {
                $this->addFlash('danger', 'partners.fail.delete');

                return $this->render('admin/partners/edit.html.twig', [
                    'form' => $form->createView(),
                    'partner' => $partner,
                ]);
            }
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            foreach ($form->getErrors() as $error) {
                $this->addFlash('danger', $error->getMessage().$error->getCause());
            }
        }

        return $this->render('admin/partners/edit.html.twig', [
            'form' => $form->createView(),
            'partner' => $partner,
        ]);
    }

    /**
     * @Route("/{uuid}/delete", methods={"POST"}, name="admin_partners_delete")
     */
    public function delete(Request $request, Partner $partner): Response
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('admin_partners_index');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($partner);
        $em->flush();

        $this->addFlash('success', 'partners.success.delete');

        return $this->redirectToRoute('admin_partners_index');
    }
}
