<?php
/**
 * Events Schema for Google Rich Results
 * Helps search engines understand our events and workshops
 */
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Event",
      "name": "Coffee Cupping Workshop",
      "description": "Join our master barista for an interactive coffee tasting experience. Learn how to identify flavor notes and appreciate different coffee origins.",
      "image": "https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070&auto=format&fit=crop",
      "startDate": "2024-06-15T09:00",
      "endDate": "2024-06-15T11:00",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "location": {
        "@type": "Place",
        "name": "BLVD Specialty Coffee",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php echo CONTACT_ADDRESS; ?>",
          "addressLocality": "<?php echo CONTACT_CITY; ?>",
          "addressRegion": "<?php echo CONTACT_STATE; ?>",
          "postalCode": "<?php echo CONTACT_ZIP; ?>",
          "addressCountry": "AU"
        }
      },
      "organizer": {
        "@type": "Organization",
        "name": "BLVD Specialty Coffee",
        "url": "<?php echo BASE_URL; ?>"
      },
      "offers": {
        "@type": "Offer",
        "price": "35",
        "priceCurrency": "AUD",
        "availability": "https://schema.org/InStock",
        "url": "<?php echo BASE_URL; ?>/contact.php"
      }
    },
    {
      "@type": "Event",
      "name": "Latte Art Masterclass",
      "description": "Learn the techniques behind creating beautiful latte art. This hands-on workshop will cover basic patterns and advanced designs.",
      "image": "https://images.unsplash.com/photo-1534040385115-33dcb3acba5b?q=80&w=1974&auto=format&fit=crop",
      "startDate": "2024-06-22T14:00",
      "endDate": "2024-06-22T16:00",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "location": {
        "@type": "Place",
        "name": "BLVD Specialty Coffee",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php echo CONTACT_ADDRESS; ?>",
          "addressLocality": "<?php echo CONTACT_CITY; ?>",
          "addressRegion": "<?php echo CONTACT_STATE; ?>",
          "postalCode": "<?php echo CONTACT_ZIP; ?>",
          "addressCountry": "AU"
        }
      },
      "organizer": {
        "@type": "Organization",
        "name": "BLVD Specialty Coffee",
        "url": "<?php echo BASE_URL; ?>"
      },
      "offers": {
        "@type": "Offer",
        "price": "40",
        "priceCurrency": "AUD",
        "availability": "https://schema.org/InStock",
        "url": "<?php echo BASE_URL; ?>/contact.php"
      }
    },
    {
      "@type": "Event",
      "name": "Acoustic Music Night",
      "description": "Enjoy the soulful sounds of local musicians in our cozy café environment. Light refreshments and full coffee menu available.",
      "image": "https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop",
      "startDate": "2024-06-28T19:00",
      "endDate": "2024-06-28T21:00",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "location": {
        "@type": "Place",
        "name": "BLVD Specialty Coffee - Pet-Friendly Venue",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php echo CONTACT_ADDRESS; ?>",
          "addressLocality": "<?php echo CONTACT_CITY; ?>",
          "addressRegion": "<?php echo CONTACT_STATE; ?>",
          "postalCode": "<?php echo CONTACT_ZIP; ?>",
          "addressCountry": "AU"
        }
      },
      "organizer": {
        "@type": "Organization",
        "name": "BLVD Specialty Coffee",
        "url": "<?php echo BASE_URL; ?>"
      },
      "isAccessibleForFree": true
    },
    {
      "@type": "Event",
      "name": "Home Brewing Methods",
      "description": "Discover how to brew café-quality coffee at home. We'll explore various brewing methods including pour-over, French press, AeroPress, and more.",
      "image": "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop",
      "startDate": "2024-07-08T10:00",
      "endDate": "2024-07-08T12:00",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "location": {
        "@type": "Place",
        "name": "BLVD Specialty Coffee",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php echo CONTACT_ADDRESS; ?>",
          "addressLocality": "<?php echo CONTACT_CITY; ?>",
          "addressRegion": "<?php echo CONTACT_STATE; ?>",
          "postalCode": "<?php echo CONTACT_ZIP; ?>",
          "addressCountry": "AU"
        }
      },
      "organizer": {
        "@type": "Organization",
        "name": "BLVD Specialty Coffee",
        "url": "<?php echo BASE_URL; ?>"
      },
      "offers": {
        "@type": "Offer",
        "price": "30",
        "priceCurrency": "AUD",
        "availability": "https://schema.org/InStock",
        "url": "<?php echo BASE_URL; ?>/contact.php"
      }
    }
  ]
}
</script>
