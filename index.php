<?php get_header(); ?>
    <div class="wrapper">
        <h2 id="1">PROFILE</h2>
        <p class="title-bottom">自己紹介</p>
        <div class="profile-container">
            <p><?php
                $page_data = get_page_by_path('profile');
                $page = get_post($page_data);
                $content = $page -> post_content;
                
                // HTMLタグを除外した上で本文を表示する
                echo strip_tags($content);
            ?></p>
        </div>
        <?php
        $args = array(
            'post_type' => 'skill',
            'posts_per_page' => 3,
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'skilloption',
                    'field' => 'slug',
                    'terms' => 'top',
                    'operator' => 'AND' 
                ),
            ),
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

            <div class="btn-wrap">
                <a href="<?php echo esc_url(home_url('/skill')) ?>" class="btn">MORE</a>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>記事の取得に失敗しました。</p>
        <?php endif; ?>
        
        <?php
        $args = array(
            'post_type' => 'works',
            'posts_per_page' => 3,
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'worksoption',
                    'field' => 'slug',
                    'terms' => 'workstop',
                    'operator' => 'AND' 
                ),
            ),
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
            <div class="btn-wrap">
                <a href="<?php echo esc_url(home_url('/works')) ?>" class="btn">MORE</a>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>記事の取得に失敗しました。</p>
        <?php endif; ?>

        <h2 id="4">CONTACT</h2>
        <p class="title-bottom">連絡先</p>
        <div class="profile-container">
            <div class="contact-table-wrap">
                <p>ご不明な点があれば、こちらまでご連絡ください。</p>
                <table>
                    <tr>
                        <th>メールアドレス：</th>
                        <td>nakaosolution@gmail.com</td>
                    </tr>
                </table>
            </div>
        </div>
        
        
    </div>
    <?php get_footer(); ?>