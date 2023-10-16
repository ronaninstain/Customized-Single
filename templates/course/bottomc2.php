<?php
$terms = get_the_terms($post->ID, 'course-cat');
// echo '<pre>';
// var_dump($terms);
// echo '</pre>';

foreach( $terms as $term ){
	$slug = $term->slug;
}
if($slug === 'exams'){
	return;
}else{

if ( ! defined( 'ABSPATH' ) ) exit;
do_action('wplms_single_course_content_end');
?>					
				</div>
				<div class="col-md-3">	
					<div class="widget pricing" id="course-pricing">
						<?php the_course_button(); ?>
						<?php the_course_details(); ?>
					</div>
					<div class="students_undertaking">
						<?php
						$students_undertaking=array();
						$students_undertaking = bp_course_get_students_undertaking();
						$students=get_post_meta(get_the_ID(),'vibe_students',true);

						echo '<strong>'.$students.__(' STUDENTS ENROLLED','vibe').'</strong>';

						echo '<ul>';
						foreach($students_undertaking as $student){
							echo '<li>'.get_avatar($student).'</li>';
						}
						echo '</ul>';
						?>
					</div>
				 	<?php
				 		$sidebar = apply_filters('wplms_sidebar','coursesidebar',get_the_ID());
		                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
	               	<?php endif; ?>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #buddypress -->
</section>	
<?php } ?>