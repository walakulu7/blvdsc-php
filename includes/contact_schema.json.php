<?php
/**
 * Enhanced LocalBusiness Schema for Contact Page
 * Complete business information for Google My Business integration
 */
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CafeOrCoffeeShop",
  "name": "BLVD Specialty Coffee",
  "alternateName": "BLVD Coffee",
  "description": "Pet-friendly specialty coffee cafe in Canning Vale Perth serving gluten-free, vegan, and vegetarian options. Cozy indoor seating and shaded alfresco dining with free WiFi and parking.",
  "image": [
    "<?php echo BASE_URL; ?>/assets/images/our-story.jpeg",
    "<?php echo BASE_URL; ?>/assets/images/team.jpeg",
    "<?php echo BASE_URL; ?>/assets/images/about-1.jpg"
  ],
  "logo": "<?php echo BASE_URL; ?>/assets/images/blvdsc-logo.png",
  "url": "<?php echo BASE_URL; ?>",
  "telephone": "<?php echo CONTACT_PHONE; ?>",
  "email": "<?php echo CONTACT_EMAIL; ?>",
  "servesCuisine": ["Coffee", "Cafe", "Australian", "Vegan", "Vegetarian", "Gluten-Free"],
  "priceRange": "$$",
  "currenciesAccepted": "AUD",
  "paymentAccepted": "Cash, Credit Card, Debit Card",
  "acceptsReservations": true,
  "amenityFeature": [
    {
      "@type": "LocationFeatureSpecification",
      "name": "Pet-Friendly",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Dog-Friendly",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Outdoor Seating",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Alfresco Dining",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Shaded Seating",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Free WiFi",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Parking",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "WheelchairAccessible",
      "value": true
    }
  ],
  "knowsAbout": [
    "Specialty Coffee",
    "Coffee Cupping",
    "Latte Art",
    "Gluten-Free Pastries",
    "Vegan Options",
    "Vegetarian Meals",
    "Pet-Friendly Cafe"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php echo CONTACT_ADDRESS; ?>",
    "addressLocality": "<?php echo CONTACT_CITY; ?>",
    "addressRegion": "<?php echo CONTACT_STATE; ?>",
    "postalCode": "<?php echo CONTACT_ZIP; ?>",
    "addressCountry": "AU"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "-32.0569",
    "longitude": "115.9144"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
      "opens": "07:00",
      "closes": "13:30"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Saturday", "Sunday"],
      "opens": "08:00",
      "closes": "13:30"
    }
  ],
  "sameAs": [
    "<?php echo SOCIAL_FACEBOOK; ?>",
    "<?php echo SOCIAL_INSTAGRAM; ?>",
    "<?php echo SOCIAL_TWITTER; ?>"
  ],
  "hasMenu": "<?php echo BASE_URL; ?>/menu.php",
  "makesOffer": [
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Specialty Coffee",
        "description": "Hand-selected beans roasted to perfection with vegan milk alternatives"
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Gluten-Free Pastries",
        "description": "Freshly baked gluten-free options available daily"
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Vegan & Vegetarian Meals",
        "description": "Plant-based breakfast and lunch options"
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "High Tea",
        "description": "Weekend high tea reservations with dietary accommodations",
        "price": "39.95",
        "priceCurrency": "AUD"
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Private Events",
        "description": "Pet-friendly venue available for private bookings"
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Coffee Workshops",
        "description": "Learn coffee cupping, latte art, and home brewing methods"
      }
    }
  ]
}
</script>
