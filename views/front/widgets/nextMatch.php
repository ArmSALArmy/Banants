<?php
/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/6/2015
 * Time: 3:20 PM
 *
 * @var $item EventModel
 */
?>

<? if ($item): ?>
    <div class="banner_team2">
        <div class="team1_logo">
            <img src="<?= $item->homeTeam()->defaultImage()->path ?>" alt="<?= __($item->homeTeam()->shortName()) ?>" title="<?= __($item->homeTeam()->shortName()) ?>" />

            <? if( ! $item->homeTeam()->is_own): ?>
                <span class="team_name_"><?= __($item->homeTeam()->shortName()) ?></span>
            <? endif ?>

        </div>
        <div class="match-score-info">
        <span><?= __(':dayth of :month', [':month' => __($item->played_at->format('F')), ':day' => $item->played_at->format('j'),]) ?>
        </span>
            <span class="match-time"><?= $item->played_at->format('H:i') ?></span>
        </div>
        <div class="team2_logo">
            <img src="<?= $item->awayTeam()->defaultImage()->path ?>" alt="<?= __($item->awayTeam()->shortName()) ?>" title="<?= __($item->awayTeam()->shortName()) ?>" />

            <? if( ! $item->awayTeam()->is_own): ?>
                <span class="team_name_"><?= __($item->awayTeam()->shortName()) ?></span>
            <? endif ?>

        </div>
    </div>
<? endif ?>
