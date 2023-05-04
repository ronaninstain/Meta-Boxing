<?php
?>
<div class="for-back-facility-list">
    <?php
    $facility_field_value = get_post_meta(get_the_ID(), '_facility_filed', true);
    if (!empty($facility_field_value)) {
        $facility_field_value = explode('/', $facility_field_value);

        echo '<ul class="features-from-back-end">';
        foreach ($facility_field_value as $facility) {
            echo '<li>' . $facility . '</li>';
        }
        echo '</ul>';
    } else {
    ?>
        <ul class="bundle-course-features">
            <?php if ($list) {
                echo '<dd>';
                foreach ($settings['list'] as $item) {
                    echo '<li>' . $item['list_content'] . '</li>';
                }
                echo '</dd>';
            } ?>
        </ul>
    <?php
    }
    ?>
</div>
<?php
