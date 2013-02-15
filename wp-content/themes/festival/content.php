<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<link href='http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here' rel='stylesheet' type='text/css'>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<div class="champs-persos">

		<?php

		$pays = get_post_meta($post->ID, 'Pays', true);

		$annee = get_post_meta($post->ID, 'Année', true);
		
		$duree = get_post_meta($post->ID, 'Durée', true);
		
		$genre = get_post_meta($post->ID, 'Genre', true);

		$langue = get_post_meta($post->ID, 'Langue', true);

		$realisateur = get_post_meta($post->ID, 'Réalisateur', true);

		$interpretes = get_post_meta($post->ID, 'Interprètes', true);

		$prix = get_post_meta($post->ID, 'Prix', true);
		?>

		<?php if(false === empty($pays)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-pays">Pays : </div>
		<div class="champs-persos-content" id="champs-persos-content-pays"><?php echo $pays ?></div></span>
		<?php endif; ?>

		<?php if(false === empty($annee)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-annee">Année : </div>
		<div class="champs-persos-content" id="champs-persos-content-annee"><?php echo $annee ?></div></span>
		<?php endif; ?>
		
		<?php if(false === empty($duree)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-duree">Durée : </div>
		<div class="champs-persos-content" id="champs-persos-content-duree"><?php echo $duree ?></div></span>
		<?php endif; ?>
	
		<?php if(false === empty($genre)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-genre">Genre : </div>
		<div class="champs-persos-content" id="champs-persos-content-genre"><?php echo $genre ?></div></span>
		<?php endif; ?>	
		
		<?php if(false === empty($langue)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-langue">Langue : </div>
		<div class="champs-persos-content" id="champs-persos-content-langue"><?php echo $langue ?></div></span>
		<?php endif; ?>
		
		<?php if(false === empty($realisateur)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-realisateur">Réalisateur(s) : </div>
		<div class="champs-persos-content" id="champs-persos-content-realisateur"><?php echo $realisateur ?></div></span>
		<?php endif; ?>
		
		<?php if(false === empty($interpretes)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-interprete">Interprètes : </div>
		<div class="champs-persos-content" id="champs-persos-content-interpretes"><?php echo $interpretes ?></div></span>
		<?php endif; ?>	
	
		<?php if(false === empty($prix)): ?>
		<span class="champs-persos-item">
		<div class="champs-persos-label" id="champs-persos-prix">Prix : </div>
		<div class="champs-persos-content" id="champs-persos-content-prix"><?php echo $prix ?></div></span>
		<?php endif; ?>

		</div> <!-- .champs-perso -->


		<footer class="entry-meta">
			<?php edit_post_link( __( 'Éditer', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Laisser un commentaire', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
			</div><!-- .comments-link -->
			<?php twentytwelve_entry_meta(); ?>

			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'À propos %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'Voir tous les posts par %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
