# Estatein WordPress Theme — Documentation

---

## Development Process

Built as a custom WordPress theme matching the provided Figma dark-theme design. Given the time constraint, priority was placed on:

1. **Homepage** — fully built: hero, features bar, property cards, testimonials, FAQ, CTA
2. **Properties Page** — fully built: search/filter bar, property grid, inquiry form
3. **Header + Footer** — reusable, consistent across all pages
4. **About Us, Services, Contact, Property Detail** — scaffolded with full layout and fallback content

---

## How to Publish Pages in LocalWP (Step by Step)

This is the most common point of confusion. Follow this exactly.

### Step 1 — Create Each Page

Go to **WP Admin → Pages → Add New** and create these pages one by one:

| Page Title (must match exactly) | Template to Select |
|---|---|
| Home | Default Template |
| About Us | About Us |
| Properties | Properties |
| Services | Services |
| Contact Us | Contact Us |

**How to assign a template:**
- When editing a page, look at the right sidebar
- Find **"Page Attributes"** panel
- Under **"Template"**, click the dropdown
- Select the matching template name
- Click **"Publish"**

If you don't see the Template dropdown:
- Click the three dots (⋮) top right → **Preferences**
- Enable **"Page Attributes"** under the Panels tab
- Close and the sidebar panel will appear

---

### Step 2 — Set the Homepage

1. Go to **Settings → Reading**
2. Change **"Your homepage displays"** from "Latest posts" to **"A static page"**
3. Set **Homepage** to: `Home`
4. Set **Posts page**: leave blank
5. Click **Save Changes**

Now visit your site — you should see the Estatein homepage.

---

### Step 3 — If Templates Don't Appear in the Dropdown

This means WordPress isn't detecting the theme files. Check:

1. Your theme folder must be named `estatein` (not `estatein-theme` or anything else)
2. The path must be: `app/public/wp-content/themes/estatein/`
3. `style.css` must exist in the root of that folder with the Theme Name comment
4. Go to **Appearance → Themes** — is Estatein shown and activated?

If still not working:
- Deactivate and re-activate the theme
- Or in LocalWP, stop and restart the site (toggle the green button)

---

### Step 4 — Verify Each Page Works

Visit these URLs after publishing:

| Page | URL |
|---|---|
| Homepage | `http://estatein.local` |
| About Us | `http://estatein.local/about-us` |
| Properties | `http://estatein.local/properties` |
| Services | `http://estatein.local/services` |
| Contact Us | `http://estatein.local/contact-us` |

If a page shows a **blank white screen**, go to **WP Admin → Settings → Permalinks** and click **Save Changes** (this flushes rewrite rules).

---

## Folder Structure

```
estatein/
├── style.css                      # Theme declaration (required)
├── functions.php                  # CPT registration, ACF fields, helpers
├── index.php                      # Fallback template
├── header.php                     # Sticky nav with mobile toggle
├── footer.php                     # Footer columns + social links
├── front-page.php                 # Homepage
├── page-about.php                 # About Us (Template Name: About Us)
├── page-properties.php            # Properties (Template Name: Properties)
├── page-services.php              # Services (Template Name: Services)
├── page-contact.php               # Contact Us (Template Name: Contact Us)
├── single-property.php            # Single property detail page
├── assets/
│   ├── css/main.css               # Full stylesheet — CSS variables, responsive
│   └── js/main.js                 # Mobile menu, scroll animations
├── template-parts/
│   ├── cta-banner.php             # Reusable CTA section
│   └── features-bar.php          # Reusable 4-feature row
└── inc/
    └── form-handlers.php          # Email handlers for contact + inquiry forms
```

---

## Custom Post Types

| Label | Slug | Used For |
|---|---|---|
| Properties | `property` | Real estate listings |
| Testimonials | `testimonial` | Client reviews |
| Team Members | `team_member` | About Us team section |
| FAQs | `faq` | FAQ sections |

All pages display **fallback placeholder content** automatically if no posts exist yet, so the site looks complete even before adding real content.

---

## ACF Fields — Properties

Install the free **Advanced Custom Fields** plugin. Fields auto-register on activation.

| Field | Type | Used On |
|---|---|---|
| `price` | Text | All property cards |
| `bedrooms` | Number | Property tags |
| `bathrooms` | Number | Property tags |
| `area` | Text | Property detail |
| `location` | Text | Property detail header |
| `property_type` | Select | Property tags |
| `category_label` | Text | Card category label |
| `featured` | True/False | Homepage featured section |
| `amenities` | Textarea | One per line, detail page |
| `transfer_tax` | Text | Pricing table |
| `legal_fees` | Text | Pricing table |
| `inspection` | Text | Pricing table |
| `insurance` | Text | Pricing table |
| `monthly_tax` | Text | Monthly costs table |
| `hoa_fee` | Text | Monthly costs table |
| `down_payment` | Text | Total costs table |

---

## Design Tokens

All values live as CSS custom properties in `assets/css/main.css`:

```css
--bg-primary:     #141414
--bg-card:        #1e1e1e
--purple:         #703bf7
--text-primary:   #ffffff
--text-secondary: #999999
--border:         #2a2a2a
--font:           'Urbanist', sans-serif
```

---

## Recommended Plugins

| Plugin | Purpose |
|---|---|
| Advanced Custom Fields | Property meta fields |
| Yoast SEO | Meta tags, XML sitemap |
| WP Fastest Cache | Page caching |
| Smush | Image compression |

---

## What Was Completed vs. Pending

### Completed
- Full theme architecture and file structure
- Global CSS design system matching Figma (colors, typography, spacing)
- Responsive layout — mobile, tablet, desktop breakpoints
- Header with sticky nav + mobile hamburger menu
- Footer with 5-column layout + social links
- Homepage — all 6 sections (hero, features, properties, testimonials, FAQ, CTA)
- Properties page — search bar, filter dropdowns, property grid, inquiry form
- About Us page — journey, values, achievements, steps, team, clients
- Services page — 3 service sections with cards
- Contact page — form, office cards, gallery
- Property detail — gallery, specs, amenities, inquiry form, pricing table
- 4 Custom Post Types with ACF field groups
- Form email handlers (contact + property inquiry)
- Fallback placeholder content on all pages (site looks complete before real content is added)

### Pending (given more time)
- Real property images (emoji placeholders used)
- AJAX-powered property search and filter
- WordPress pagination on property archive
- Blog/news section
- Individual FAQ archive page
- Custom 404 page
- Lazy loading and asset minification
- Cross-browser QA on Safari and Firefox
