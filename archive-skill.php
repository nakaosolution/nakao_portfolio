<?php get_header(); ?>
    <div class="wrapper">
        <?php
        $args = array(
            'post_type' => 'skill',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        );
        $wp_query = new WP_Query($args);
        ?>

        <?php if($wp_query->have_posts()) : ?>
            <h2 id="2">SKILL</h2>
            <p class="title-bottom">スキル一覧</p>
            <div class="skill-container">
            <!-- スキルループ開始 -->
                <?php while($wp_query->have_posts()) : ?>
                    <?php $wp_query->the_post(); ?>
                    <!-- １つのスキル記事開始 -->
                    <div class="skill-content">
                        <?php echo get_field('skill_icon'); ?>
                        <h3><?php the_title(); ?></h3>
                        <p>熟練度：<?php echo get_field('skill_level'); ?></p>
                        <p><?php echo get_the_content(); ?></p>
                    </div>
                    <!-- １つのスキル記事終了 -->
                    
                <?php endwhile; ?>
                <!-- スキルループ終了 -->
            </div><!--.skill-container end-->
            <?php //ここは投稿がある場合一度だけ処理 ?>
            <div class="block"></div>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>記事の取得に失敗しました。</p>
        <?php endif; ?>
        
        
        
    </div>
<?php get_footer();