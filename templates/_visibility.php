<a href="<?= PluginEngine::getLink($plugin, array('feed_id' => $feed->id), 'visibility') ?>">
  <? if ($feed->visibility) { ?>
    <?= Assets::img('icons/16/grey/visibility-visible', array("title" => "Newsfeed ist f�r alle sichtbar. Klicken Sie, um ihn zu verstecken!")) ?>
  <? } else { ?>
    <?= Assets::img('icons/16/grey/visibility-invisible', array("title" => "Newsfeed ist nur f�r Sie sichtbar. Klicken Sie, um ihn f�r alle sichtbar zu machen!")) ?>
  <? } ?>
</a>
