<section>
	<div class="container">
		<div class="page-header">
			<h2>Talk</h2>
			<span class="fa fa-anchor"></span>
		</div>
		
		<ul class="tag-nav">
			<li class="tag<?php echo (!$tag||$tag=='all'?' active':''); ?>">
				<?php echo HTML::anchor('talk', 'All'); ?>
			</li>
<?php
			if((bool)$tags->count())
			{
				foreach($tags as $t)
				{
					echo '<li class="tag'.(($tag&&$t->id==$tag->id)?' active':'').'">';
					echo HTML::anchor($t->url(),$t->title);
					echo '</li>';
				}
			}
?>
		</ul>
		
		<div class="cards">
<?php
			if((bool)$talks->count())
			{
				foreach($talks as $talk)
				{
					$replies = $talk->replies->count_all();
					$views = $talk->views;
?>
					<a href="<?php echo URL::site($talk->url()); ?>" class="card">
						<?php if($talk->hot()): ?>
							<div class="ribbon-wrapper"><div class="ribbon">Popular</div></div>
						<?php endif; ?>
						<div class="card-header">
							<?php echo $talk->title; ?>
						</div>
						<div class="card-copy">
							<?php echo $talk->excerpt(); ?>
						</div>
						<div class="card-stats">
							<ul>
								<li>
									<?php echo HTML::image($talk->user->gravatar('18')); ?>
									<span><?php echo $talk->username(); ?></span>
								</li>
								<li><?php echo $replies; ?><span><?php echo ($replies==1?'Reply':'Replies'); ?></span></li>
								<li><?php echo $views; ?><span>View<?php echo ($views==1?'':'s'); ?></span></li>
							</ul>
						</div>
					</a>
<?php
				}
			}
?>

		
	</div>
</section>