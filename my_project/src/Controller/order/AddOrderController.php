<?php

namespace App\Controller\order;

use App\Dto\order\OrderDto;
use App\Gateway\ProductRepositoryGateway;
use App\Service\useCase\order\SaveOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;

class AddOrderController extends AbstractController
{

    /**
     * ListOrderController constructor.
     * @param ProductRepositoryGateway $productRepositoryGateway
     * @param SaveOrder $saveOrderUseCase
     * @param RequestStack $requestStack
     */
    public function __construct(
        private ProductRepositoryGateway $productRepositoryGateway,
        private SaveOrder $saveOrderUseCase,
        private RequestStack $requestStack,
        private Security $security
    )
    {
    }

    public function index(): Response
    {
        $products = $this->productRepositoryGateway->findBy(array(), array('name' => 'asc'));
        return $this->render('order/addOrder.html.twig', [
            "products" => $products
        ]);
    }

    public function submitForm(): Response
    {
        $quantity = $this->requestStack->getCurrentRequest()->get('quantity');
        $product = $this->requestStack->getCurrentRequest()->get('product');
        $date = new \DateTime();
        $status = "processing";
        $user = $this->security->getUser();

        /*$orderDto = new OrderDto(
            null,
            $user->getId(),
            $date,
            $status,

        );*/
        return $this->redirectToRoute('listOrder');
    }
}
