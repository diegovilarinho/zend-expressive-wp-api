<?php

namespace App\Action\Faq;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Service
{
    public function __invoke(Request $request, Response $responseData, callable $next = null)
    {
        $faqItemsList = get_field('faq_list', 'option');

        $faqResponseData = array();
        $fatherItemNumber = 0;

        foreach ($faqItemsList as $faqItem) {
            $faqResponseData[$fatherItemNumber]['question'] = $faqItem['faq_list_item_title'];
            $faqResponseData[$fatherItemNumber]['answer'] = $faqItem['faq_list_item_editor'];
            $faqSonsList = $faqItem['faq_child_list'];

            if( $faqSonsList ) {
                $sonItemNumber = 0;

                foreach ($faqSonsList as $faqSonItem) {
                    $faqResponseData[$fatherItemNumber]['sons'][$sonItemNumber]['question'] = $faqSonItem['faq_child_list_item_title'];
                    $faqResponseData[$fatherItemNumber]['sons'][$sonItemNumber]['answer'] = $faqSonItem['faq_child_list_item_editor'];
                    $faqGrandsonList = $faqSonItem['faq_grandson_list'];

                    if($faqGrandsonList) {
                        $grandsonItemNumber = 0;

                        foreach ($faqGrandsonList as $faqGrandsonItem) {
                            $faqResponseData[$fatherItemNumber]['sons'][$sonItemNumber]['grandsons'][$grandsonItemNumber]['question'] = $faqGrandsonItem['faq_grandson_list_item_title'];
                            $faqResponseData[$fatherItemNumber]['sons'][$sonItemNumber]['grandsons'][$grandsonItemNumber]['answer'] = $faqGrandsonItem['faq_grandson_list_item_editor'];

                            $grandsonItemNumber++;
                        }
                    }

                    $sonItemNumber++;
                }

            }

            $fatherItemNumber++;
        }

        $responseData = array(
            'data' => $faqResponseData
        );

        if(empty($responseData)) {
            return new JsonResponse([
                'error' => 'akl_page_empty_content',
                'errorMessage' => __('No content has been entered on this page', 'wp-api'),
            ], 403);
        }

        return new JsonResponse($responseData);
    }
}
