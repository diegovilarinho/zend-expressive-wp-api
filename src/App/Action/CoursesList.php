<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CoursesList
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $params = $request->getQueryParams();

        /** Params values validation */
        if(! empty($params)) {
            foreach($params as $param => $value) {
                switch($param) {
                    case 'per_page':
                        if(! $this->paramIsValid($param, $value)) {
                            return new JsonResponse([
                                'error' => 'rest_invalid_param',
                                'errorMessage' => __( 'The '. $param . ' argument must be a number or a numeric string.', 'wac-api' )
                            ], 400);
                        }
                        break;
                    case 'page':
                        if(! $this->paramIsValid($param, $value)) {
                            return new JsonResponse([
                                'error' => 'rest_invalid_param',
                                'errorMessage' => __( 'The '. $param . ' argument must be a number or a numeric string.', 'wac-api' )
                            ], 400);
                        }
                        break;
                    case 'orderby':
                        $possibleValues = array( 'date', 'title', 'price' );

                        if(! $this->filterIsValid($param, $value, $possibleValues)) {
                            return new JsonResponse([
                                'error' => 'rest_invalid_param',
                                'errorMessage' => sprintf( __( '%s not is String or not one of [%s]' ), $param, implode( ', ', $possibleValues ) )
                            ], 400);
                        }
                        break;
                    case 'order':
                        $possibleValues = array( 'asc', 'desc' );

                        if(! $this->filterIsValid($param, $value, $possibleValues)) {
                            return new JsonResponse([
                                'error' => 'rest_invalid_param',
                                'errorMessage' => sprintf( __( '%s not is String or not one of [%s]' ), $param, implode( ', ', $possibleValues ) )
                            ], 400);
                        }
                        break;
                    case 'filterby':
                        $possibleValues = array( 'type', 'modality', 'price_type' );

                        if(! $this->filterIsValid($param, $value, $possibleValues)) {
                            return new JsonResponse([
                                'error' => 'rest_invalid_param',
                                'errorMessage' => sprintf( __( '%s not is String or not one of [%s]' ), $param, implode( ', ', $possibleValues ) )
                            ], 400);
                        }
                        break;
                }
            }
        }

        $query_args = array();
        $order_by = array();

        /** Define default values of some params */
        $perPageValue = isset($params['per_page']) ? $params['per_page'] : 12;
        $pagedValue = isset($params['page']) ? $params['page'] : 1;
        $orderValue = isset($params['order']) ? $params['order'] : 'desc';

        $query_args['post_type'] = 'sfwd-courses';
        $query_args['posts_per_page'] = $perPageValue;
        $query_args['paged'] = $pagedValue;
        $query_args['order'] = $orderValue;
        
        $order_by['menu_order'] = 'ASC';

        if(! isset($params['orderby'])) {
            $order_by['date'] = strtoupper($orderValue);
        } else {
            switch($params['orderby']) {
                case 'title':
                    $order_by['title'] = strtoupper($orderValue);
                    break; 
                    
                case 'price':
                    $order_by['date'] = strtoupper($orderValue);
                    break;

                default:
                    $order_by['date'] = strtoupper($orderValue);
                    break;
            }    
        }


        $query_args['orderby'] = $order_by;

        $filterValue = isset($params['filter']) ? $params['filter'] : '';

        if( isset($params['filterby']) && $params['filterby'] == 'type' ) {
            if( $filterValue != '' && $filterValue != 'premium' ) {
                return new JsonResponse([
                    'error' => 'rest_invalid_param',
                    'errorMessage' => __( 'Use filter=premium or not use filter argument', 'wac-api' )
                ], 400);
            }

            if( $params['filter'] == 'premium' )
                $query_args['cat'] = 3;   
        }
        
        $query_courses = new \WP_Query( $query_args );

        $total_pages = $query_courses->max_num_pages;

        $sectionCoursesData = array();

        if( $query_courses->have_posts() ) {
            $courseNumber = 0;
           
            while( $query_courses->have_posts() ) {
                $query_courses->the_post();

                $showCourseInResponse = false;

                $courseMeta = get_post_meta( get_the_id(), '_sfwd-courses', true );

                $coursePriceType = $courseMeta['sfwd-courses_course_price_type'];

                switch($coursePriceType) {
                    case 'free':
                        $coursePrice = '0';
                        break;
                    case 'open':
                        $coursePrice = '0';
                        break;

                    default:
                        $coursePrice = $courseMeta['sfwd-courses_course_price'];
                        break;
                }

                if(! isset($params['filterby']) || ! isset($params['filter'])) {
                    $showCourseInResponse = true;
                } else {
                    switch($params['filterby']) {
                        case 'price_type':
                            switch($params['filter']) {
                                case 'free':
                                    if($coursePriceType == 'free')
                                        $showCourseInResponse = true;
                                    break;
                                case 'open':
                                    if($coursePriceType == 'open')
                                        $showCourseInResponse = true;
                                    break;
                                case 'paynow':
                                    if($coursePriceType == 'paynow')
                                        $showCourseInResponse = true;
                                    break;
                                
                                default:
                                    $showCourseInResponse = true;
                                    break;
                            }
                            break;

                        case 'modality':
                            // $showCourseInResponse = true;
                            break;

                        default:
                            $showCourseInResponse = true;
                            break;
                    }
                }


                if($showCourseInResponse == true) {

                    $courseFeaturedImageUrl = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );

                    $courseFeaturedImageAlt = $courseFeaturedImageUrl ? 'image-' . basename(get_permalink()) : '';

                    $courseLearnType = get_field('course_type');

                    $courseLearnTypeName = '';

                    switch($courseLearnType) {
                        case '2':
                            $courseLearnTypeName = 'Presencial';
                            break;
                        case '3':
                            $courseLearnTypeName = 'Online + Presencial';
                            break;

                        default:
                            $courseLearnTypeName = 'Online';
                            break;
                    }

                    $courseSubtitle = get_field('course_subtitle');

                    $sectionCoursesData[$courseNumber]['ID'] = get_the_id();
                    $sectionCoursesData[$courseNumber]['title'] = get_the_title();
                    $sectionCoursesData[$courseNumber]['short_description'] = $courseSubtitle;
                    $sectionCoursesData[$courseNumber]['learn_type'] = array(
                        'ID' => intval($courseLearnType),
                        'name' => $courseLearnTypeName
                    );
                    $sectionCoursesData[$courseNumber]['price_type'] = $coursePriceType;
                    $sectionCoursesData[$courseNumber]['price'] = $coursePrice;
                    $sectionCoursesData[$courseNumber]['rating'] = 3;
                    $sectionCoursesData[$courseNumber]['slug'] =  basename( get_permalink() );
                    $sectionCoursesData[$courseNumber]['featured_image'] = array(
                        'url' => $courseFeaturedImageUrl,
                        'alt' => $courseFeaturedImageAlt,
                        'title' => basename( get_permalink() )
                    );

                    $courseNumber++;
                    
                }

            }
        }
        
        $responseLinks = array();
        $responseLinks['base'] = HOST . BASE . VERSION;

        $responseLinksFilter = isset($params['filter']) ? '&filter=' . $params['filter'] : '';
        $responseLinksFilterBy = isset($params['filterby']) ? '&filterby=' . $params['filterby'] : '';

        $orderByValue = isset($params['orderby']) ? $params['orderby'] : '';
            

        if($total_pages > 1) {
            switch($pagedValue) {
                case 1:
                    $responseLinks['next'] = BASE . VERSION . '/content/courses/list?per_page=' . $perPageValue . '&page=' . ( intval($pagedValue) + 1 ) . '&orderby=' . $orderByValue . '&order=' . $orderValue . $responseLinksFilterBy . $responseLinksFilter;
                    break;

                case $total_pages:
                    $responseLinks['self'] = BASE . VERSION . '/content/courses/list?per_page=' . $perPageValue . '&page=' . ( intval($pagedValue) - 1 ) . '&orderby=' . $orderByValue . '&order=' . $orderValue . $responseLinksFilterBy . $responseLinksFilter;
                    break;

                default:
                    $responseLinks['self'] = BASE . VERSION . '/content/courses/list?per_page=' . $perPageValue . '&page=' . ( intval($pagedValue) - 1 ) . '&orderby=' . $orderByValue . '&order=' . $orderValue . $responseLinksFilterBy . $responseLinksFilter;
                    $responseLinks['next'] = BASE . VERSION . '/content/courses/list?per_page=' . $perPageValue . '&page=' . ( intval($pagedValue) + 1 ) . '&orderby=' . $orderByValue . '&order=' . $orderValue . $responseLinksFilterBy . $responseLinksFilter;
                    break;
            }
        }

        $responseData = array();

        if($total_pages > 1) {
            $responseData['_links'] = $responseLinks;
        }

        if($perPageValue != '-1') {
            $responseData['current_page'] = $pagedValue;
            $responseData['courses_per_page'] = $perPageValue;
            $responseData['total_pages'] = $total_pages;
        }

        $responseData['results'] = $sectionCoursesData;


        return new JsonResponse($responseData);
    }


    public function paramIsValid($param, $value) {
        if ( ! is_numeric( $value ) ) {
            return false;
        }

        return true;
    }


    public function filterIsValid($param, $value, $possibleValues) {
        // If the 'filter' argument is not a string return an error.
        if ( ! is_string( $value ) ) {
            return false;
        }

        //If the filter param is not a value in our enum then we should return an error as well.
        if ( ! in_array( $value, $possibleValues, true ) ) {
            return false;
        }

        return true;
    }
}
