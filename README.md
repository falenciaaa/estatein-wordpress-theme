# Estatein WordPress Theme - Documentation

## Overview
Custom WordPress theme for Estatein Real Estate, built to match the provided Figma dark-theme design.

---

## Folder Structure
```
estatein/
├── style.css              # Theme declaration
├── functions.php          # Theme setup, CPT, ACF, helpers
├── index.php              # Fallback template
├── header.php             # Site header + navigation
├── footer.php             # Site footer
├── front-page.php         # Homepage
├── page-about.php         # About Us (Template Name: About Us)
├── page-properties.php    # Properties listing (Template Name: Properties)
├── page-services.php      # Services (Template Name: Services)
├── page-contact.php       # Contact (Template Name: Contact Us)
├── single-property.php    # Single property detail
├── assets/
│   ├── css/main.css       # All styles (CSS variables, responsive)
│   └── js/main.js         # Mobile menu, sliders, animations
├── template-parts/
│   ├── cta-banner.php     # Reusable CTA section
│   └── features-bar.php   # Reusable features row
└── inc/
    └── form-handlers.php  # Contact + inquiry form email handlers
```

---

## Setup Instructions

### 1. Install WordPress
Use LocalWP, XAMPP, or any hosting environment.

### 2. Activate Theme
Place `estatein/` folder in `wp-content/themes/`. Activate in **Appearance > Themes**.

### 3. Create Pages
Go to **Pages > Add New** and create the following pages, assigning the matching template:

| Page Title | Template |
|---|---|
| Home | (set as front page in Settings > Reading) |
| About Us | About Us |
| Properties | Properties |
| Services | Services |
| Contact Us | Contact Us |

Set **Settings > Reading > Your homepage displays** to "A static page" and select **Home**.

### 4. Install ACF (Recommended)
Install the **Advanced Custom Fields** plugin. Field groups for Properties, Testimonials, and Team Members will auto-register.

### 5. Add Content
- **Properties**: Posts > Properties — add price, bedrooms, bathrooms, area, location via ACF fields
- **Testimonials**: Add testimonials with author name, location, rating
- **Team Members**: Add team with role and photo
- **FAQs**: Add FAQ posts with question as title, answer as content

---

## Custom Post Types
| CPT | Slug | Purpose |
|---|---|---|
| property | /properties/ | Real estate listings |
| testimonial | — | Client testimonials |
| team_member | — | Team members |
| faq | — | Frequently asked questions |

## ACF Fields - Properties
- `price` — Listing price (text)
- `bedrooms` — Number of bedrooms
- `bathrooms` — Number of bathrooms
- `area` — Square footage
- `location` — City, State
- `property_type` — Villa / Apartment / Cottage / Townhouse
- `category_label` — Display category name
- `featured` — Show on homepage (true/false)
- `amenities` — One amenity per line (textarea)
- `transfer_tax`, `legal_fees`, `inspection`, `insurance` — Pricing details
- `monthly_tax`, `hoa_fee`, `down_payment` — Monthly costs

---

## Design System
- **Font**: Urbanist (Google Fonts)
- **Background**: `#141414`
- **Cards**: `#1e1e1e`
- **Accent**: `#703bf7` (purple)
- **Text Primary**: `#ffffff`
- **Text Secondary**: `#999999`
- **Border**: `#2a2a2a`

All values are CSS custom properties in `assets/css/main.css` `:root`.

---

## Plugins Used / Recommended
| Plugin | Purpose |
|---|---|
| Advanced Custom Fields (ACF) | Property meta fields |
| Yoast SEO | Meta tags, sitemap |
| WP Fastest Cache | Performance / caching |
| Smush | Image optimization |
| Contact Form 7 (optional) | Alternative contact form |

---

## Performance & SEO
- Google Fonts loaded via `wp_enqueue_style`
- Scripts loaded in footer (`true` parameter)
- Images use `loading="lazy"` where applicable
- Semantic HTML5 elements throughout
- Alt attributes on all images
- `add_theme_support('title-tag')` enables WordPress SEO title management
- Compatible with Yoast SEO for full meta tag control

---

## Browser Support
Tested on: Chrome, Firefox, Safari, Edge (latest versions)
Responsive breakpoints: 480px, 768px, 1024px
