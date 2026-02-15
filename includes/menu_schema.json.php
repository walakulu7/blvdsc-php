<?php
/**
 * Menu Schema for Google Rich Results
 * Helps search engines understand our menu structure
 */
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Menu",
  "name": "BLVD Specialty Coffee Menu",
  "description": "Specialty coffee menu featuring gluten-free, vegan, and vegetarian options",
  "inLanguage": "en-AU",
  "hasMenuSection": [
    {
      "@type": "MenuSection",
      "name": "Coffee & Tea",
      "description": "Specialty coffee and tea with vegan milk alternatives available",
      "image": "<?php echo BASE_URL; ?>/assets/images/menu-coffee-tea.webp",
      "offers": {
        "@type": "Offer",
        "availabilityEnds": "13:30:00",
        "availabilityStarts": "07:00:00"
      }
    },
    {
      "@type": "MenuSection",
      "name": "Other Beverages",
      "description": "Vegan smoothies, shakes, and specialty drinks",
      "image": "<?php echo BASE_URL; ?>/assets/images/menu-other-beverages.webp"
    },
    {
      "@type": "MenuSection",
      "name": "All Day Breakfast & Specialties",
      "description": "Gluten-free, vegan, and vegetarian breakfast options available all day",
      "image": "<?php echo BASE_URL; ?>/assets/images/menu-all-daybreakfast.webp",
      "suitableForDiet": [
        "https://schema.org/GlutenFreeDiet",
        "https://schema.org/VeganDiet",
        "https://schema.org/VegetarianDiet"
      ]
    },
    {
      "@type": "MenuSection",
      "name": "Kids & Seasonal",
      "description": "Family-friendly options with dietary accommodations",
      "image": "<?php echo BASE_URL; ?>/assets/images/menu-kids-seasonal.webp"
    }
  ]
}
</script>
