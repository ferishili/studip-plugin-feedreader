<? if (isset($message) && strlen($message)) : ?>
  <div class="feed_reader_message"><?= $message ?></div>
<? endif ?>

<div class="feed_reader_subscription_bar">
  <?= $this->render_partial('_subscribe') ?>
</div>

<h3>Deine Newsfeeds</h3>

<? if (sizeof($feeds)) : ?>
  <ul id="feed_reader_list">
  <? $index = 0; $len = sizeof($feeds); ?>
  <? foreach ($feeds as $feed) : ?>
    <li id="feed_reader_list_feed_<?= $feed->id ?>">

      <a href="<?= PluginEngine::getLink($plugin, array('feed_id' => $feed->id), 'delete') ?>">
        <img src="<?= $plugin->getPluginURL() ?>/img/trash.gif" alt="L�schen">
      </a>

      <a href="<?= PluginEngine::getLink($plugin, array('feed_id' => $feed->id), 'edit') ?>">
        �ndern
      </a>

      <img src="<?= $plugin->getPluginURL() ?>/img/drag_handle.gif" alt="Sortieren" class="drag_handle">

      <span class="feed_reader_sort_arrows">

        <? if ($index > 0) : ?>
          <form action="<?= PluginEngine::getLink($plugin, array(), 'up') ?>" method="post" style="display: inline;">
            <input type="hidden" name="feed_id" value="<?= $feed->id ?>">
            <input type="image" src="<?= Assets::image_path('icons/16/blue/arr_1up') ?>">
          </form>
        <? else : ?>
          <?= Assets::img('blank.gif', array('size' => '16@16', 'alt' => '')) ?>
        <? endif ?>

        <? if ($index + 1 < $len) : ?>
          <form action="<?= PluginEngine::getLink($plugin, array(), 'down') ?>" method="post" style="display: inline;">
            <input type="hidden" name="feed_id" value="<?= $feed->id ?>">
            <input type="image" src="<?= Assets::image_path('icons/16/blue/arr_1down') ?>">
          </form>
        <? else : ?>
          <?= Assets::img('blank.gif', array('size' => '16@16', 'alt' => '')) ?>
        <? endif ?>

        <? $index++ ?>

      </span>

      <?= $feed->url ?>
    </li>
  <? endforeach ?>
  </ul>
<? endif ?>

<script type="text/javascript">

  Sortable.create("feed_reader_list", {
    handle: "drag_handle",
    constraint: "vertical",
    onUpdate: function() {
      new Ajax.Request("<?= PluginEngine::getLink($plugin, array(), 'sort') ?>",
        { parameters: Sortable.serialize("feed_reader_list", { name: 'feeds' }) });
    }
  });
</script>

