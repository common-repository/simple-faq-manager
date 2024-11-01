
<h3>Topics</h3>

<ul id='simple_faq_topics_sidebar'>

    <?php foreach( $topics as $topic ) : ?>

        <li>
            <a href="?faq-topic=<?php echo $topic->term_id; ?>">
                <?php echo $topic->name; ?>
            </a>
        </li>

    <?php endforeach; ?>

</ul>