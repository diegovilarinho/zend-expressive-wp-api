<?php
/**
 * Funções específicas para uso com o Learn Dash no site da Academia Agriness
 */

function _get_first_product_id_from_course($course_id){
	$product_id = null;
	$the_query = new WP_Query(array(
		'meta_key'     => '_related_course',
		'post_type'    => 'product'));

	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$current_product_id = get_the_ID();
			$courses = get_post_meta($current_product_id, '_related_course');

			if ( is_array( $courses[0] ) && ( in_array($course_id, $courses[0]) ) ){
				$product_id = $current_product_id;
				break;
			}

		}
	}

	/* Restore original Post Data */
	wp_reset_postdata();	
	return $product_id;
}


function akademis_enroll_button($course_id, $lessons, $has_access){

	$enrollButton = '';

	if ( !$has_access ) {

		$product_id = _get_first_product_id_from_course($course_id);

		if ( !empty($product_id)){
			$enrollButton = '<a href="#" class="button button--small cart__button--add" data-product-id="'. $product_id .'">';
		    $enrollButton .= '<span class="button__label">' . __( 'Quero fazer este curso', 'wac-theme' ) . '</span>';
	     	$enrollButton .= '</a>';
		} else {
			if (is_admin()){
				$enrollButton = '<div class="alert alert-danger" role="alert">' .__('ATENÇÃO!!! Não há nenhum produto cadastrado para este curso. Usuários não podem se matricular', 'akademis') .'</div>';
			}
		}
	} else {
		$firstLesson = reset($lessons);
			
		if ($firstLesson){
			$enrollButton = '<a href="' . get_permalink($firstLesson) . '" class="button button--small">';
			$enrollButton .= '<span class="button__label">' . __( 'Acessar o Conteúdo do Curso', 'wac-theme' ) . '</span>';
	     	$enrollButton .= '</a>';
		} else if (is_admin()){
			$enrollButton = '<div class="alert alert-warning">'.__('Nenhuma lição cadastrada neste curso', 'akademis').'</div>';
		}	
	}

	echo $enrollButton;
}


function akademis_is_lesson_completed($user_id = null, $lesson_id){

	if (empty($user_id)){
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
	}

	$course_progress = get_user_meta($user_id, '_sfwd-course_progress', true); 

	if(!empty($lesson_id)){
		$course_id = learndash_get_course_id($lesson_id);
		
		if (!empty($course_progress[$course_id]) && !empty($course_progress[$course_id]['lessons']) && !empty($course_progress[$course_id]['lessons'][$lesson_id]))
			return TRUE;		
	} 
		
	return FALSE;
}


function akademis_is_topic_completed($user_id = null, $lesson_id, $topic_id){

	if (empty($user_id)){
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
	}

	$course_progress = get_user_meta($user_id, '_sfwd-course_progress', true); 

	if(!empty($topic_id) && !empty($lesson_id)){
		$course_id = learndash_get_course_id($topic_id);
		if (!empty($course_progress[$course_id]) && 
			!empty($course_progress[$course_id]['topics']) && 
			!empty($course_progress[$course_id]['topics'][$lesson_id]) && 
			!empty($course_progress[$course_id]['topics'][$lesson_id][$topic_id]))
			return TRUE;		
	} 
		
	return FALSE;
}


function generate_lessons_menu($user_id, $course_id, $course){

	global $post;

	$enrolled = !empty($user_id) && ( user_can( $user_id, 'manage_options' ) ) || learndash_user_group_enrolled_to_course($user_id, $course_id);
	//TODO... mover esta linhas para o functions e carregar $lessons do request.
	$lessons = learndash_get_course_lessons_list($course);
	?>

	<ul class="sidebar-plan__nav" role="tablist">

		<?php
		foreach($lessons as $lesson): 
			$has_lesson_access = sfwd_lms_has_access($lesson["post"]->ID, $user_id);
			$current_lesson_topics = learndash_get_topic_list($lesson["post"]->ID);
			$current_lesson_quizes = learndash_get_lesson_quiz_list($lesson["post"]->ID);

			$lessonFormat = get_field( 'lesson_type', $lesson["post"]->ID );
			$classes = array();
			$classes[] = $lessonFormat;
			if ( $lesson["sample"] == "is_sample" ) $classes[] = 'sample';
			if ( akademis_is_lesson_completed($user_id, $lesson["post"]->ID ) ) $classes[] = 'completed';
			if ( $lesson["post"]->ID == $post->ID ) $classes[] = 'is-active';

			switch ($lessonFormat):
				case 'video':
				  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/video-call-1.svg';
				  break;
				case 'audio':
				  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/video-call-1.svg';
				  break;

				default:
				  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/file-notes-document-dark.svg';
				  break;
			endswitch;

			?>

			<li class="sidebar-plan__nav-item <?php echo implode(' ', $classes); ?>" style="margin: 0;">

				<div class="media media--flex">
					<?php if ($has_lesson_access): ?>
						<a href="<?php echo $lesson['permalink'] ?>">
					<?php endif; ?>
				          <div class="media__icon">
				            
				            <img src="<?php echo $lessonFormatIconUrl; ?>" alt="icone-<?php echo $lessonFormat; ?>" />

				          </div><!-- /.media__figure -->
				          <div class="media__body">
				            <p class="text text--xsmall text--semibold"><?php echo $lesson["post"]->post_title; ?></p>
				          </div><!-- /.media__body -->

					<?php if ($has_lesson_access): ?>
						</a>
					<?php endif; 
					if ( is_array($current_lesson_topics) && (count($current_lesson_topics) > 0)) : ?>
						<ul class="lesson-topic">
							<?php foreach ($current_lesson_topics as $i => $topic): 
								$topicClasses = array(); 
								if (akademis_is_topic_completed($user_id, $lesson["post"]->ID, $topic->ID ) ) $topicClasses[] = 'completed';
								if ($topic->ID == $post->ID ) $topicClasses[] = 'is-active';
							?>
								<li <?php echo (!empty($topicClasses)) ? 'class="lesson-topic__item ' . implode(" ", $topicClasses) .'"' : ''; ?>>
									<a href="<?php echo get_permalink($topic); ?>">
										<?php echo get_the_title($topic); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; 

					if ( is_array($current_lesson_quizes) && (count($current_lesson_quizes) > 0)) : ?>
						<ul class="lesson-quiz">
							<?php foreach ($current_lesson_quizes as $i => $quiz): 
								$quizClasses = array(); 
								if ($quiz['status'] == 'completed') $quizClasses[] = $quiz['status'];
								if ($quiz['post']->ID == $post->ID ) $quizClasses[] = 'active';
							?>
								<li <?php echo (!empty($quizClasses)) ? 'class="lesson-quiz__item ' . implode(" ", $quizClasses) .'"' : ''; ?>>
									<a href="<?php echo get_permalink($quiz['post']); ?>">
										<?php echo get_the_title($quiz['post']); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

				</div><!-- /.media -->

			</li>

		<?php endforeach; ?>

	</ul>

	<div id="box-trigger" class="collapse-box">
		<div class="collapse-box__trigger" data-toggle data-toggle-target="#box-trigger">
			<span>Clique aqui</span> para navegar
		</div><!-- /.collapse-box__trigger -->
		<div class="collapse-box__body">

			<ul class="sidebar-plan__nav-mobile" role="tablist">

				<?php
				foreach($lessons as $lesson): 
					$has_lesson_access = sfwd_lms_has_access($lesson["post"]->ID, $user_id);
					$current_lesson_topics = learndash_get_topic_list($lesson["post"]->ID);
					$current_lesson_quizes = learndash_get_lesson_quiz_list($lesson["post"]->ID);

					$lessonFormat = get_field( 'lesson_type', $lesson["post"]->ID );
					$classes = array();
					$classes[] = $lessonFormat;
					if ( $lesson["sample"] == "is_sample" ) $classes[] = 'sample';
					if ( akademis_is_lesson_completed($user_id, $lesson["post"]->ID ) ) $classes[] = 'completed';
					if ( $lesson["post"]->ID == $post->ID ) $classes[] = 'is-active';

					switch ($lessonFormat):
						case 'video':
						  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/video-call-1.svg';
						  break;
						case 'audio':
						  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/video-call-1.svg';
						  break;

						default:
						  $lessonFormatIconUrl = get_template_directory_uri() . '/media/icons/file-notes-document-dark.svg';
						  break;
					endswitch;

					?>

					<li class="sidebar-plan__nav-item <?php echo implode(' ', $classes); ?>" style="margin: 0;">

						<div class="media media--flex">
							<?php if ($has_lesson_access): ?>
								<a href="<?php echo $lesson['permalink'] ?>">
							<?php endif; ?>
						          <div class="media__icon">
						            
						            <img src="<?php echo $lessonFormatIconUrl; ?>" alt="icone-<?php echo $lessonFormat; ?>" />

						          </div><!-- /.media__figure -->
						          <div class="media__body">
						            <p class="text text--xsmall text--semibold"><?php echo $lesson["post"]->post_title; ?></p>
						          </div><!-- /.media__body -->

							<?php if ($has_lesson_access): ?>
								</a>
							<?php endif; 
							if ( is_array($current_lesson_topics) && (count($current_lesson_topics) > 0)) : ?>
								<ul>
									<?php foreach ($current_lesson_topics as $i => $topic): 
										$topicClasses = array(); 
										if (akademis_is_topic_completed($user_id, $lesson["post"]->ID, $topic->ID ) ) $topicClasses[] = 'completed';
										if ($topic->ID == $post->ID ) $topicClasses[] = 'is-active';
									?>
										<li <?php echo (!empty($topicClasses)) ? 'class="' . implode(" ", $topicClasses) .'"' : ''; ?>>
											<a href="<?php echo get_permalink($topic); ?>">
												<?php echo get_the_title($topic); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; 

							if ( is_array($current_lesson_quizes) && (count($current_lesson_quizes) > 0)) : ?>
								<ul>
									<?php foreach ($current_lesson_quizes as $i => $quiz): 
										$quizClasses = array(); 
										if ($quiz['status'] == 'completed') $quizClasses[] = $quiz['status'];
										if ($quiz['post']->ID == $post->ID ) $quizClasses[] = 'active';
									?>
										<li <?php echo (!empty($quizClasses)) ? 'class="' . implode(" ", $quizClasses) .'"' : ''; ?>>
											<a href="<?php echo get_permalink($quiz['post']); ?>">
												<?php echo get_the_title($quiz['post']); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

						</div><!-- /.media -->

					</li>

				<?php endforeach; ?>

			</ul>

		</div><!-- /.collapse-box__body -->
	</div><!-- /.collapse-box -->

	<?php

}

add_action( 'akademis_lessons_menu', 'generate_lessons_menu', 10, 3 );


// SEARCH FILTER THAT RETURNS ONLY COURSES

// function filter_search( $hits ) {

// 	$filtered_hits = array();
// 	$course_ids = array();

// 	foreach ( $hits as $hit ) :
// 		if (!is_array($hit)) continue;

// 		foreach ( $hit as $single_hit ) :

// 			if ( $single_hit->post_type == 'sfwd-courses' ) :

// 				$filtered_hits[ $single_hit->ID ] = $single_hit;
// 				$course_ids[] = $single_hit->ID;

// 			endif;

// 			$hit_lessons_meta = get_post_meta( $single_hit->ID, '_sfwd-lessons' );

// 			array_filter( $hit_lessons_meta );

// 			if ( !empty( $hit_lessons_meta ) ) :

// 				$filtered_hits[ $hit_lessons_meta[0]['sfwd-lessons_course'] ] = $single_hit;
// 				$course_ids[] = $hit_lessons_meta[0]['sfwd-lessons_course'];

// 			endif;

// 			$hit_topic_meta = get_post_meta( $single_hit->ID, '_sfwd-topic' );

// 			array_filter( $hit_topic_meta );

// 			if ( !empty( $hit_topic_meta ) ) :

// 				$filtered_hits[ $hit_topic_meta[0]['sfwd-topic_course'] ] = $single_hit;
// 				$course_ids[] = $hit_topic_meta[0]['sfwd-topic_course'];

// 			endif;


// 		endforeach;

// 	endforeach;

// 	$ordered_course_ids = array_count_values( $course_ids );
// 	arsort($ordered_course_ids);

// 	foreach (array_keys($ordered_course_ids) as $key) {
// 	    $filtered_courses[] = get_post( $key );
// 	}

// 	if ( is_array( $filtered_courses ) ) :
//     	return array( array_values( $filtered_courses ) );
// 	endif;
// };

// add_filter( 'relevanssi_hits_filter', 'filter_search' );