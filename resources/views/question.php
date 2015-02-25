<a href="#" data-reveal-id=<?php echo "questionModal-".$questionNumber."\""; ?> class="callout panel">.
    <h3><?php echo $questionTitle; ?></h3>
    <p><?php echo $questionContentTruncated; ?></p>
</a>

<div id=<?php echo "questionModal-".$questionNumber."\""; ?> class="reveal-modal" data-reveal>
    <h2><?php echo $questionTitle; ?></h2>
    <p><?php echo $questionContent; ?></p>


    <!--
                ANSWER VIEW GOES HERE
    -->
    <a class="close-reveal-modal"></a>
</div>