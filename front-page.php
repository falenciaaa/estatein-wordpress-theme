<?php get_header(); ?>

<section class="home-hero" id="hero">
    <div class="container" style="grid-column: 1/-1; display: grid; grid-template-columns: 1fr 480px; align-items:center; gap:60px; max-width:1200px; margin:0 auto; padding:80px 24px;">
        <div class="hero-content">
            <div class="hero-badge">
                <span>✨</span> No. 1 trusted real estate experience
            </div>
            <h1>Discover Your Dream Property with Estatein</h1>
            <p>Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.</p>
            <div class="hero-actions">
                <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="btn btn-outline">Learn More</a>
                <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-primary">Browse Properties</a>
            </div>
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10k+</div>
                    <div class="stat-label">Properties For Clients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">16+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
            </div>
        </div>
        <div class="hero-image-wrapper fade-in">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-building.jpg'); ?>"
                 alt="Modern building"
                 onerror="this.style.background='linear-gradient(135deg,#1e1e2e,#2d1b69)';this.style.height='500px'">
            <div class="rotating-badge">↗</div>
            <div class="hero-badge-float">
                <div class="stats-row" style="gap:24px;">
                    <div class="stat-item">
                        <div class="stat-number" style="font-size:20px">200+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" style="font-size:20px">10k+</div>
                        <div class="stat-label">Properties</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/features-bar'); ?>

<section id="properties" style="padding: 80px 0;">
    <div class="container">
        <div class="section-header fade-in">
            <div>
                <div class="section-tag"></div>
                <h2 class="section-title">Featured Properties</h2>
                <p class="section-desc">Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein.</p>
            </div>
            <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-ghost">View All Properties</a>
        </div>

        <div class="cards-grid fade-in">
            <?php
            $props = new WP_Query([
                'post_type'      => 'property',
                'posts_per_page' => 3,
                'meta_key'       => 'featured',
                'meta_value'     => '1',
            ]);

            if ($props->have_posts()) :
                while ($props->have_posts()) : $props->the_post();
                    $price     = estatein_get_field('price');
                    $beds      = estatein_get_field('bedrooms');
                    $baths     = estatein_get_field('bathrooms');
                    $type      = estatein_get_field('property_type');
                    $cat_label = estatein_get_field('category_label');
            ?>
            <article class="property-card">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="property-card-image" src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>">
                <?php else : ?>
                    <div class="property-card-image" style="background:linear-gradient(135deg,#1a1a2e,#2d1b69);display:flex;align-items:center;justify-content:center;color:#703bf7;font-size:48px;">🏠</div>
                <?php endif; ?>
                <div class="property-card-body">
                    <?php if ($cat_label) : ?><div class="property-category"><?php echo esc_html($cat_label); ?></div><?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                    <div class="property-tags">
                        <?php if ($beds) : ?>
                        <span class="property-tag">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 22v-2a4 4 0 014-4h10a4 4 0 014 4v2"/><rect x="7" y="2" width="10" height="10" rx="1"/></svg>
                            <?php echo esc_html($beds); ?>-Bedroom
                        </span>
                        <?php endif; ?>
                        <?php if ($baths) : ?>
                        <span class="property-tag">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6 6.5 3.5a1.5 1.5 0 00-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 002 2h12a2 2 0 002-2v-5"/><line x1="10" y1="5" x2="8" y2="7"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
                            <?php echo esc_html($baths); ?>-Bathroom
                        </span>
                        <?php endif; ?>
                        <?php if ($type) : ?>
                        <span class="property-tag">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                            <?php echo esc_html($type); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="property-card-footer">
                        <div>
                            <div class="property-price-label">Price</div>
                            <div class="property-price"><?php echo esc_html($price ?: '$550,000'); ?></div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="padding:10px 18px;font-size:14px;">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <?php foreach (['Seaside Serenity Villa' => '$550,000', 'Metropolitan Haven' => '$550,000', 'Rustic Retreat Cottage' => '$550,000'] as $name => $price) : ?>
            <article class="property-card">
                <div class="property-card-image" style="background:linear-gradient(135deg,#1a1a2e,#2d1b69);display:flex;align-items:center;justify-content:center;color:#703bf7;font-size:48px;">🏠</div>
                <div class="property-card-body">
                    <h3><?php echo esc_html($name); ?></h3>
                    <p>A stunning property in a peaceful neighborhood offering exceptional living experience...</p>
                    <div class="property-tags">
                        <span class="property-tag">4-Bedroom</span>
                        <span class="property-tag">3-Bathroom</span>
                        <span class="property-tag">Villa</span>
                    </div>
                    <div class="property-card-footer">
                        <div>
                            <div class="property-price-label">Price</div>
                            <div class="property-price"><?php echo esc_html($price); ?></div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-primary" style="padding:10px 18px;font-size:14px;">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:32px;">
            <span class="slider-info" style="font-size:14px;color:var(--text-muted);">01 of 60</span>
            <div class="slider-controls">
                <button class="slider-btn" aria-label="Previous">←</button>
                <button class="slider-btn" aria-label="Next">→</button>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" style="padding:80px 0; background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header fade-in">
            <div>
                <div class="section-tag"></div>
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-desc">Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein.</p>
            </div>
            <a href="#" class="btn btn-ghost">View All Testimonials</a>
        </div>

        <div class="cards-grid fade-in">
            <?php
            $testi = new WP_Query(['post_type' => 'testimonial', 'posts_per_page' => 3]);
            if ($testi->have_posts()) :
                while ($testi->have_posts()) : $testi->the_post();
                    $author_name = estatein_get_field('author_name');
                    $author_loc  = estatein_get_field('author_location');
                    $rating      = estatein_get_field('rating') ?: 5;
            ?>
            <div class="testimonial-card">
                <?php echo estatein_stars($rating); ?>
                <h4><?php the_title(); ?></h4>
                <p><?php the_content(); ?></p>
                <div class="testimonial-author">
                    <?php if (has_post_thumbnail()) : ?>
                    <img class="author-avatar" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php echo esc_attr($author_name); ?>">
                    <?php else : ?>
                    <div class="author-avatar" style="background:var(--bg-secondary);display:flex;align-items:center;justify-content:center;">👤</div>
                    <?php endif; ?>
                    <div>
                        <div class="author-name"><?php echo esc_html($author_name ?: get_the_title()); ?></div>
                        <div class="author-location"><?php echo esc_html($author_loc ?: 'USA'); ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else : ?>
            <?php
            $default_testimonials = [
                ['Exceptional Service!', 'Our experience with Estatein was outstanding. Their team\'s dedication and professionalism made finding our dream home a breeze.', 'Wade Warren', 'USA, California'],
                ['Efficient and Reliable', 'Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price.', 'Emelie Thomson', 'USA, Florida'],
                ['Trusted Advisors', 'The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive.', 'John Mans', 'USA, Nevada'],
            ];
            foreach ($default_testimonials as $t) : ?>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <h4><?php echo esc_html($t[0]); ?></h4>
                <p><?php echo esc_html($t[1]); ?></p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:var(--bg-secondary);display:flex;align-items:center;justify-content:center;font-size:20px;">👤</div>
                    <div>
                        <div class="author-name"><?php echo esc_html($t[2]); ?></div>
                        <div class="author-location"><?php echo esc_html($t[3]); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:32px;">
            <span style="font-size:14px;color:var(--text-muted);">01 of 10</span>
            <div class="slider-controls">
                <button class="slider-btn" aria-label="Previous">←</button>
                <button class="slider-btn" aria-label="Next">→</button>
            </div>
        </div>
    </div>
</section>

<section id="faq" style="padding:80px 0;">
    <div class="container">
        <div class="section-header fade-in">
            <div>
                <div class="section-tag"></div>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Find answers to common questions about Estatein's services, property listings, and the real estate process.</p>
            </div>
            <a href="#" class="btn btn-ghost">View All FAQ's</a>
        </div>

        <div class="cards-grid fade-in">
            <?php
            $faqs = new WP_Query(['post_type' => 'faq', 'posts_per_page' => 3]);
            if ($faqs->have_posts()) :
                while ($faqs->have_posts()) : $faqs->the_post();
            ?>
            <div class="faq-item">
                <h4><?php the_title(); ?></h4>
                <p><?php echo wp_trim_words(get_the_content(), 24); ?></p>
                <a href="#" class="btn btn-ghost" style="padding:8px 16px;font-size:13px;">Read More</a>
            </div>
            <?php endwhile; wp_reset_postdata();
            else : ?>
            <?php
            $default_faqs = [
                ['How do I search for properties on Estatein?', 'Learn how to use our user-friendly search tools to find properties that match your criteria.'],
                ['What documents do I need to sell my property through Estatein?', 'Find out about the necessary documentation for listing your property with us.'],
                ['How can I contact an Estatein agent?', 'Discover the different ways you can get in touch with our experienced agents.'],
            ];
            foreach ($default_faqs as $faq) : ?>
            <div class="faq-item">
                <h4><?php echo esc_html($faq[0]); ?></h4>
                <p><?php echo esc_html($faq[1]); ?></p>
                <a href="#" class="btn btn-ghost" style="padding:8px 16px;font-size:13px;">Read More</a>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
