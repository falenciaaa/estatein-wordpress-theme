<?php
/*
Template Name: Properties
*/
get_header(); ?>

<section class="page-hero" id="portfolio">
    <div class="container">
        <div class="section-tag"></div>
        <h1>Find Your Dream Property</h1>
        <p>Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life.</p>
    </div>
</section>

<div class="container">
    <div class="search-bar-wrapper fade-in">
        <div class="search-bar-top">
            <input type="text" class="search-input" placeholder="Search For A Property">
            <button class="search-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Find Property
            </button>
        </div>
        <div class="search-filters">
            <div class="search-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <select name="location" aria-label="Location">
                    <option value="">Location</option>
                    <option>Malibu, California</option>
                    <option>New York City</option>
                    <option>Miami, Florida</option>
                    <option>Austin, Texas</option>
                </select>
            </div>
            <div class="search-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                <select name="type" aria-label="Property Type">
                    <option value="">Property Type</option>
                    <option>Villa</option>
                    <option>Apartment</option>
                    <option>Cottage</option>
                    <option>Townhouse</option>
                </select>
            </div>
            <div class="search-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                <select name="price" aria-label="Pricing Range">
                    <option value="">Pricing Range</option>
                    <option>$100k - $300k</option>
                    <option>$300k - $600k</option>
                    <option>$600k - $1M</option>
                    <option>$1M+</option>
                </select>
            </div>
            <div class="search-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                <select name="size" aria-label="Property Size">
                    <option value="">Property Size</option>
                    <option>Under 1,000 sqft</option>
                    <option>1,000 - 2,500 sqft</option>
                    <option>2,500 - 5,000 sqft</option>
                    <option>5,000+ sqft</option>
                </select>
            </div>
            <div class="search-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <select name="year" aria-label="Build Year">
                    <option value="">Build Year</option>
                    <option>2020 - 2024</option>
                    <option>2015 - 2019</option>
                    <option>2010 - 2014</option>
                    <option>Before 2010</option>
                </select>
            </div>
        </div>
    </div>
</div>

<section id="categories" style="padding:60px 0 80px;">
    <div class="container">
        <div class="section-header fade-in">
            <div>
                <div class="section-tag"></div>
                <h2 class="section-title">Discover a World of Possibilities</h2>
                <p class="section-desc">Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property.</p>
            </div>
        </div>

        <div class="cards-grid fade-in">
            <?php
            $props = new WP_Query([
                'post_type'      => 'property',
                'posts_per_page' => 9,
                'paged'          => get_query_var('paged') ?: 1,
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
                        <?php if ($beds) : ?><span class="property-tag"><?php echo esc_html($beds); ?>-Bedroom</span><?php endif; ?>
                        <?php if ($baths) : ?><span class="property-tag"><?php echo esc_html($baths); ?>-Bathroom</span><?php endif; ?>
                        <?php if ($type) : ?><span class="property-tag"><?php echo esc_html($type); ?></span><?php endif; ?>
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
            <?php endwhile; wp_reset_postdata();
            else :
            $sample = [
                ['Coastal Escapes - Where Waves Beckon', 'Seaside Serenity Villa', 'Wake up to the soothing melody of waves. This beachfront villa offers...', '$1,250,000'],
                ['Urban Oasis - Life in the Heart of the City', 'Metropolitan Haven', 'Immerse yourself in the energy of the city. This modern apartment in the heart...', '$650,000'],
                ['Countryside Charm - Escape to Nature\'s Embrace', 'Rustic Retreat Cottage', 'Find tranquility in the countryside. This charming cottage is nestled amidst rolling hills...', '$350,000'],
            ];
            foreach ($sample as $s) : ?>
            <article class="property-card">
                <div class="property-card-image" style="background:linear-gradient(135deg,#1a1a2e,#2d1b69);display:flex;align-items:center;justify-content:center;color:#703bf7;font-size:48px;">🏠</div>
                <div class="property-card-body">
                    <div class="property-category"><?php echo esc_html($s[0]); ?></div>
                    <h3><?php echo esc_html($s[1]); ?></h3>
                    <p><?php echo esc_html($s[2]); ?></p>
                    <div class="property-tags">
                        <span class="property-tag">4-Bedroom</span>
                        <span class="property-tag">3-Bathroom</span>
                        <span class="property-tag">Villa</span>
                    </div>
                    <div class="property-card-footer">
                        <div>
                            <div class="property-price-label">Price</div>
                            <div class="property-price"><?php echo esc_html($s[3]); ?></div>
                        </div>
                        <a href="#" class="btn btn-primary" style="padding:10px 18px;font-size:14px;">View Property Details</a>
                    </div>
                </div>
            </article>
            <?php endforeach; endif; ?>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:32px;">
            <span style="font-size:14px;color:var(--text-muted);">01 of 10</span>
            <div class="slider-controls">
                <button class="slider-btn">←</button>
                <button class="slider-btn">→</button>
            </div>
        </div>
    </div>
</section>

<section style="padding:80px 0;background:var(--bg-secondary);border-top:1px solid var(--border);">
    <div class="container">
        <div class="section-tag fade-in"></div>
        <h2 class="section-title fade-in">Let's Make it Happen</h2>
        <p class="section-desc fade-in" style="margin-bottom:40px;">Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match.</p>

        <form class="fade-in" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <?php wp_nonce_field('estatein_property_inquiry', 'nonce'); ?>
            <input type="hidden" name="action" value="estatein_property_inquiry">
            <div class="form-grid">
                <div class="form-group"><label>First Name</label><input type="text" name="first_name" placeholder="Enter First Name"></div>
                <div class="form-group"><label>Last Name</label><input type="text" name="last_name" placeholder="Enter Last Name"></div>
                <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="Enter your Email"></div>
                <div class="form-group"><label>Phone</label><input type="tel" name="phone" placeholder="Enter Phone Number"></div>
                <div class="form-group"><label>Preferred Location</label>
                    <select name="location"><option value="">Select Location</option><option>Malibu, California</option><option>New York City</option><option>Miami, Florida</option></select>
                </div>
                <div class="form-group"><label>Property Type</label>
                    <select name="property_type"><option value="">Select Property Type</option><option>Villa</option><option>Apartment</option><option>Cottage</option></select>
                </div>
                <div class="form-group"><label>No. of Bathrooms</label>
                    <select name="bathrooms"><option value="">Select no. of Bedrooms</option><option>1</option><option>2</option><option>3</option><option>4+</option></select>
                </div>
                <div class="form-group"><label>No. of Bedrooms</label>
                    <select name="bedrooms"><option value="">Select no. of Bedrooms</option><option>1</option><option>2</option><option>3</option><option>4+</option></select>
                </div>
                <div class="form-group full"><label>Budget</label>
                    <select name="budget"><option value="">Select Budget</option><option>Under $300k</option><option>$300k - $600k</option><option>$600k - $1M</option><option>$1M+</option></select>
                </div>
                <div class="form-group full"><label>Message</label><textarea name="message" placeholder="Enter your Message here.."></textarea></div>
            </div>
            <div class="form-footer">
                <label><input type="checkbox" name="agree" required> I agree with Terms of Use and Privacy Policy</label>
                <button type="submit" class="btn btn-primary">Send Your Message</button>
            </div>
        </form>
    </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>
<?php get_footer(); ?>
