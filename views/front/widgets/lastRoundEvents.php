<?php
/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/6/2015
 * Time: 3:20 PM
 *
 * @var $items array[round][EventModel]
 * @var $item EventModel
 * @var $round int
 */

use Ivliev\Imagefly\Imagefly;
use Helpers\Uri;

?>
<div class="last-round-events">
    <h2 class="match-info"><?= __('Round') ?> <?= $round ?></h2>
    <ul>

        <? foreach ($items as $item): ?>
            <li class="match-column">
                <div class="match-result">
                    <div class="match-row">
                        <img src="<?= Imagefly::imagePath($item->home()->team()->defaultImage()->path, 'w30-q65') ?>" alt="">
                    </div>
                    <div class="match-row name">
                        <span class=""><?= __($item->home()->team()->shortName()) ?></span>
                    </div>
                    <div class="result match-row">
                        <a href="<?= Uri::makeUriFromId($item->slug()) ?>">
                            <span><?= $item->home()->score ?> - <?= $item->away()->score ?></span>
                        </a>
                    </div>
                    <div class="match-row">
                        <img src=<?= Imagefly::imagePath($item->away()->team()->defaultImage()->path, 'w30-q65') ?> alt="">
                    </div>
                    <div class="match-row name">
                        <span class=""><?= __($item->away()->team()->shortName()) ?></span>
                    </div>
                </div>
            </li>
        <? endforeach ?>

    </ul>
</div>