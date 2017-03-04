<?php

/**
 * ACF para admin que irá gerar os campos do contido na single page do CPT
 * 
 */
function repeaterHomeAboutTemplatesTypes($label_page, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $uniqueId5, $uniqueId6, $uniqueId7, $uniqueId8, $uniqueId9, $uniqueId10, $uniqueId11, $uniqueId12, $uniqueId13, $uniqueId14, $uniqueId15, $uniqueId16, $uniqueId17, $uniqueId18, $uniqueId19, $uniqueId20, $uniqueId21, $uniqueId22, $uniqueId23, $uniqueId24, $uniqueId25, $uniqueId26, $uniqueId27, $uniqueId28, $uniqueId29, $uniqueId30) 
{
  $prefix = $label_page . '_sections';

  return
    array(
      // Repeater de Tipos de Templates da Página
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Escolha as seções da página',
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'collapsed' => 'field_' . $uniqueId1,
        'layout' => 'block',
        'button_label' => 'Adicionar nova seção à página',
        'sub_fields' => array (
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Tipos de conteúdo da seção',
            'name' => $prefix . '_list_item_type',
            'type' => 'radio',
            'instructions' => 'O tipo de conteúdo escolhido aqui irá definir o layout dessa seção na página.',
            'choices' => array (
              1 => 'Full banner',
              2 => 'Texto Rico(Uma coluna)',
              3 => 'Texto rico(Duas colunas)',
              4 => 'Call to Action(CTA)',
              5 => 'Grid de soluções',
              6 => 'Grid de Cursos',
              7 => 'Grid de Instrutores',
              8 => 'Slider de Depoimentos'
            ),
            'default_value' => '',
            'layout' => 'horizontal',
          ),

          //Título da Seção - Serve para todos os tipos de seção.
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Título da Seção',
            'name' => $prefix . '_list_item_section_title',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '2'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '3'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '5'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '6'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '7'
                )
              ),
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '8'
                )
              ),
            ),
          ),

          //Campos Exclusivos do Full Banner
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Texto secundário do Banner',
            'name' => $prefix . '_list_item_banner_subtitle',
            'type' => 'textarea',
            'rows' => 4,
            'new_lines' => 'br',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
          ),
            //Texto Secundário do banner
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Texto secundário do Banner',
            'name' => $prefix . '_list_item_banner_subtitle',
            'type' => 'textarea',
            'rows' => 4,
            'new_lines' => 'br',
            'wrapper' => array (
              'width' => 70,
            ),
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
          ),
            //Imagem de Fundo do Banner
          array (
            'key' => 'field_' . $uniqueId4,
            'label' => 'Imagem de Fundo do Banner',
            'name' => $prefix . '_list_item_banner_background_image',
            'type' => 'image',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'mime_types' => 'jpg,jpeg,png,svg,gif',
          ),
            //Texto do Botão do Banner
          array (
            'key' => 'field_' . $uniqueId5,
            'label' => 'Texto do botão do banner',
            'name' => $prefix . '_list_item_banner_button_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão
          array (
            'key' => 'field_' . $uniqueId6,
            'label' => 'Url do botão',
            'name' => $prefix . '_list_item_banner_button_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão
          array (
            'key' => 'field_' . $uniqueId7,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_banner_button_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '1'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),

          //Campos Exclusivos do Texto Rico(Uma Coluna)
            //WP Editor
          array (
            'key' => 'field_' . $uniqueId8,
            'label' => 'Conteúdo da Seção',
            'name' => $prefix . '_list_item_rtone_editor',
            'type' => 'wysiwyg',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '2'
                )
              ),
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
          ),

          //Campos Exclusivos do Texto Rico(Duas Coluna)
            //WP Editor da Esquerda
          array (
            'key' => 'field_' . $uniqueId9,
            'label' => 'Conteúdo da Esquerda',
            'name' => $prefix . '_list_item_rttwo_left_editor',
            'type' => 'wysiwyg',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '3'
                )
              ),
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
          ),
            //WP Editor da direita
          array (
            'key' => 'field_' . $uniqueId10,
            'label' => 'Conteúdo da Direita',
            'name' => $prefix . '_list_item_rttwo_right_editor',
            'type' => 'wysiwyg',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '3'
                )
              ),
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
          ),

          //Campos Exclusivos do CTA
            //WP Editor
          array (
            'key' => 'field_' . $uniqueId11,
            'label' => 'Texto da Seção',
            'name' => $prefix . '_list_item_cta_editor',
            'type' => 'wysiwyg',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 0,
          ),
            //Texto do Botão do CTA da Esquerda
          array (
            'key' => 'field_' . $uniqueId12,
            'label' => 'Texto do botão do CTA da Esquerda',
            'name' => $prefix . '_list_item_cta_left_button_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão do CTA da Esquerda
          array (
            'key' => 'field_' . $uniqueId13,
            'label' => 'Url do botão do CTA da Esquerda',
            'name' => $prefix . '_list_item_cta_left_button_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão do CTA da Esquerda
          array (
            'key' => 'field_' . $uniqueId14,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_cta_left_button_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),
            //Texto do Botão do CTA da Direita
          array (
            'key' => 'field_' . $uniqueId15,
            'label' => 'Texto do botão do CTA da Direita',
            'name' => $prefix . '_list_item_cta_right_button_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão do CTA da Direita
          array (
            'key' => 'field_' . $uniqueId16,
            'label' => 'Url do botão do CTA da Direita',
            'name' => $prefix . '_list_item_cta_right_button_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão do CTA da Direita
          array (
            'key' => 'field_' . $uniqueId17,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_cta_right_button_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '4'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),

          //Campos Exclusivos do Grid de Soluções
            //Lista de Soluções
          array (
            'key' => 'field_' . $uniqueId18,
            'label' => 'Soluções da Seção',
            'name' => $prefix . '_list_item_grid_solutions_list',
            'type' => 'relationship',
            'instructions' => 'Escolha as soluções que deverão ser mostradas na seção',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '5'
                )
              ),
            ),
            'post_type' => array (
              0 => 'solution',
            ),
            'taxonomy' => array (
            ),
            'filters' => array (
              0 => 'search',
            ),
            'min' => '',
            'max' => '',
            'return_format' => 'object',
          ),
            //Texto do Botão do Grid de Soluções
          array (
            'key' => 'field_' . $uniqueId19,
            'label' => 'Texto do botão do Grid de Soluções',
            'name' => $prefix . '_list_item_grid_solutions_btn_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '5'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão do Grid de Soluções
          array (
            'key' => 'field_' . $uniqueId20,
            'label' => 'Url do botão do Grid de Soluções',
            'name' => $prefix . '_list_item_grid_solutions_btn_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '5'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão do Grid de Soluções
          array (
            'key' => 'field_' . $uniqueId21,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_grid_solutions_btn_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '5'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),

          //Campos Exclusivos do Grid de Cursos
            //Lista de Cursos
          array (
            'key' => 'field_' . $uniqueId22,
            'label' => 'Cursos da Seção',
            'name' => $prefix . '_list_item_grid_courses_list',
            'type' => 'relationship',
            'instructions' => 'Escolha as cursos que deverão ser mostradas na seção',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '6'
                )
              ),
            ),
            'post_type' => array (
              0 => 'sfwd-courses',
            ),
            'taxonomy' => array (
            ),
            'filters' => array (
              0 => 'search',
            ),
            'min' => '',
            'max' => '',
            'return_format' => 'object',
          ),
            //Texto do Botão do Grid de Cursos
          array (
            'key' => 'field_' . $uniqueId23,
            'label' => 'Texto do botão do Grid de Cursos',
            'name' => $prefix . '_list_item_grid_courses_btn_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '6'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão do Grid de Cursos
          array (
            'key' => 'field_' . $uniqueId24,
            'label' => 'Url do botão do Grid de Cursos',
            'name' => $prefix . '_list_item_grid_courses_btn_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '6'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão do Grid de Cursos
          array (
            'key' => 'field_' . $uniqueId25,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_grid_courses_btn_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '6'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),
          
          //Campos Exclusivos do Grid de Instrutores
            //Lista de Instrutores da Seção
          array (
            'key' => 'field_' . $uniqueId26,
            'label' => 'Instrutores que aparecerão na seção',
            'name' => $prefix . '_list_item_grid_users_list',
            'type' => 'user',
            'instructions' => 'Escolha os instrutores que deverão ser mostrados na seção.',
            'required' => 0,
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '7'
                )
              ),
            ),
            'role' => 'administrator,editor',
            'allow_null' => 1,
            'multiple' => 1,
          ),
            //Texto do Botão do Grid de Instrutores
          array (
            'key' => 'field_' . $uniqueId27,
            'label' => 'Texto do botão do Grid de Instrutores',
            'name' => $prefix . '_list_item_grid_users_btn_text',
            'type' => 'text',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '7'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
          ),
            // URL do Botão do Grid de Instrutores
          array (
            'key' => 'field_' . $uniqueId28,
            'label' => 'Url do botão do Grid de Instrutores',
            'name' => $prefix . '_list_item_grid_users_btn_url',
            'type' => 'url',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '7'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 35,
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
            // Target do Botão do Grid de Instrutores
          array (
            'key' => 'field_' . $uniqueId29,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_grid_users_btn_target',
            'type' => 'true_false',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '7'
                )
              ),
            ),
            'wrapper' => array (
              'width' => 30,
            ),
            'message' => '',
            'default_value' => 0,
          ),

          //Campos Exclusivos do Slider de Depoimentos
            //Lista de Depoimentos
          array (
            'key' => 'field_' . $uniqueId30,
            'label' => 'Depoimentos da Slider',
            'name' => $prefix . '_list_item_slider_depo_list',
            'type' => 'relationship',
            'instructions' => 'Escolha os depoimentos que deverão ser mostradas no slider da seção',
            'conditional_logic' => array (
              array (
                array (
                  'field' => 'field_' . $uniqueId1,
                  'operator' => '==',
                  'value' => '8'
                )
              ),
            ),
            'post_type' => array (
              0 => 'testimonial',
            ),
            'taxonomy' => array (
            ),
            'filters' => array (
              0 => 'search',
            ),
            'min' => '',
            'max' => '',
            'return_format' => 'object',
          )
        )
      )
    );
}
