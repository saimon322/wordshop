<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <!-- news -->
    <div class="works-one">
      <div class="container">
        <div class="works-one__container">
        <div class="works-one__title"><?php the_title(); ?></div>
          <div class="works-one__info">
            <?php
            $term_list = wp_get_post_terms($post->ID, 'faculty_work', array("fields" => "all"));
            $term_count = count($term_list);
            if ($term_count > 0) {
                echo '# ';
                $it = 1;
                foreach ($term_list as $term ) {
                  $nm = $term->name;
                  $sep = '';
                  if ( $it != $term_count ) {
                    $sep = ', ';
                  }
                  echo $nm, $sep;
                  $it++;
                }
            } ?>
            
            <?php
            $term_list = wp_get_post_terms($post->ID, 'teachers_work', array("fields" => "all"));
            $term_count = count($term_list);
            if ($term_count > 0) {
                echo '| ';
                $it = 1;
                foreach ($term_list as $term ) {
                $nm = $term->name;
                $sep = '';
                if ( $it != $term_count ) {
                    $sep = ', ';
                }
                echo $nm, $sep;
                $it++;
                }
            } ?>
            
            <?php
            $term_list = wp_get_post_terms($post->ID, 'work_year', array("fields" => "all"));
            $term_count = count($term_list);
            if ($term_count > 0) {
                echo '| ';
                $it = 1;
                foreach ($term_list as $term ) {
                $nm = $term->name;
                $sep = '';
                if ( $it != $term_count ) {
                    $sep = ', ';
                }
                echo $nm, $sep;
                $it++;
                }
            } ?>
          </div>
          <div class="works-one__subtitle"><?php the_field('subtitle_works') ?></div>
          <div class="works-one__name">
            <?php if( have_rows('students_list_work') ): ?>
              <?php
              $list = count( get_field('students_list_work') );
              $i = 1;
              ?>
              <?php while( have_rows('students_list_work') ): the_row();
                  $name = get_sub_field('name');
                  ?>
                  <?php
                  $sep = '';
                  if ( $i < $list ) {
                    $sep = '<br>';
                  }
                  ?>
                  <?php echo $name, $sep; ?>
                  <?php $i++;  ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div class="works-one__text">
            <?php the_content(); ?>
          </div>
          <?php the_post_thumbnail( 'student_works_single', array( 'class' => 'works-one__photo' ) ); ?>
        </div>
        <div class="works-one__share">
          <div class="share">
            <div class="share__title">ПОДЕЛИТЬСЯ:</div>
            <!-- partners -->
            <?php share_tmpl(); ?>
            <!-- partners -->
          </div>
        </div>

      </div>
    </div>
    <!-- news -->
    <!-- pagination -->
    <div class="pagination">
      <div class="pagination__container">
        <?php previous_post_link('%link', '<div class="pagination__title pagination__title--left">Предыдущая</div>'); ?>
        <?php next_post_link('%link', '<div class="pagination__title pagination__title--right">Следующая</div>'); ?>
        <div class="ui-helper-clearfix"></div>
      </div>
    </div>
    <!-- pagination -->
  <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>