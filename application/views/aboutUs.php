<?php
$details = "Business news & in-depth insight for contractors and small and disadvantaged entrepreneurs in public works. In today's fast-changing world, we report on topics relevant to the construction, small business, and public works community. We aim to inform our readers about pressing issues facing American small businesses, contractors, subcontractors, emergent entrepreneurs, and their employees. We also report on the role of government in public works and in promoting public-private partnerships and outreach efforts. Subscribe for FREE to our weekly newsletter and contact us with any ideas or suggestions."
?>

<div class="container my-3 about-us">
  <form class="search_row py-2 px-3" method="get">
    <h2 class="mb-3 box_heading m-0">About Us</h2>
    <div class="row align-items-center">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="about-us-content mt-4">
          <p>
            <?php echo $details; ?>
          </p>
        </div>
      </div>
    </div>
  </form>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebPage",
      "name": "About Us",
      "description": "<?php echo $details; ?>",
      "url": "",
      "speakable": {
        "@type": "SpeakableSpecification",
        "xpath": [
          "/html/head/title",
          "/html/head/meta[@name='description']/@content"
        ]
      }
    }
  </script>
</div>
