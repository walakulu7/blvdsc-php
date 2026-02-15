<?php
/**
 * Schema.org Structured Data for Google Rich Results
 * This helps search engines understand our business better
 */
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CafeOrCoffeeShop",
  "name": "BLVD Specialty Coffee",
  "description": "Pet-friendly specialty coffee cafe with gluten-free, vegan, and vegetarian options in Canning Vale",
  "image": "<?php echo BASE_URL; ?>/assets/images/our-story.jpeg",
  "url": "<?php echo BASE_URL; ?>",
  "telephone": "<?php echo CONTACT_PHONE; ?>",
  "email": "<?php echo CONTACT_EMAIL; ?>",
  "servesCuisine": ["Coffee", "Vegan", "Vegetarian", "Gluten-Free"],
  "priceRange": "$$",
  "acceptsReservations": "True",
  "amenityFeature": [
    {
      "@type": "LocationFeatureSpecification",
      "name": "Pet-Friendly",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Outdoor Seating",
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
    }
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
  ]
}
</script>
