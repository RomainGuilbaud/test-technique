<?php

namespace App\Controller\order;

use App\Gateway\OrderRepositoryGateway;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class ListOrderController extends AbstractController
{
    /**
     * ListOrderController constructor.
     * @param OrderRepositoryGateway $orderRepositoryGateway
     * @param RequestStack $requestStack
     */
    public function __construct(
        private OrderRepositoryGateway $orderRepositoryGateway,
        private RequestStack $requestStack
    ) {
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $querySort = $this->requestStack->getCurrentRequest()->query->get("sort");
        $sort = $querySort ? $querySort : 'desc';
        $orders = $this->orderRepositoryGateway->findBy(array(), array('orderDate' => $sort));
        return $this->render('order/listOrder.html.twig', [
            "orders" => $orders,
            "sort" => $sort
        ]);
    }
}
