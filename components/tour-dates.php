<?php include 'php/interface/interface.php'; ?>
<section class="section tour-dates">
  <h1 class="tour-dates__title">TOUR DATES</h1>
  <table class="tour-dates__table">
    <tr class="tour-dates--row tour-dates__table--head">
      <td>Date</td>
      <td>City</td>
      <td class="tour-dates__venue">Venue</td>
      <td class="tour-dates__country">Country</td>
      <td class="tour-dates__bands">Bands</td>
      <td>Event</td>
      <td>Tickets</td>
    </tr>
      <?php tableComingShows(); ?>
  </table>
</section>