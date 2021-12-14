<?php get_header(); ?>
    <div class="wrapper">
        <?php
        $args = array(
            'post_type' => 'works',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        );
        $wp_query = new WP_Query($args);
        ?>

        <?php if($wp_query->have_posts()) : ?>
            <h2 id="3">WORKS</h2>
            <p class="title-bottom">制作物一覧</p>
            <div class="works-container">
            <!-- ワークループ開始 -->
                <?php while($wp_query->have_posts()) : ?>
                    <?php $wp_query->the_post(); ?>
                    <!-- １つのワーク記事開始 -->
                    
                        <a href="<?php the_permalink(); ?>" class="works-content">
                        
                                <?php
                                if(has_post_thumbnail()) :
                                    the_post_thumbnail('works');
                                endif;
                                ?>
                                <h3><?php the_title(); ?></h3>
                                
                                <p>使用スキル：<?php
                                
                                if(!empty(get_field('skill'))) {
                                    $works_skill = get_field('skill');
                                    foreach($works_skill as $value) {
                                        echo $value;
                                        if ($value !== end($works_skill)) {
                                            echo '/';
                                        }
                                    }
                                }
                                
                                ?></p>
                                <p><?php echo get_the_content(); ?></p>
                        </a>
                    
                    <!-- １つのワーク記事終了 -->
                <?php endwhile; ?>
            <!-- ワークループ終了 -->
                
            </div><!--.work-container end-->
            <div class="block"></div>
            
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>記事の取得に失敗しました。</p>
        <?php endif; ?>
        
        
        
    </div>
<?php get_footer();