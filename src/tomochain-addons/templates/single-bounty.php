<?php
/*
* Bouty single page
*/
get_template_part('headerbounty');
?>
	<div class="content-area">
		<main class="site-main">
			<div class="container">
				<!-- content - detail -->
				<div class="row">
					<div class="col-12">
						<div class="container-detail-bounty">
							<?php
							while ( have_posts() ) :the_post();
								$project = get_the_terms(get_the_ID(),'project');
								$status = get_the_terms(get_the_ID(),'status');
								$disclose = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
								$reward = get_field('tomo_reward');
								$number_order = get_post_meta(get_the_ID(),'number_order',true);
								$number_submit = get_post_meta(get_the_ID(),'tomochain_number_submit',true);
								//tomochain_setPostViews(get_the_ID());
							?>
								<h1 class="tomo-job-title"><span><?php echo '#'.$number_order.' ';?></span><?php echo get_the_title();?></h1>
								<div class="box-content-detail">
									<div class="row flex-row-reverse">
										<div class="col-12 col-md-4">
											<table>
												<tbody>
													<tr>
														<td><span class="tm-rocket"></span></td>
														<td><?php echo esc_html_e('Project:','tomochain-addon');?></td>
														<td>
															<?php if(!is_wp_error($project)):
																foreach ($project as $p):?>
																	<a class="logo-project" href="#" title="">
																		<img src="https://tomochain.com/file/2019/03/Logo-tomochain100px.png"><span><?php echo esc_html($p->name);?></span>
																	</a>
																<?php endforeach;?>
															<?php endif;?>
														</td>
													</tr>
													<tr>
														<td><span class="tm-flag"></span></td>
														<td><?php echo esc_html_e('Status:','tomochain-addon');?></td>
														<td>
															<?php if(!is_wp_error($status)):
																foreach ($status as $s):?>
																	<span class="stt-active"><?php echo esc_html($s->name);?></span>
																	<br>
																<?php endforeach;?>
															<?php endif;?>
															<span><?php echo sprintf( __( 'disclosed %s ago','tomochain-addon' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );?></span>
														</td>
													</tr>
													<tr>
														<td><span class="tm-trophy"></span></td>
														<td><?php esc_html_e('Reward:','tomochain-addon')?></td>
														<td><?php if($reward) echo sprintf(esc_html__('%s TOMO','tomochain-addon'),$reward);?></td>
													</tr>
													<tr>
														<td><span class="tm-avatar"></span></td>
														<td><?php esc_html_e('Number of participants:','tomochain-addon')?></td>
														<td><?php echo $number_submit = !empty($number_submit) ? esc_html($number_submit) : 0;?></td>
													</tr>
												</tbody>
											</table>
											<div class="tomo_btn_grad">
												<a href="#"><?php esc_html_e('Claim IT','tomochain-addon')?></a>
											</div>
										</div>
										<div class="col-12 col-md-8">
											<h3 class="tomo-bounty-title"><?php esc_html_e('Description','tomochain-addon')?></h3>
											<div class="txt-detail">
												<?php the_content();?>
											</div>
										</div>
									</div>
								</div>
								<div class="box-form-wrap">
									<a class="close" href="#"><?php esc_html_e('x','tomochain-addon');?></a>
									<div class="box-form-detail">
										<h2 class="tomo-job-title">
											<?php
												$number_order = get_post_meta(get_the_ID(),'number_order',true);
											?>
											<span><?php echo '#'.$number_order;?></span> <?php echo get_the_title();?>n
										</h2>
										<p><?php esc_html_e('These industries have common points including asset exchanges, verifiable scarcity of virtual objects and collectibles, fast and secure payment networks','tomochain-addon');?></p>
										<div class="box-form" data-id="<?php echo esc_attr(get_the_ID());?>">
											<?php 
												$contact_form = get_field('contact_form', 'options');
												if(!empty($contact_form)){
													echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
												}
											?>
										</div>
									</div>
								</div>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<?php
get_template_part('footerbounty'); ?>