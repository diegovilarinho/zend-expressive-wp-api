<?php

namespace App\Action\About;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Service
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $page_slug = 'about';

        $page = get_page_by_path($page_slug);
        $aboutContentSectionsList = get_field('about_sections_list', $page->ID);
        
        $sectionNumber = 0;
        $responseData = array();

        foreach ($aboutContentSectionsList as $section) {
            $sectionNumber++;
            $sectionType = $section['about_sections_list_item_type'];
            $sectionTitle = $section['about_sections_list_item_section_title'];

            switch($sectionType) {
                case 2:
                    $sectionOneEditorContent = $section['about_sections_list_item_rtone_editor'];

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Texto Rico(Uma coluna)',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'content' => $sectionOneEditorContent
                        )
                    );
                    break;
                case 3:
                    $sectionTwoLeftEditorContent = $section['about_sections_list_item_rttwo_left_editor'];
                    $sectionTwoRightEditorContent = $section['about_sections_list_item_rttwo_right_editor'];

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Texto rico(Duas colunas)',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'left_content' => $sectionTwoLeftEditorContent,
                            'right_content'=> $sectionTwoRightEditorContent
                        )
                    );
                    break;
                case 4:
                    $sectionCtaEditorContent = $section['about_sections_list_item_cta_editor'];

                    $sectionCtaLeftButtonText = $section['about_sections_list_item_cta_left_button_text'];
                    $sectionCtaLeftButtonUrl = $section['about_sections_list_item_cta_left_button_url'];
                    $sectionCtaLeftButtonTarget = $section['about_sections_list_item_cta_left_button_target'];

                    $sectionCtaRightButtonText = $section['about_sections_list_item_cta_right_button_text'];
                    $sectionCtaRightButtonUrl = $section['about_sections_list_item_cta_right_button_url'];
                    $sectionCtaRightButtonTarget = $section['about_sections_list_item_cta_right_button_target'];

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Call to Action(CTA)',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'content' => $sectionCtaEditorContent,
                            'buttons' => array(
                                'left' => array(
                                    'text' => $sectionCtaLeftButtonText,
                                    'url' => $sectionCtaLeftButtonUrl,
                                    'target' => $sectionCtaLeftButtonTarget
                                ),
                                'right' => array(
                                    'text' => $sectionCtaRightButtonText,
                                    'url' => $sectionCtaRightButtonUrl,
                                    'target' => $sectionCtaRightButtonTarget
                                )
                            )
                        )
                    );
                    break;
                case 5:
                    $sectionSolutionsList = $section['about_sections_list_item_grid_solutions_list'];
                    
                    $sectionSolutionsButtonText = $section['about_sections_list_item_grid_solutions_btn_text'];
                    $sectionSolutionsButtonUrl = $section['about_sections_list_item_grid_solutions_btn_url'];
                    $sectionSolutionsButtonTarget = $section['about_sections_list_item_grid_solutions_btn_target'];
                    
                    $sectionSolutionsData = array();
                    $solutionNumber = 0;
                    foreach($sectionSolutionsList as $solution) {
                        $solutionIcon = get_field('nesolution_icon_image', $solution->ID);
                        $solutionShortDescription = get_field('nesolution_short_description_description', $solution->ID);

                        $sectionSolutionsData[$solutionNumber]['title'] = $solution->post_title;
                        $sectionSolutionsData[$solutionNumber]['short_description'] = $solutionShortDescription;
                        $sectionSolutionsData[$solutionNumber]['icon'] = array(
                            'url' => $solutionIcon['url'],
                            'alt' => $solutionIcon['alt'],
                            'title' => $solutionIcon['title']
                        );

                        $solutionNumber++;
                    }

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Grid de soluções',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'solutions' => $sectionSolutionsData
                        ),
                        'button' => array(
                            'text' => $sectionSolutionsButtonText,
                            'url' => $sectionSolutionsButtonUrl,
                            'target' => $sectionSolutionsButtonTarget
                        )
                    );
                    break;
                case 6:
                    $sectionCoursesList = $section['about_sections_list_item_grid_courses_list'];

                    $sectionCoursesData = array();
                    $courseNumber = 0;
                    foreach($sectionCoursesList as $course) {
                        $courseMeta = get_post_meta( $course->ID, '_sfwd-courses', true );
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

                        $courseFeaturedImageUrl = wp_get_attachment_url( get_post_thumbnail_id($course->ID) );
                        $courseFeaturedImageAlt = $courseFeaturedImageUrl ? 'image-' . basename(get_permalink($course->ID)) : '';

                        $courseLearnType = get_field('course_type', $course->ID);

                        $sectionCoursesData[$courseNumber]['ID'] = $course->ID;
                        $sectionCoursesData[$courseNumber]['title'] = $course->post_title;
                        $sectionCoursesData[$courseNumber]['short_description'] = $course->post_excerpt;
                        $sectionCoursesData[$courseNumber]['learn_type'] = $courseLearnType;
                        $sectionCoursesData[$courseNumber]['price_type'] = $coursePriceType;
                        $sectionCoursesData[$courseNumber]['price'] = $coursePrice;
                        $sectionCoursesData[$courseNumber]['review'] = 3;
                        $sectionCoursesData[$courseNumber]['slug'] =  $course->post_name;
                        $sectionCoursesData[$courseNumber]['featured_image'] = array(
                            'url' => $courseFeaturedImageUrl,
                            'alt' => $courseFeaturedImageAlt,
                            'title' => $course->post_name
                        );

                        $courseNumber++;
                    }

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Grid de Cursos',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'courses' => $sectionCoursesData
                        )
                    );
                    break;
                case 7:
                    $sectionInstructorsList = $section['about_sections_list_item_grid_users_list'];

                    $sectionUsersData = array();
                    $userNumber = 0;
                    foreach($sectionInstructorsList as $instructor) {
                        $user_info = get_userdata($instructor['ID']);
                        
                        $user_avatar = get_field('user_field_image', 'user_' . $user_info->ID);
                        
                        $user_facebook_url = get_field('user_field_facebook_url', 'user_' . $user_info->ID);
                        $user_linkedin_url = get_field('user_field_linkedin_url', 'user_' . $user_info->ID);
                        $user_instagram_url = get_field('user_field_instagram_url', 'user_' . $user_info->ID);
                        $user_twitter_url = get_field('user_field_twitter_url', 'user_' . $user_info->ID);
                        
                        $sectionUsersData[$userNumber]['display_name'] =  $user_info->display_name;
                        $sectionUsersData[$userNumber]['biography'] =  $user_info->description;
                        $sectionUsersData[$userNumber]['social_profiles'] = array(
                            array(
                                'media' => 'facebook',
                                'url' => $user_facebook_url
                            ),
                            array(
                                'media' => 'linkedin',
                                'url' => $user_linkedin_url
                            ),
                            array(
                                'media' => 'instagram',
                                'url' => $user_instagram_url
                            ),
                            array(
                                'media' => 'twitter',
                                'url' => $user_twitter_url
                            )
                        );
                        $sectionUsersData[$userNumber]['avatar'] = array(
                            'url' => $user_avatar['url'],
                            'alt' => $user_avatar['alt'],
                            'title' => $user_avatar['title']
                        );

                        $userNumber++;
                    }

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Grid de Instrutores',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'instructors' => $sectionUsersData
                        )
                    );
                    break;
                case 8:
                    $sectionTestimonialsList = $section['about_sections_list_item_slider_depo_list'];
                    
                    $sectionTestimonialsData = array();
                    $testimonialNumber = 0;
                    foreach($sectionTestimonialsList as $testimonial) {
                        $testimonialAuthorPhoto = get_field('testimonial_author_photo_image', $testimonial->ID);
                        $testimonialAuthorName = get_field('testimonial_author_name_title', $testimonial->ID);
                        $testimonialAuthorOffice = get_field('testimonial_author_office_title', $testimonial->ID);
                        $testimonialAuthorCompany = get_field('testimonial_author_company_title', $testimonial->ID);
                        $testimonialText = get_field('testimonial_text_editor', $testimonial->ID);

                        $sectionTestimonialsData[$testimonialNumber]['text'] = $testimonialText;

                        $sectionTestimonialsData[$testimonialNumber]['author']['name'] = $testimonialAuthorName;
                        $sectionTestimonialsData[$testimonialNumber]['author']['office'] = $testimonialAuthorOffice;
                        $sectionTestimonialsData[$testimonialNumber]['author']['company'] = $testimonialAuthorCompany;
                        $sectionTestimonialsData[$testimonialNumber]['author']['photo'] = array(
                            'url' => $testimonialAuthorPhoto['url'],
                            'alt' => $testimonialAuthorPhoto['alt'],
                            'title' => $testimonialAuthorPhoto['title']
                        );

                        $testimonialNumber++;
                    }

                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Slider de Depoimentos',
                        'content' => array(
                            'section_title' => $sectionTitle,
                            'testimonials' => $sectionTestimonialsData
                        )
                    );
                    break;
                
                default:
                    //Dados dos componentes da seção
                    $sectionBannerSubtitle = $section['about_sections_list_item_banner_subtitle'];
                    
                    $sectionBannerImage = $section['about_sections_list_item_banner_background_image'];
                    $sectionBannerImageUrl = $sectionBannerImage['url'];
                    $sectionBannerImageAlt = $sectionBannerImage['alt'];
                    $sectionBannerImageTitle = $sectionBannerImage['title'];

                    $sectionBannerButtonText = $section['about_sections_list_item_banner_button_text'];
                    $sectionBannerButtonUrl = $section['about_sections_list_item_banner_button_url'];
                    $sectionBannerButtonTarget = $section['about_sections_list_item_banner_button_target'];
                    
                    //Response data
                    $responseData[$sectionNumber - 1] = array(
                        'section_order' => $sectionNumber,
                        'section_type_code' => $sectionType,
                        'section_type_name' => 'Full Banner',
                        'content' => array (
                            'primary_text' => $sectionTitle,
                            'secondary_text' => $sectionBannerSubtitle,
                            'background_image' => array (
                                'url' => $sectionBannerImageUrl,
                                'alt' => $sectionBannerImageAlt,
                                'title' => $sectionBannerImageTitle
                            ),
                            'button' => array (
                                'text' => $sectionBannerButtonText,
                                'url' => $sectionBannerButtonUrl,
                                'target' => $sectionBannerButtonTarget
                            )
                        )
                    );
                    break;
            }
        }

        if(empty($responseData)) {
            return new JsonResponse([
                'error' => 'akl_page_empty_content',
                'errorMessage' => __('No content has been entered on this page', 'wac-api'),
            ], 403);
        }

        return new JsonResponse($responseData);
    }
}
