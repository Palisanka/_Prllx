<!-- Footer -->
  <section id="footer">
    <p>
      <ul class="icons">
        <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
        <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
      </ul>
    </p>
    <p class="copyright">&copy; Le copyright.</p>
  </section>

  <script>

    // init controller
    var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});

    <?php
    $nb_section = get_theme_mod( 'nb_section' );

    for ($i = 1 ; $i <= $nb_section ; $i++) {
      $trigger = "#parallax".$i;
      ?>

      // build scenes
      new ScrollMagic.Scene({triggerElement: "<?php echo $trigger ?>"})
      .setTween("<?php echo $trigger ?> > div", {y: "80%", ease: Linear.easeNone})
      // .addIndicators()
      .addTo(controller);

    <?php } ?>
  </script>
</body>
<?php wp_footer(); ?>
</html>
