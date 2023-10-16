<?php
?>
<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&family=Jost&family=Plus+Jakarta+Sans:wght@200;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<section class="sh-23-single">
	<div class="container">
		<div class="row for-col-order-change-mbl-sh-23-single">
			<div class="col-md-8 reversed-on-mbl col-sm-8">
				<div class="sh-top-23-content">
					<div class="row">
						<div class="col-md-7">
							<!-- TrustBox widget - Micro Combo -->
							<div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="5d9e297a95809300017a2161" data-style-height="20px" data-style-width="100%" data-theme="light">
								<a class="trust-give-a-break" href="https://uk.trustpilot.com/review/www.oneeducation.org.uk" target="_blank" rel="noopener">Trustpilot</a>
							</div>
							<!-- End TrustBox widget -->
						</div>
						<div class="col-md-5"></div>
					</div>
					<!-- <img class="top-img" src="<?php echo get_theme_file_uri() . '/assets/img/trustpilot23.png' ?>" alt="trustPilot"> -->
					<h1 class="top-course-title"><?php bp_course_name(); ?></h1>
					<div class="top-course-exerpt"><?php the_excerpt(); ?></div>
					<div class="row for-p-adjust-sh-23-inner-row">
						<?php
						$image1 = get_field('featured_image_1_');
						$image2 = get_field('featured_image_2');
						$image3 = get_field('featured_image_3');
						?>
						<div class="<?php echo (!empty($image1)) ? 'col-md-9 col-xs-9' : 'col-md-12 single-course-img'; ?>">
							<div class="course-main-avtar">
								<?php if (!empty(get_field('video_url'))) : ?>
									<?php the_field('video_url'); ?>
								<?php else : ?>
									<?php bp_course_avatar(); ?>
								<?php endif; ?>
							</div>
						</div>
						<?php
						$image1 = get_field('featured_image_1_');
						$image2 = get_field('featured_image_2');
						$image3 = get_field('featured_image_3');
						if ($image1 || $image2 || $image3) {
						?>
							<div class="col-md-3 col-xs-3">
								<div class="features-images">
									<img src="<?php echo esc_url($image1); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
									<img src="<?php echo esc_url($image2); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
									<img src="<?php echo esc_url($image3); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 sticky-column">
				<div class="the-Tab-functional-side sh-fixed-23-single">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#menu01">For You</a></li>
						<li><a data-toggle="tab" href="#menu02">For Teams</a></li>
					</ul>

					<hr>

					<div class="tab-content side-23-sh">
						<div id="menu01" class="tab-pane fade in active">
							<?php
							$courseID = get_the_ID();
							$userID = get_current_user_id();
							$userRemainingTime = bp_course_get_user_expiry_time($userID, $courseID);
							$now = time();
							$timeDifference = $userRemainingTime - $now;

							$dateInterval = date_diff(date_create(), date_create("+{$timeDifference} seconds"));
							$remainingTimeFormatted = "";

							$terms = get_the_terms($courseID, 'level');
							$courseStudents = get_post_meta($courseID, 'vibe_students', true);
							$units = bp_course_get_curriculum_units($courseID);
							$duration = $total_duration = 0;

							foreach ($units as $unit) {

								$duration = get_post_meta($unit, 'vibe_duration', true);

								if (get_post_type($unit) == 'unit') {

									$unit_duration_parameter = apply_filters('vibe_unit_duration_parameter', 60, $unit);
								} elseif (get_post_type($unit) == 'quiz') {

									$unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter', 60, $unit);
								}

								$total_duration =  $total_duration + $duration * $unit_duration_parameter;
							}

							$courseDuration =  tofriendlytime(($total_duration));
							?>
							<div class="row">
								<div class="col-md-12">
									<!-- TrustBox widget - Micro Combo -->
									<div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="5d9e297a95809300017a2161" data-style-height="20px" data-style-width="100%" data-theme="light">
										<a class="trust-give-a-break" href="https://uk.trustpilot.com/review/www.oneeducation.org.uk" target="_blank" rel="noopener">Trustpilot</a>
									</div>
									<!-- End TrustBox widget -->
								</div>
								<!-- <div class="col-md-5"></div> -->
							</div>
							<h1 class="side-course-title"><?php bp_course_name(); ?></h1>
							<?php echo bp_course_credits(); ?>
							<?php
							if (function_exists('sa_membeship_button')) {
								//oiopub_banner_zone(1, 'center');
								$course_id = get_the_ID();
								sa_membeship_button($course_id);
							} else {
								the_course_button();
							}
							?>
							<div class="course-feature-sh-23">
								<?php
								if (has_term('ATHE', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/athe/Athe.png' ?>" alt="athe">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/athe/ofqual.png' ?>" alt="ofqual">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/athe/Assessment-Included.png' ?>" alt="Assessment">

								<?php
								} elseif (has_term('PRINCE2', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/prince2/Axelos.png' ?>" alt="Axelos">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/prince2/PeopleCert-Certified.png' ?>" alt="PeopleCert-Certified">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/prince2/Official-Exam-Included.png' ?>" alt="Official-Exam-Included">
								<?php

								} elseif (has_term('NCFE', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/ncfe/ncfe.png' ?>" alt="ncfe">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/ncfe/ofqual.png' ?>" alt="ofqual">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/ncfe/Assessment-Included.png' ?>" alt="Assessment-Included">
								<?php

								} elseif (has_term('IPHM Courses', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/iphm/cpd-uk.png' ?>" alt="cpd uk">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/iphm/iphm.png' ?>" alt="iphm">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/iphm/Tutor-Support.png' ?>" alt="tutor support">
								<?php

								} elseif (has_term('QLS Certificate', 'popularity') and has_term('CPDUK Certified', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls-and-cpduk/CPDUK-Certified.png' ?>" alt="cpd uk certified">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls-and-cpduk/qls.png' ?>" alt="qls">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls-and-cpduk/Tutor-Support.png' ?>" alt="tutor support">
								<?php

								} elseif (has_term('QLS Certificate', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls/cpd-uk.png' ?>" alt="cpd uk">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls/qls.png' ?>" alt="qls">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/qls/Tutor-Support.png' ?>" alt="tutor support">
								<?php

								} elseif (has_term('CPDUK Certified', 'popularity')) {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/cpduk-certified/CPDUK-Certified.png' ?>" alt="cpd uk">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/cpduk-certified/Tutor-Support.png' ?>" alt="Tutor support">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/cpduk-certified/Fully-Online.png' ?>" alt="fully online">
								<?php

								} else {
								?>
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/general/cpd-uk.png' ?>" alt="cpd uk">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/general/Tutor-Support.png' ?>" alt="Tutor support">
									<img src="<?php echo get_stylesheet_directory_uri() . '/img/single-course/general/Fully-Online.png' ?>" alt="fully online">
								<?php
								}
								?>
							</div>
							<ul class="course-contexts">
								<li><img src="<?php echo get_theme_file_uri() . '/assets/img/calendarNew.svg' ?>" alt="newClaender">
									<?php if (bp_course_is_member($courseID, $userID)) {
										if ($dateInterval->y > 0) {
											$remainingTimeFormatted .= $dateInterval->y . " year";
											if ($dateInterval->y > 1) {
												$remainingTimeFormatted .= "s";
											}
										} elseif ($dateInterval->m > 0) {
											$remainingTimeFormatted .= $dateInterval->m . " month";
											if ($dateInterval->m > 1) {
												$remainingTimeFormatted .= "s";
											}
										} elseif ($dateInterval->d > 0) {
											$remainingTimeFormatted .= $dateInterval->d . " day";
											if ($dateInterval->d > 1) {
												$remainingTimeFormatted .= "s";
											}
										} else {
											$remainingTimeFormatted .= "Less than a day";
										}
									} else {
										$remainingTimeFormatted = "1 Year Access";
									}

									echo $remainingTimeFormatted; ?>
								</li>
								<li><img src="<?php echo get_theme_file_uri() . '/assets/img/chart.svg' ?>" alt="level">
									<?php
									if ($terms && !is_wp_error($terms)) {
										foreach ($terms as $term) {
									?>
											<a href="<?php echo home_url(); ?>/level/<?php echo $term->slug; ?>" rel="tag"><?php echo $term->name; ?></a>
									<?php
											break;
										}
									}
									?>
								</li>
								<li><img src="<?php echo get_theme_file_uri() . '/assets/img/teacher.svg' ?>" alt="students">
									<?php echo $courseStudents . ' Students'; ?>
								</li>
								<li><img src="<?php echo get_theme_file_uri() . '/assets/img/Clock.svg' ?>" alt="course_duration">
									<?php //echo $weeks . ' weeks ' . $days . ' days'; 
									?>
									<?php echo $courseDuration; ?>
								</li>
							</ul>
							<div class="gift-course-btn">
								<?php if (class_exists('WPLMS_Gift_Course_Class')) {
									$course_details_labels['gift_course'] = array(
										'label' => _x('Gift this course', 'label in details array', 'vibe-customtypes'),
										'callback' => false,
									);

									if (isset($course_details_labels['gift_course'])) {
										echo '<a href="' . esc_url($course_details_labels['gift_course']['callback']) . '">' .
											esc_html($course_details_labels['gift_course']['label']) . '</a>';
									}
								}
								?>
							</div>
							<div class="reviewOi">
								<a target='_blank' href='https://www.reviews.io/company-reviews/store/one-education'><img src='https://media.reviews.co.uk/badge/one-education.png' /></a>
							</div>
							<?php
							$sidebar = apply_filters('wplms_sidebar', 'coursesidebar', get_the_ID());
							if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar)) : ?>
							<?php endif; ?>
						</div>
						<div id="menu02" class="tab-pane fade">
							<div class="team-learner-23-form taw-business-form-1">
								<?php
								echo do_shortcode('[gravityform id="230" title="true" description="false" ajax="true"]');
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<section class="sh-double-colored-23">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="sh-middle-23-content">
					<div class="the-Tab-functional-middle">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#menu0">About</a></li>
							<li><a data-toggle="tab" href="#menu1">Curriculum</a></li>
							<li><a data-toggle="tab" href="#order-cert-btn-sh-23">Order Certificate</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu0" class="tab-pane fade in active">
								<?php
								the_content();
								?>
							</div>
							<div id="menu1" class="tab-pane fade">
								<div class="for-overwriting-the-css-c-crriculmn">
									<?php
									do_action('wplms_after_course_description');
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4"></div>
		</div>
	</div>
</section>
<section class="course-single-bottom-23" id="course-single-bottom-23">
	<div class="container">
		<div class="row">
			<div class="related-course-23">
				<h4 class="rel-heading-sh-23">Related Courses</h4>
				<div class="container">
					<?php echo do_shortcode('[related_course]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
$user = wp_get_current_user();
$notAllowedRoles = array('Subscriber', 'Student');
if (is_user_logged_in()) {
	if (!array_intersect($notAllowedRoles)) {
?>
		<section class="adminbar-23-study-hub">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="item-nav">
							<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
								<!-- Admin nav start -->
								<?php bp_get_options_nav(); ?>
								<?php
								if (function_exists('bp_course_nav_menu'))
									bp_course_nav_menu();
								?>
								<?php do_action('bp_course_options_nav'); ?>
								<!-- Admin nav end -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php
	}
}
?>
<script>
	// Step 1: Identify the div elements
	const courseSingleBottom = document.querySelector('.course-single-bottom-23');
	const tabFunctionalSide = document.querySelector('.the-Tab-functional-side');

	// Step 2: Add a scroll event listener to the window
	window.addEventListener('scroll', () => {
		// Step 3: Get the scroll position
		const scrollPosition = window.scrollY;

		// Step 4: Get the position of the courseSingleBottom div
		// Step 4: Get the offsetTop of the courseSingleBottom div
		const coursePosition = courseSingleBottom.offsetTop - 600;

		console.log(coursePosition);


		// Step 5: Check if scroll position is below the courseSingleBottom div
		if (scrollPosition > coursePosition) {
			tabFunctionalSide.style.display = 'none';
		} else {
			tabFunctionalSide.style.display = 'block'; // You can use 'initial' if that's the default display value
		}
	});
</script>
<?php
?>