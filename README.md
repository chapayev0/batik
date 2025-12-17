# Batik Net - Traditional Crafting Platform

A fully functional minimalistic and modern dummy website for traditional batik crafting, featuring separate portals for batik artisans and workshop owners.

## Features

### General Features
- Modern, minimalistic design with custom color scheme
- Fully responsive layout
- Session-based authentication system
- Clean typography using Cormorant Garamond and Montserrat fonts

### User Types

#### Freelancers / Artisans
- Personal profile page with portfolio showcase
- Skills and expertise display
- Contact information
- Portfolio items with images and descriptions

#### Workshops / Companies
- Company profile page
- Product catalog management
- Job posting management
- Active job listings with applications tracking
- Company information and specialties

### Pages Included

1. **index.php** - Landing page with hero section and feature overview
2. **login.php** - Login portal for both user types
3. **products.php** - Product catalog with category filtering
4. **freelancers.php** - List of available craftspeople
5. **workshops.php** - Job board with workshop opportunities
6. **freelancer_profile.php** - Freelancer dashboard and portfolio
7. **workshop_profile.php** - Workshop dashboard with products and jobs
8. **logout.php** - Session termination

## Demo Credentials

### Freelancer Account
- **Username:** artisan_maya
- **Password:** craft123
- **Access:** Portfolio management, skills showcase, contact details

### Workshop Account
- **Username:** heritage_works
- **Password:** workshop123
- **Access:** Company profile, product management, job postings

## Setup Instructions

### Requirements
- PHP 7.4 or higher
- Web server (Apache/Nginx) or PHP built-in server
- No database required (all data is hardcoded)

### Installation

1. Copy all PHP files to your web server directory

2. If using PHP built-in server:
   ```bash
   php -S localhost:8000
   ```

3. Access the website:
   ```
   http://localhost:8000/index.php
   ```

## Navigation Flow

### For Freelancers:
1. Visit index.php
2. Click "Login" → Select "Freelancer / Artisan"
3. Enter credentials: artisan_maya / craft123
4. View/edit profile, showcase portfolio
5. Logout when done

### For Workshops:
1. Visit index.php
2. Click "Login" → Select "Workshop / Company"
3. Enter credentials: heritage_works / workshop123
4. Manage products, view job postings, check applications
5. Logout when done

## File Structure

```
batik-house/
├── index.php                 # Landing page
├── login.php                 # Authentication page
├── products.php              # Product catalog
├── freelancers.php           # Craftspeople listing
├── workshops.php             # Job board
├── freelancer_profile.php    # Freelancer dashboard
├── workshop_profile.php      # Workshop dashboard
├── logout.php               # Logout handler
└── README.md                # This file
```

## Hardcoded Data

### Products
- 6 different product categories
- Traditional Batik, Modern Silk, Cotton Wear, Wall Art, Home Decor, Accessories

### Freelancer Profile (Maya Perera)
- 12 years experience
- 6 portfolio items
- Skills: Wax Resisting, Natural Dyeing, Pattern Design, Silk Painting, etc.

### Workshop Profile (Heritage Crafts Workshop)
- Established 1998
- 24 employees
- 4 active job postings
- 6 products in catalog

### Job Postings
- Senior Batik Artist (Full-time)
- Dyeing Specialist (Part-time)
- Pattern Designer (Contract)

## Design Features

- **Color Palette:**
  - Primary: #2c2416 (Dark Brown)
  - Secondary: #8b7355 (Medium Brown)
  - Accent: #d4a574 (Gold)
  - Light: #f8f6f3 (Cream)

- **Typography:**
  - Headings: Cormorant Garamond (Serif)
  - Body: Montserrat (Sans-serif)

- **Animations:**
  - Smooth hover effects
  - Card lift animations
  - Gradient transitions

## Security Notes

⚠️ **This is a demo/dummy website:**
- No real database security
- Passwords stored in plain text in code
- Session management is basic
- Not suitable for production use
- Should be enhanced with proper security measures for real deployment

## Customization

To customize the hardcoded data:
1. Edit the respective PHP files
2. Look for array definitions at the top of each file
3. Modify product details, user info, or job postings as needed

## Browser Compatibility

Tested and working on:
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## License

This is a demo project for educational purposes.

## Support

For questions or issues, this is a dummy project without active support.
